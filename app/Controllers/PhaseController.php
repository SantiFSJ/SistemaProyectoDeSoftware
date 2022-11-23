<?php

namespace App\Controllers;

use App\Models\PhaseModel;
use App\Models\TournamentModel;

class PhaseController extends BaseController
{
    public function create($id_tournament)
    {
        $data = [
            'id_tournament' => $id_tournament,
        ];
        return $this->showAdminView('phases/form', 'Creación de fase', $data);
    }
    public function edit($id = null)
    {
        $model = model(PhaseModel::class);
        if (isset($id)) {
            $data = [
                'phase' => $model->getPhases($id),
            ];
            return $this->showAdminView('phases/form', 'Editar una fase', $data);
        }
    }
    public function save()
    {
       // dd($this->request->getPost('isElimination'));
        $model = model(PhaseModel::class);
        if ($this->request->getMethod() === 'post') {
            $model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'name' => $this->request->getPost('name'),

                'match_amount' => $this->request->getPost('matchAmount'),
                'team_amount' => $this->request->getPost('teamAmount'),
                'start_date' => $this->request->getPost('start_date'),
                'end_date' => ($this->request->getPost('end_date')) !== null ? $this->request->getPost('end_date') : '',
                'id_tournament' => $this->request->getPost('idTournament'),
                'is_elimination' => $this->request->getPost('isElimination') !== null ? 1 : 0,
            ]);
        }
        return $this->listTorneo();
    }
    public function listTorneo()
    {
        $modelTorneo = model(TournamentModel::class);
        $data = [
            'tournaments'  => $modelTorneo->getTournaments(),
        ];
        return $this->showAdminView('tournaments/list', 'Listado de torneos', $data);
    }
    public function list($id_tournament = null)
    {
        $model = model(PhaseModel::class);

        if (isset($id_tournament)) {

            $data = [
                'phases'  => $model->getPhasesOfTournament($id_tournament),
            ];
        } else {
            $data = [
                'phases'  => $model->getPhases(),
            ];
        }

        return $this->showAdminView('phases/list', 'Listado de fases', $data);
    }
}
