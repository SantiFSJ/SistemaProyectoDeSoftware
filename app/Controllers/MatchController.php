<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\MatchModel;
use App\Models\StadiumModel;
use App\Models\TeamModel;
use App\Models\TeamsGroupModel;

class MatchController extends BaseController
{
    public function create($id_phase)
    {
        $modelTeams = model(TeamModel::class);
        $modelGroups = model(GroupModel::class);
        $modelStadiums = model(StadiumModel::class);
        $data = [
            'id_phase' => $id_phase,
            'teams' => $modelTeams->getTeams(),
            'groups' => $modelGroups->getGroupsOfPhase($id_phase),
            'stadiums' => $modelStadiums->getStadiums(),
        ];
        return $this->showAdminView('matchs/form', 'Creación de partido', $data);
    }
    public function edit($id, $id_phase)
    {
        $model = model(MatchModel::class);
        $modelGroups = model(GroupModel::class);
        $modelStadiums = model(StadiumModel::class);
        if (isset($id)) {
            $data = [
                'match' => $model->getMatches($id),
                'id_phase' => $id_phase,
                'groups' => $modelGroups->getGroupsOfPhase($id_phase),
                'stadiums' => $modelStadiums->getStadiums(),
            ];
            return $this->showAdminView('matchs/form', 'Modificación de partido', $data);
        }
    }
    public function save()
    {

        $model = model(MatchModel::class);

        $modelTG = model(TeamsGroupModel::class);

        if ($this->request->getMethod() === 'post') {

            $model->save([
                'id' => $this->request->getPost('id'),
                'id_phase' => $this->request->getPost('id_phase'),
                'id_group' => ($this->request->getPost('id_group')) ? $this->request->getPost('id_group') : '',
                'id_local' => $this->request->getPost('id_local'),
                'id_visitor' => $this->request->getPost('id_visitor'),
                'date_time' => $this->request->getPost('date_time'),
                'id_stadium' => $this->request->getPost('id_stadium'),
                'result' => ($this->request->getPost('result')) ? $this->request->getPost('result') : '',
            ]);
            if ($this->request->getPost('id_group')) {
                $modelTG->saveTeamsGroup($this->request->getPost('id_group'), $this->request->getPost('id_visitor'));
                $modelTG->saveTeamsGroup($this->request->getPost('id_group'), $this->request->getPost('id_local'));
            }
        }


        return redirect()->to(site_url('tournaments/list'));
    }
    public function delete($id)
    {
        $model = model(MatchModel::class);
        $model->delete($id);
        return redirect()->to(site_url('match/list'));
    }
    public function viewByPhase($id_phase)
    {
        $model = model(MatchModel::class);
        $data = [
            'matchs' => $model->getMatchesByPhaseId($id_phase),
        ];

        return $this->showAdminView('match/list', 'Lista de partidos', $data);
    }
}
