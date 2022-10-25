<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'equipos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre','confederacion','abreviatura_fifa','disciplina'];
    
    public function getTeams($slug = false){
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $slug])->first();
    }
}