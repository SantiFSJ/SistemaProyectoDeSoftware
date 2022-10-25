<?php

namespace App\Controllers;

class TeamController extends BaseController
{
    public function create()
    {
            return view('templates/header', ['title' => 'Carga un Equipo'])
            . view('teams/form')
            . view('templates/footer');
    }

    public function edit($id = null)
    {
        if(isset($id)){
            $model = model(TeamModel::class);
            $data = [
                'team'  => $model->getTeams($id),
            ];
            return view('templates/header', ['title' => 'Editar Equipo'])
            . view('teams/form', $data)
            . view('templates/footer'); 
        }       
    }


    

    public function save()
    {
        $model = model(TeamModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'nombre' => $this->request->getPost('name'),
                'confederacion' => $this->request->getPost('confederation'),
                'abreviatura_fifa' => $this->request->getPost('fifaAbreviature'),
                'disciplina' => $this->request->getPost('discipline'),
            ]);
        }

        $data = [
            'teams'  => $model->getTeams(),
            'title'  => 'Listado de Equipos',
        ];

        return view('templates/header',['title' => 'Listado de Equipos'])
            . view('teams/list', $data)
            . view('templates/footer');
    }

    public function delete($id = null){
        $model = model(TeamModel::class);
        
        $model->delete($id);

        $data = [
            'teams'  => $model->getTeams(),
        ];
        return view('templates/header')
            . view('teams/list', $data)
            . view('templates/footer');
    }

    public function list(){
        $model = model(TeamModel::class);
        $data = [
            'teams'  => $model->getTeams(),
        ];

        return view('templates/header', $data ,['title' => 'Listado de Equipos'])
            . view('teams/list')
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