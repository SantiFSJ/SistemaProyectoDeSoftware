<?php

namespace App\Controllers;

use App\Models\ParticipantModel;

class ChallengeController extends BaseController{

    public function create($id_tournament){
        $model = model(UserModel::class);
        $tournamentModel = model(TournamentModel::class);

        $data = [
            'id_tournament' => $id_tournament,
            'users'  => $model->getUsers(),
        ];
        $tournament = $tournamentModel->getTournaments($id_tournament);
        return $this->showAdminView('challenges/form', 'Creación de desafío para el torneo '.$tournament['name'], $data);
    }

    public function edit($id = null){
        if(isset($id)){
            $model = model(UserModel::class);
            $data = [
                'user'  => $model->getUserAndParticipant($id),
            ];
            return $this->showAdminView('users/form', 'Editar usuario', $data);
        }
    }

    public function save(){
        $model = model(ChallengeModel::class);
        $modelUser = model(UserModel::class);
        $modelInvite = model(InviteModel::class);
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
            foreach ($usersToInvite as $key => $value) {
                    $modelInvite->save([
                        'id_challenge' => ($this->request->getPost('id')) ? ($this->request->getPost('id')) : $id,
                        'id_user_invited' => $key,
                        'response' => null,
                    ]);
                
            };
        }
        return redirect()->to(site_url('tournaments/list/')); //TODO: redirigir a la vista posterior 

    }


    public function delete($id = null){
        $model = model(UserModel::class);
        $model->delete($id);
        $data = [
            'users'  => $model->getUsers(),
        ];
        return $this->list();

    }

    public function list(){
        $model = model(UserModel::class);
        $data = [
            'users'  => $model->getUsers(),
        ];
        return $this->showAdminView('users/list', 'Listado de usuarios', $data);

    }

}
