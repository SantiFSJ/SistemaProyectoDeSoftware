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
        $builder = $this->db->table($this->table . ' i');
        if ($id === false) {
            $builder->select('i.id, c.id as challenge_id, c.name as challenge_name, t.id as tournament_id, t.name as tournament_name, u.id as user_id, u.username')
                ->join('challenges c', 'c.id = i.id_challenge', 'inner')
                ->join('tournaments t', 't.id = c.id_tournament', 'inner')
                ->join('users u', 'u.id = c.id_user_host', 'inner');
            return $builder->get()->getResult();
        }
        $builder->select('i.id, c.id as challenge_id, c.name as challenge_name, t.id as tournament_id, t.name as tournament_name, u.id as user_id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where('i.id', $id);
        return $builder->get()->getResult();
    }

    public function getInvitesByUser($id_user)
    {
        $builder = $this->db->table($this->table . ' i');
        $builder->select('i.id, i.response, c.id as challenge_id, c.name as challenge_name, t.id as tournament_id, t.name as tournament_name, u.id as user_id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user]);
        return $builder->get()->getResult();
    }

    public function getPendingsInvitesByUser($id_user)
    {
        $builder = $this->db->table($this->table . ' i');
        $builder->select('i.id, i.response, c.id as challenge_id, c.name as challenge_name, t.id as tournament_id, t.name as tournament_name, u.id as user_id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where('i.id_user_invited', $id_user)
            ->where('i.response IS NULL');
        return $builder->get()->getResult();
    }

    public function getAcceptedInvitesByUser($id_user)
    {
        $builder = $this->db->table($this->table . ' i');
        $builder->select('i.id, c.id as challenge_id, c.name as challenge_name, t.id as tournament_id, t.name as tournament_name, u.id as user_id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user, 'response' => 'ACCEPTED']);
        return $builder->get()->getResult();
    }

    public function getRejectedInvitesByUser($id_user)
    {
        $builder = $this->db->table($this->table . ' i');
        $builder->select('i.id, c.id as challenge_id, c.name as challenge_name, t.id as tournament_id, t.name as tournament_name, u.id as user_id, u.username')
            ->join('challenges c', 'c.id = i.id_challenge', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->join('users u', 'u.id = c.id_user_host', 'inner')
            ->where(['id_user_invited' => $id_user, 'response' => 'REJECTED']);
        return $builder->get()->getResult();
    }

    public function rejectInvite($id)
    {
        $builder = $this->db->table($this->table);
        $data = [
            'response' => 'REJECTED'
        ];
        $builder->where('id', $id)->update($data);
    }

    public function acceptInvite($id)
    {
        $builder = $this->db->table($this->table);
        $data = [
            'response' => 'ACCEPTED'
        ];
        $builder->where('id', $id)->update($data);
    }

    public function saveAndGetId(array $data)
    {
        $builder = $this->db->table($this->table);
        $builder->insert($data);
        return $this->db->insertID();
    }
    public function deleteInvitesByChallengeId($id_challenge)
    {
        return $this->where('id_challenge', $id_challenge)->delete();
    }
    public function deleteInvitesByChallengeAndUsersID($id_challenge, array $id_users)
    {
        return $this->where('id_challenge', $id_challenge)->whereNotIn('id_user_invited', $id_users)->delete();
    }

    public function isUserInvitedToChallenge($id_user, $id_challenge)
    {
        $query = $this->db->query("SELECT `i`.`id`, `i`.`response`, `c`.`id` as `challenge_id`, `c`.`name` as `challenge_name`, `t`.`id` as `tournament_id`, `t`.`name` as `tournament_name`, `u`.`id` as `user_id`, `u`.`username`
        FROM `invites` `i`
        INNER JOIN `challenges` `c` ON `c`.`id` = `i`.`id_challenge`
        INNER JOIN `tournaments` `t` ON `t`.`id` = `c`.`id_tournament`
        INNER JOIN `users` `u` ON `u`.`id` = `c`.`id_user_host`
        WHERE `i`.`id_user_invited` = $id_user
        AND `c`.`id` = $id_challenge");
        // Verificar si hay algún resultado
        if ($query->getNumRows() > 0) {
            // Hubo resultados
            return true;
        } else {
            // No hubo resultados
            return false;
        }
    }
}
