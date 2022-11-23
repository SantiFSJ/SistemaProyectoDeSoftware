<?php

namespace App\Models;

use CodeIgniter\Model;

class ParticipantModel extends Model
{
    protected $table = 'participant';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dni', 'name', 'lastname', 'email', 'birthday_date', 'id_user'];
    public function getParticipants($id = null)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getParticipantsByUserId($id_user)
    {
        return $this->where(['id_user' => $id_user])->first();
    }
}
