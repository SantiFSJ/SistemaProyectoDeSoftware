<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password', 'id_role'];

    public function getUsers($id = false)
    {
        $builder = $this->db->table('users u');
        if ($id  === false) {
            $builder->select('u.*, r.name as role_name')
                ->join('role r', 'r.id = u.id_role', 'left');
            return $builder->get()->getResult();
        }
        $builder->select('u.*, r.name as role_name')
            ->join('role r', 'r.id = u.id_role', 'left')
            ->where('u.id', $id);
        return $builder->get()->getResult();
    }
    public function getUserByUsername($username)
    {
        $builder = $this->db->table('users u');
        $builder->select('u.*, r.name as role_name')
            ->join('role r', 'r.id = u.id_role', 'left')
            ->where('u.username', $username);
        return $builder->get()->getResult();
    }
    public function saveAndGetId(array $data)
    {
        $builder = $this->db->table('users');
        $builder->insert($data);
        return $this->db->insertID();
    }
    public function getUserAndParticipant($id = false)
    {
        $builder = $this->db->table('users u');
        if ($id  === false) {
            $builder->select('u.*, r.name as role_name, p.id as p_id, p.dni, p.name, p.lastname, p.email, p.birthday_date')
                ->join('role r', 'r.id = u.id_role', 'left')->join('participants p', 'p.id_user = u.id', 'left');
            return $builder->get()->getResult();
        }
        $builder->select('u.*, r.name as role_name, p.id as p_id, p.dni, p.name, p.lastname, p.email, p.birthday_date')
            ->join('role r', 'r.id = u.id_role', 'left')->join('participants p', 'p.id_user = u.id', 'left')
            ->where('u.id', $id);

        return $builder->get()->getResult();
    }
}
