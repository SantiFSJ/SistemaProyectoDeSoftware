<?php

namespace App\Controllers;

use App\Models\ParticipantModel;
use App\Models\UserModel;


class UserController extends BaseController
{
    public function create()
    {
        return $this->showAdminView('users/form', 'Crea un usuario');
    }

    public function edit($id = null)
    {
        if (isset($id)) {
            $model = model(UserModel::class);
            $data = [
                'user'  => $model->getUserAndParticipant($id),
            ];
            //dd($data['user']);
            return $this->showAdminView('users/form', 'Editar usuario', $data);
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
                    'id' => isset($participant['id']) ? $participant['id'] : '',
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
        if (session()->id_role != 2 and (isset(session()->id_role))) {
            return redirect()->to(site_url('users/list/'));
        } else {
            return redirect()->to(base_url());
        }
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

        return $this->showAdminView('users/list', 'Listado de usuarios', $data);
    }
}
