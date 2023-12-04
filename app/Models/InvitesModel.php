<?php

namespace App\Models;

use CodeIgniter\Model;

class InvitesModel extends Model{
    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_challenge', 'id_user_invited', 'response'];

    public function getInvites($id = false){
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getInvitesByUser($id_user){
        return $this->where(['id_user_invited' => $id_user])->findAll();
    }
    public function getPendingsInvitesByUser($id_user){
        return $this->where(['id_user_invited' => $id_user, 'response IS NULL'])->findAll();
    }
    public function getAcceptedInvitesByUser($id_user){
        return $this->where(['id_user_invited' => $id_user, 'response' => 'ACCEPTED'])->findAll();
    }
    public function getRejectedInvitesByUser($id_user){
        return $this->where(['id_user_invited' => $id_user, 'response' => 'REJECTED'])->findAll();
    }
    public function rejectInvite($id){
        $builder = $this->db->table('invites');
        $builder->where('id', $id);
        $data = [
            'response' => 'REJECTED'
        ];
        $builder->update($data);
    }
    public function acceptInvite($id){
        $builder = $this->db->table('invites');
        $builder->where('id', $id);
        $data = [
            'response' => 'ACCEPTED'
        ];
        $builder->update($data);
    }

    public function saveAndGetId(array $data){
        $builder = $this->db->table('invites');
        $builder->insert($data);
        return $this->db->insertID();
    }
    
}
