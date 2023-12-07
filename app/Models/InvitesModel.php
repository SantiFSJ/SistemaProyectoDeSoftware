<?php

namespace App\Models;

use CodeIgniter\Model;

class InvitesModel extends Model
{
    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_challenge', 'id_user_invited', 'response'];

    public function getInvites($id = false)
    {
        $builder = $this->db->table('invites i');
        if ($id === false) {
            $builder->select('i.id, c.id, c.name as challenge_name, t.id, t.name as tournament_name, u.id, u.username')
                ->join('challenges c', 'c.id = i.id_challenge', 'inner')
                ->join('tournaments t', 't.id = c.id_tournament', 'inner')
                ->join('users u', 'u.id = c.id_user_host', 'inner');
            return $builder->get()->getResult();
        }
        $builder->select('i.id, c.id, c.name as challenge_name, t.id, t.name as tournament_name, u.id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where('i.id', $id);
        return $builder->get()->getResult();
    }

    public function getInvitesByUser($id_user)
    {
        $builder = $this->db->table('invites i');
        $builder->select('i.id, c.id, c.name as challenge_name, t.id, t.name as tournament_name, u.id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user]);
        return $builder->get()->getResult();
    }
    public function getPendingsInvitesByUser($id_user)
    {
        $builder = $this->db->table('invites i');
        $builder->select('i.id, c.id, c.name as challenge_name, t.id, t.name as tournament_name, u.id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user, 'response IS NULL']);
        return $builder->get()->getResult();
    }
    public function getAcceptedInvitesByUser($id_user)
    {
        $builder = $this->db->table('invites i');
        $builder->select('i.id, c.id, c.name as challenge_name, t.id, t.name as tournament_name, u.id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user, 'response' => 'ACCEPTED']);
        return $builder->get()->getResult();
    }
    public function getRejectedInvitesByUser($id_user)
    {
        $builder = $this->db->table('invites i');
        $builder->select('i.id, c.id, c.name as challenge_name, t.id, t.name as tournament_name, u.id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user, 'response' => 'REJECTED']);
        return $builder->get()->getResult();
    }
    public function rejectInvite($id)
    {
        $builder = $this->db->table('invites');
        $builder->where('id', $id);
        $data = [
            'response' => 'REJECTED'
        ];
        $builder->update($data);
    }
    public function acceptInvite($id)
    {
        $builder = $this->db->table('invites');
        $builder->where('id', $id);
        $data = [
            'response' => 'ACCEPTED'
        ];
        $builder->update($data);
    }

    public function saveAndGetId(array $data)
    {
        $builder = $this->db->table('invites');
        $builder->insert($data);
        return $this->db->insertID();
    }
}
