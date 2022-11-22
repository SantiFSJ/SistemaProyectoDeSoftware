<?php

namespace App\Models;

use CodeIgniter\Model;

class BetModel extends Model
{
    protected $table = 'bets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'id_phase', 'creation_date'];
    public function getBets($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getBetsByUserId($id)
    {
        return $this->where(['id_user' => $id])->findAll();
    }
}
