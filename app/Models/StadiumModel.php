<?php

namespace App\Models;

use CodeIgniter\Model;


class StadiumModel extends Model
{
    protected $table = 'stadiums';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];
    public function getStadiums($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
