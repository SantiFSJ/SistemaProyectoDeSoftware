<?php

namespace App\Controllers;

use App\Models\ParticipantModel;

class UserController extends BaseController
{
    public function create()
    {
        return $this->showAdminView('users/form', 'Crea un Usuario');
    }

    public function edit($id = null)
    {
        if (isset($id)) {
            $model = model(UserModel::class);
            $data = [
                'user'  => $model->getUsers($id),
            ];
            return $this->showAdminView('users/form', 'Editar Usuario', $data);
        }
    }
    public function save()
    {
        $model = model(UserModel::class);
        $modelParticipant = model(ParticipantModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            'password' => 'matches[password-repeated]',
            'password-repeated' => 'matches[password]',
        ])) {

            if ($this->request->getPost('id')) {
                $model->save([
                    'id' => $this->request->getPost('id'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'id_role' => 2,
                ]);
                $participant = $modelParticipant->getParticipantsByUserId($this->request->getPost('id'));
                $modelParticipant->save([
                    'id' => $participant['id'],
                    'dni' => $this->request->getPost('dni'),
                    'name' => $this->request->getPost('name'),
                    'lastname' => $this->request->getPost('lastname'),
                    'birthday_date' => $this->request->getPost('birthdate'),
                    'id_user' => $this->request->getPost('id'),
                    'email' => $this->request->getPost('email'),
                ]);
            } else {
                $id = $model->saveAndGetId([
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'id_role' => 2,
                ]);
                $modelParticipant->save([
                    'dni' => $this->request->getPost('dni'),
                    'name' => $this->request->getPost('name'),
                    'lastname' => $this->request->getPost('lastname'),
                    'birthday_date' => $this->request->getPost('birthdate'),
                    'id_user' => $id,
                    'email' => $this->request->getPost('email'),
                ]);
            }
        }

        $data = [
            'users'  => $model->getUsers(),
            'title'  => 'Listado de Usuarios',
        ];
        return redirect()->to(site_url('users/list/'));
    }

    public function delete($id = null)
    {
        $model = model(UserModel::class);

        $model->delete($id);

        $data = [
            'users'  => $model->getUsers(),
        ];
        return $this->list();
    }

    public function list()
    {
        $model = model(UserModel::class);
        $data = [
            'users'  => $model->getUsers(),
        ];

        return $this->showAdminView('users/list', 'Listado de Usuarios', $data);
    }
}
