<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\MatchModel;
use App\Models\PhaseModel;

class BetController extends BaseController
{
    public function create($id_phase)
    {
        $session = session();
        $model = model(BetModel::class);
        $modelUser = model(UserModel::class);
        $modelForecasts = model(ForecastModel::class);
        $modelPhase = model(PhaseModel::class);
        $modelGroups = model(GroupModel::class);
        $user = $modelUser->getUserByUsername($session->username);
        $bet = $model->getBetsByUserIdAndPhase($user[0]->id, $id_phase);

        $data = [
            'phase' => $modelPhase->getPhases($id_phase),
            'groups' => $modelGroups->getGroupsOfPhase($id_phase),
            'bet' => ($bet) ? $bet[0] : null,
            'matches' => $modelForecasts->findByUserAndPhase($user[0]->id, $id_phase),
        ];
        return $this->showUserView('bets/form', 'Creación de apuesta', $data);
    }
    /*public function create($id_phase)
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $modelMatchs = model(MatchModel::class);

        $data = [
            'id_phase' => $id_phase,
            'creation_date' => date('Y-m-d'),
            'matchs' => $modelMatchs->getMatchesByPhaseId($id_phase),
        ];
        return $this->showUserView('bets/form', 'Creación de apuesta', $data);
    }*/
    /*public function edit($id)
    {
        $session = session();
        $model = model(BetModel::class);
        $modelUser = model(UserModel::class);
        $modelForecasts = model(ForecastModel::class);
        $user = $modelUser->getUserByUsername($session->username);
        $bet = $model->getBets($id);
        $data = [
            'bet' => $bet,
            'forecasts' => $modelForecasts->findByUserAndPhase($user->id, $bet['id_phase']),
        ];
        return $this->showUserView('bets/form', 'Modificación de apuesta', $data);
    }*/
    public function save()
    {

        $model = model(BetModel::class);
        $modelForecasts = model(ForecastModel::class);
        $modelUser = model(UserModel::class);
        $session = session();
        $user = $modelUser->getUserByUsername($session->username);

        $id_user = $user[0]->id; //TODO: Error si el usuario no está loggeado.

        if ($this->request->getMethod() === 'post') {
            if ($this->request->getPost('id')) {
                $model->save([
                    'id' => $this->request->getPost('id'),
                    'id_user' => $id_user,
                    'id_phase' => $this->request->getPost('id_phase'),
                    'creation_date' => $this->request->getPost('creation_date'),
                ]);
            } else {
                $id = $model->saveAndGetId([
                    'id_user' => $id_user,
                    'id_phase' => $this->request->getPost('id_phase'),
                    'creation_date' => $this->request->getPost('creation_date'),
                ]);
            }
            $forecasts = $this->request->getPost('forecasts'); //TODO: revisar como llegan los forecasts

            foreach ($forecasts as $key => $value) {
                $partido_id = $key;
                foreach ($value as $key => $value) {
                    $modelForecasts->save([
                        'id' => $key ? $key : null,
                        'id_bet' => ($this->request->getPost('id')) ? ($this->request->getPost('id')) : $id,
                        'id_match' => $partido_id,
                        'expected_result' => $value,
                    ]);
                }
            };
        }
        return redirect()->to(site_url('tournaments/list/')); //TODO: redirigir a la vista posterior 
    }
    public function delete($id)
    {
        $model = model(BetModel::class);
        $modelForecasts = model(ForecastModel::class);
        $model->delete($id);
        $modelForecasts->deleteByBetId($id);
        return redirect()->to(site_url('bets/list/'));
    }
    public function view($id = null) //TODO: FILTRAR POR USUARIO
    {
        $model = model(BetModel::class);
        $data = [
            'bets' => ($id) ? $model->getBetsByUserId($id) : $model->getBets(),
        ];
        return $this->showUserView('bets/list', 'Lista de mis apuestas', $data);
    }
}
