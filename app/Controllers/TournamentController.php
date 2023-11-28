<?php

namespace App\Controllers;

use App\Models\TournamentModel;

class TournamentController extends BaseController
{
    //private $model = model(TournamentModel::class); //cuidado
    public function create()
    {
        return $this->showAdminView('tournaments/form', 'Creación de torneo');
    }
    public function edit($id = null)
    {
        $model = model(TournamentModel::class);
        if (isset($id)) {
            $data = [
                'tournament'  => $model->getTournaments($id),
            ];
            return $this->showAdminView('tournaments/form', 'Actualización de un torneo', $data);
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
        $model->deleteTournament($id);

        return $this->list();
    }

    public function list()
    {
        $model = model(TournamentModel::class);
        $tournaments = $model->getTournaments();

        foreach ($tournaments as &$t) {
            $t['start_date'] = date('d-m-Y', strtotime($t['start_date']));
            $t['end_date'] = date('d-m-Y', strtotime($t['end_date']));
        }
        $data = [
            'tournaments'  => $tournaments,
        ];

        return $this->showAdminView('tournaments/list', 'Listado de torneos', $data);
    }
}
