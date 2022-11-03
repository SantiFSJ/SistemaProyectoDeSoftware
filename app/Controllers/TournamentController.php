<?php

namespace App\Controllers;

use App\Models\TournamentModel;

class TournamentController extends BaseController
{
    protected $model = model(TournamentModel::class); //cuidado
    public function create()
    {
        return $this->showAdminView('tournaments/form', 'Creación de Torneo');
    }
    public function edit($id = null)
    {
        if (isset($id)) {
            $data = [
                'tournament'  => $this->model->getTournaments($id),
            ];
            return $this->showAdminView('tournaments/form', 'Editar un torneo', $data);
        }
    }
    public function save()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
        ])) {
            $this->model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'name' => $this->request->getPost('name'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => $this->request->getPost('end_date'),
            ]);
        }
        $this->list();
    }
    public function delete($id)
    {
        $this->model->deleteTournament($id);

        return $this->list();
    }
    public function list()
    {
        $data = [
            'tournaments'  => $this->model->getTournaments(),
        ];
        return $this->showAdminView('tournaments/list', 'Listado de torneos', $data);
    }
}
