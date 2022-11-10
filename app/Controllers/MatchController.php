<?php

namespace App\Controllers;

use App\Models\MatchModel;


class MatchController extends BaseController
{
    public function create($id_phase)
    {
        $data = [
            'id_phase' => $id_phase,
        ];
        return $this->showAdminView('match/form', 'Creación de partido', $data);
    }
    public function edit($id)
    {
        $model = model(MatchModel::class);
        if (isset($id)) {
            $data = [
                'match' => $model->getMatches($id),
            ];
            return $this->showAdminView('match/form', 'Modificación de partido', $data);
        }
    }
    public function save()
    {
        $model = model(MatchModel::class);
        if ($this->request->getMethod() === 'POST') {
            $model->save([
                'id' => $this->request->getPost('id'),
                'id_phase' => $this->request->getPost('id_phase'),
                'id_group' => ($this->request->getPost('id_group')) ? $this->request->getPost('id_group') : '',
                'id_local' => $this->request->getPost('id_local'),
                'id_visitor' => $this->request->getPost('id_visitor'),
                'date_time' => $this->request->getPost('date_time'),
                'result' => ($this->request->getPost('result')) ? $this->request->getPost('result') : '',
                'id_stadium' => $this->request->getPost('id_stadium'),
            ]);
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
