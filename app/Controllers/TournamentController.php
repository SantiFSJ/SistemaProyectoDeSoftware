<?php

namespace App\Controllers;

use App\Models\TournamentModel;

class TournamentController extends BaseController
{
    //private $model = model(TournamentModel::class); //cuidado
    public function create()
    {
        return $this->showAdminView('tournaments/form', 'Creación de Torneo');
    }
    public function edit($id = null)
    {
        $model = model(TournamentModel::class);
        if (isset($id)) {
            $data = [
                'tournament'  => $model->getTournaments($id),
            ];
            return view('templates/header', ['title' => 'Editar Torneo'])
                . view('tournaments/form', $data)
                . view('templates/footer');
        }
    }
    public function save()
    {
        $model = model(TournamentModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'name' => $this->request->getPost('name'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
            ]);
        }
        return $this->list();
    }
    
    public function delete($id)
    {
        $model = model(TournamentModel::class);
        $model->delete($id);

        return $this->list();
    }

    public function list()
    {
        $model = model(TournamentModel::class);
        $data = [
            'tournaments'  => $model->getTournaments(),
        ];
        return $this->showAdminView('tournaments/list', 'Listado de Torneos',$data);
    }
    public function addPhase()
    {
        $model = model(TournamentModel::class);
        if ($this->request->getMethod() === 'post') {
            $phase = [
                'name' => $this->request->getPost('name'),
                'match_amount' => $this->request->getPost('match_amount'),
                'team_amount' => $this->request->getPost('team_amount'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
                'id_tournament' => $this->request->getPost('id_tournament'),
            ];
            $model->addPhase($phase);
        }
    }
}
