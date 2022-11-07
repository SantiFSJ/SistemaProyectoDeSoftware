<?php

namespace App\Controllers;

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
        $user = $userModel->getUserByUsername($this->request->getPost('username'));

        if ($user) {
            if ($user[0]->password == $this->request->getPost('password')) {
                //TODO no anda
                $session->set(
                    [
                        'username' => $user[0]->username,
                        'password' => $user[0]->password,
                        'logged_in' => true,
                        'id_role' => $user[0]->id_role,
                    ]
                );
                return $this->showUserView('pages/home');
            }
        }
        return $this->showUserView('teams/form', 'Carga de usuarios');
    }


    public function view($slug = null)
    {
        return $this->showUserView('login/login', 'Inicio de Sesión');
    }
}
