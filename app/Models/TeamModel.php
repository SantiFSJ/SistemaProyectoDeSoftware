<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'teams';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'confederation', 'fifa_abreviature', 'category'];

    public function getTeams($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $slug])->first();
    }
}
