<?php

namespace App\Controllers;

use App\Models\MatchModel;

class BetController extends BaseController
{
    public function create($id_phase)
    {
        $session = session();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $modelMatchs = model(MatchModel::class);
        $modelUser = model(UserModel::class);
        $user = $modelUser->getUserByUsername($session->username);

        $id_user = $user[0]->id;
        $data = [
            'id_user' => session()->id,
            'id_phase' => $id_phase,
            'creation_date' => date('d/m/Y'),
            'matchs' => $modelMatchs->getMatchesByPhaseId($id_phase),
        ];
        return $this->showUserView('bets/form', 'Creación de apuesta', $data);
    }
    public function edit($id)
    {
        $model = model(BetModel::class);
        $modelForecasts = model(ForecastModel::class);
        $data = [
            'bet' => $model->getBets($id),
            'forecasts' => $modelForecasts->getForecastsByBetId($id),
        ];
        return $this->showUserView('bets/form', 'Modificación de apuesta', $data);
    }
    public function save()
    {
        $model = model(BetModel::class);
        $modelForecasts = model(ForecastModel::class);
        if ($this->request->getMethod() === 'post') {
            if ($this->request->getPost('id')) {
                $model->save([
                    'id' => $this->request->getPost('id'),
                    'id_phase' => $this->request->getPost('id_phase'),
                    'creation_date' => $this->request->getPost('creation_date'),
                ]);
            } else {
                $id = $model->saveAndGetId([
                    'id_phase' => $this->request->getPost('id_phase'),
                    'creation_date' => $this->request->getPost('creation_date'),
                ]);
            }


            $forecasts = $this->request->getPost('forecasts'); //TODO: revisar como llegaN los forecasts
            foreach ($forecasts as $f) {
                $modelForecasts->save([
                    'id' => $f->id,
                    'id_bet' => ($id) ? $id : $this->request->getPost('id'),
                    'id_match' => $f->id_match,
                    'expected_result' => $f->expected_result,
                ]);
            };
        }
        return redirect()->to(site_url('bets/list/' . $this->request->getPost('id_phase'))); //TODO: redirigir a la vista posterior 
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
