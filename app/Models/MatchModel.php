<?php

namespace App\Models;

use CodeIgniter\Model;

class MatchModel extends Model
{
    protected $table = 'matches';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'id_phase', 'id_group', 'id_local', 'id_visitor', 'date_time', 'result', 'id_stadium'];
    public function getMatches($id = null)
    {
        if ($id) {
            return $this->where(['id' => $id])->first();
        } else
            return $this->findAll();
    }
}
