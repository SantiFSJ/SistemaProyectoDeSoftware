<?php

namespace App\Controllers;

class TeamController extends BaseController
{
    public function create()
    {
        return view('templates/header', ['title' => 'Carga un Equipo'])
            . view('teams/create')
            . view('templates/footer');
    }

    public function save()
    {
        $model = model(TeamModel::class);
        if ($this->request->getMethod() === 'post' && $this->validate([
            'name' => 'required|min_length[3]|max_length[255]',
        ])) {
            $model->save([
                'nombre' => $this->request->getPost('name'),
            ]);
        }
        return view('templates/header', ['title' => 'Carglistao'])
            . view('teams/list')
            . view('templates/footer');
    }

    public function list(){
        return view('templates/header', ['title' => 'Carglistao'])
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