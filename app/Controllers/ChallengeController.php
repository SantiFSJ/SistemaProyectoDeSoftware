<?php

namespace App\Controllers;

use App\Models\InvitesModel;
use App\Models\UserModel;
use App\Models\ParticipantModel;
use App\Models\TournamentModel;
use App\Models\ChallengeModel;




class ChallengeController extends BaseController
{

    public function create($id_tournament)
    {
        $model = model(UserModel::class);
        $tournamentModel = model(TournamentModel::class);

        $data = [
            'id_tournament' => $id_tournament,
            'users'  => $model->getUsers(),
        ];
        $tournament = $tournamentModel->getTournaments($id_tournament);
        return $this->showAdminView('challenges/form', 'Creación de desafío para el torneo ' . $tournament['name'], $data);
    }

    public function edit($id)
    {
        if (isset($id)) {
            $model = model(ChallengeModel::class);
            $tournamentModel = model(TournamentModel::class);
            $challenge = $model->find($id);
            $tournament = $tournamentModel->getTournaments($challenge->id_tournament);
            $data = [
                'tournament'  => $tournament,
                'challenge' => $challenge,
            ];
            return $this->showAdminView('challenges/form', 'Editar desafío para el torneo ' . $tournament['name'], $data);
        }
    }
    public function delete($id)
    {
        $model = model(ChallengeModel::class);
        $model->deleteById($id);
        return $this->list();
    }

    public function save()
    {
        $model = model(ChallengeModel::class);
        $modelUser = model(UserModel::class);
        $modelInvite = model(InvitesModel::class);
        $session = session();
        $user = $modelUser->getUserByUsername($session->username);
        $id_user = $user[0]->id; //TODO: Error si el usuario no está loggeado.
        if ($this->request->getMethod() === 'post') {
            if ($this->request->getPost('id')) {
                $model->save([
                    'id' => $this->request->getPost('id'),
                    'id_tournament' => $this->request->getPost('idTournament'),
                    'id_user_host' => $id_user,
                    'name' => $this->request->getPost('name'),
                ]);
            } else {
                $id = $model->saveAndGetId([
                    'id_tournament' => $this->request->getPost('idTournament'),
                    'id_user_host' => $id_user,
                    'name' => $this->request->getPost('name'),
                ]);
            }
            $usersToInvite = $this->request->getPost('users_to_invite');
            /**
             * 
             * @var object $usersToInvite
             */
            foreach ($usersToInvite as $key => $value) {
                $modelInvite->save([
                    'id_challenge' => ($this->request->getPost('id')) ? ($this->request->getPost('id')) : $id,
                    'id_user_invited' => $key,
                    'response' => null,
                ]);
            };
        }
        return redirect()->to(site_url('challenges/list/')); //TODO: redirigir a la vista anterior 

    }

    public function list()
    {
        $session = session();
        $modelUser = model(UserModel::class);
        $user = $modelUser->getUserByUsername($session->username);
        $model = model(ChallengeModel::class);
        $data = [
            'challenges'  => $model->getCreatedChallengesByUserId($user['id']),
        ];
        return $this->showUserView('challenges/list', 'Listado de desafíos', $data);
    }
}
