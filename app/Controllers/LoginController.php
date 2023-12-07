<?php

namespace App\Controllers;

use App\Models\InvitesModel;

class LoginController extends BaseController
{
    public function create()
    {
        return $this->showAdminView('teams/form', 'Carga un Equipo');
    }

    public function save()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required|min_length[3]|max_length[255]',

        ])) {
        }
    }
    public function login()
    {
        $session = session();
        $userModel = model(UserModel::class);
        $invitesModel = model(InvitesModel::class);
        $user = $userModel->getUserByUsername($this->request->getPost('username'));


        if ($user) {
            if ($user[0]->password == $this->request->getPost('password')) {

                //TODO no anda
                $session->set(
                    [
                        'username' => $user[0]->username,
                        'password' => $user[0]->password,
                        'id' => $user[0]->id,
                        'logged_in' => true,
                        'id_role' => $user[0]->id_role,
                    ]
                );
                $invites = $invitesModel->getPendingsInvitesByUser($user[0]->id);
                if ($invites) {
                    $session->set(
                        [
                            'pending_invites' => $invites,
                        ]
                    );
                }
                return redirect()->to(site_url('pages/home'));
            }
        }
        return redirect()->to(site_url('login')); //Todo hacer algo si no encuentra al usuario
    }
    public function logout()
    {
        $session = session();
        $session->remove([
            'username',
            'password',
            'id_role',
            'pending_invites'
        ]);
        $session->set('logged_in', false);
        return redirect()->to(site_url('home'));
    }


    public function view()
    {
        return $this->showUserView('login/login', 'Inicio de Sesión');
    }
}
