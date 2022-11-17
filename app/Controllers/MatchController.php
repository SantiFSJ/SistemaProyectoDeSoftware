<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\MatchModel;
use App\Models\TeamModel;
use App\Models\TeamsGroupModel;

class MatchController extends BaseController
{
    public function create($id_phase)
    {
        $modelTeams = model(TeamModel::class);
        $modelGroups = model(GroupModel::class);
        $data = [
            'id_phase' => $id_phase,
            'teams' => $modelTeams->getTeams(),
            'groups' => $modelGroups->getGroupsOfPhase($id_phase),
        ];
        return $this->showAdminView('matchs/form', 'Creación de partido', $data);
    }
    public function edit($id)
    {
        $model = model(MatchModel::class);
        if (isset($id)) {
            $data = [
                'match' => $model->getMatches($id),
            ];
            return $this->showAdminView('matchs/form', 'Modificación de partido', $data);
        }
    }
    public function save()
    {
        dd($this->request->getPost());
        $model = model(MatchModel::class);

        $modelTG = model(TeamsGroupModel::class);
        if ($this->request->getMethod() === 'POST') {
            $model->save([
                'id' => $this->request->getPost('id'),
                'id_phase' => $this->request->getPost('id_phase'),
                'id_group' => ($this->request->getPost('id_group')) ? $this->request->getPost('id_group') : '',
                'id_local' => $this->request->getPost('id_local'),
                'id_visitor' => $this->request->getPost('id_visitor'),
                'date_time' => $this->request->getPost('date_time'),
                'result' => ($this->request->getPost('result')) ? $this->request->getPost('result') : '',
            ]);
            if ($this->request->getPost('id_group')) {
                $model->save([
                    'id_group' => $this->request->getPost('id_group'),
                    'id_visitor' => $this->request->getPost('id_visitor')
                ]);
                $model->save([
                    'id_group' => $this->request->getPost('id_group'),
                    'id_local' => $this->request->getPost('id_local')
                ]);
            }
        }


        return redirect()->to(site_url('match/list'));
    }
    public function delete($id)
    {
        $model = model(MatchModel::class);
        $model->delete($id);
        return redirect()->to(site_url('match/list'));
    }
    public function view()
    {
        return $this->showAdminView('match/list', 'Lista de partidos');
    }
}
