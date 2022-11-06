<?php

namespace App\Controllers;

class LoginController extends BaseController
{
    public function create()
    {
        return $this->showAdminView('teams/form','Carga un Equipo');
    }

    public function save()
    {
        if ($this->request->getMethod() === 'post' && $this->validate([
            'username' => 'required|min_length[3]|max_length[255]',
            
        ])) {
           
        }
    }


    public function view($slug = null)
    {
        return $this->showAdminView('login/login','Inicio de Sesión');
    }
}