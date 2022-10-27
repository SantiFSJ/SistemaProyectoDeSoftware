<?php

namespace App\Controllers;

class UserController extends BaseController
{
    public function create()
    {
            return $this->showAdminView('users/form','Crea un Usuario');
    }

    public function edit($id = null)
    {
        if(isset($id)){
            $model = model(UserModel::class);
            $data = [
                'user'  => $model->getUsers($id),
            ];
            return view('templates/header', ['title' => 'Editar Usuario'])
            . view('users/form', $data)
            . view('templates/footer'); 
        }       
    }


    

    public function save()
    {
        $model = model(UserModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ]);
        }

        $data = [
            'users'  => $model->getUsers(),
            'title'  => 'Listado de Usuarios',
        ];

        return view('templates/header',['title' => 'Listado de Usuarios'])
            . view('users/list', $data)
            . view('templates/footer');
    }

    public function delete($id = null){
        $model = model(UserModel::class);
        
        $model->delete($id);

        $data = [
            'users'  => $model->getUsers(),
        ];
        return view('templates/header')
            . view('users/list', $data)
            . view('templates/footer');
    }

    public function list(){
        $model = model(UserModel::class);
        $data = [
            'users'  => $model->getUsers(),
        ];

        return view('templates/header', $data ,['title' => 'Listado de Usuarios'])
            . view('users/list')
            . view('templates/footer');
    }

    public function index()
    {
        $model = model(TeamModel::class);

        $data = [
            'teams'  => $model->getTeams(),
        ];

        return view('templates/header', $data)
            . view('news/overview')
            . view('templates/footer');
    }

    public function view($slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);

        if (empty($data['news'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
}