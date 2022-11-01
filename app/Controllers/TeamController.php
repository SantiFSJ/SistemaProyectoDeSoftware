<?php

namespace App\Controllers;

class TeamController extends BaseController
{
    public function create()
    {
            return $this->showAdminView('teams/form','Carga un Equipo');
    }

    public function edit($id = null)
    {
        if(isset($id)){
            $model = model(TeamModel::class);
            $data = [
                'team'  => $model->getTeams($id),
            ];
            return $this->showAdminView('teams/form','Editar Equipo',$data);
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
                'name' => $this->request->getPost('name'),
                'confederation' => $this->request->getPost('confederation'),
                'fifa_abreviature' => $this->request->getPost('fifaAbreviature'),
                'category' => $this->request->getPost('category'),
            ]);
        }

        return $this->list();
    }

    public function delete($id = null){
        $model = model(TeamModel::class);
        
        $model->delete($id);

        $data = [
            'teams'  => $model->getTeams(),
        ];

        return $this->list();
    }

    public function list(){
        $model = model(TeamModel::class);
        $data = [
            'teams'  => $model->getTeams(),
        ];

        return $this->showAdminView('teams/list','Listado de Equipos',$data);
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