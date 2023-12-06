<?php

namespace App\Models;

use CodeIgniter\Model;

class ChallengeModel extends Model{
    protected $table = 'challenges';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_tournament', 'id_user_host', 'name'];


    public function saveAndGetId(array $data){
        $builder = $this->db->table('challenges');
        $builder->insert($data);
        return $this->db->insertID();
    }

}
