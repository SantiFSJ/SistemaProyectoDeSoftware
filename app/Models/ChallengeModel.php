<?php

namespace App\Models;

use CodeIgniter\Model;

class ChallengeModel extends Model
{
    protected $table = 'challenges';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_tournament', 'id_user_host', 'name'];
    protected $invitesModel = model(InvitesModel::class);


    public function saveAndGetId(array $data)
    {
        $builder = $this->db->table('challenges');
        $builder->insert($data);
        return $this->db->insertID();
    }

    public function deleteById($id)
    {
        $modelInvite = model(InvitesModel::class);
        $modelInvite->deleteInvitesByChallengeId($id);
        return $this->where('id', $id)->delete();
    }

    public function getChallengeById($id)
    {
        $builder = $this->db->table('challenges c');
        $builder->select('c.*,t.*')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->where(['c.id' => $id]);
        return $builder->get()->getResultObject();
    }
    public function getChallengesByTournamentId($id)
    {
        $builder = $this->db->table('challenges c');
        $builder->select('c.*,t.*')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->where(['t.id' => $id]);
        return $builder->get()->getResultObject();
    }
    public function getAcceptedChallengesByUserId($id_user)
    {
        $builder = $this->db->table('challenges c');
        $builder->select('c.*,u.username, t.*, i.response')
            ->join('invites i', 'i.id_challenge = c.id', 'inner')
            ->join('users u', 'u.id = i.id_user_invited', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->where(['i.id_user_invited' => $id_user, 'i.response' => 'ACCEPTED']);
        return $builder->get()->getResultObject();
    }
    public function getRejectedChallengesByUserId($id_user)
    {
        $builder = $this->db->table('challenges c');
        $builder->select('c.*,u.username, t.*, i.response')
            ->join('invites i', 'i.id_challenge = c.id', 'inner')
            ->join('users u', 'u.id = i.id_user_invited', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->where(['i.id_user_invited' => $id_user, 'i.response' => 'REJECTED']);
        return $builder->get()->getResultObject();
    }
    public function getPendingChallengesByUserId($id_user)
    {
        $builder = $this->db->table('challenges c');
        $builder->select('c.*,u.username, t.*, i.response')
            ->join('invites i', 'i.id_challenge = c.id', 'inner')
            ->join('users u', 'u.id = i.id_user_invited', 'inner')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->where(['i.id_user_invited' => $id_user, 'i.response IS NULL']);
        return $builder->get()->getResultObject();
    }
    public function getCreatedChallengesByUserId($id_user)
    {
        $builder = $this->db->table('challenges c');
        $builder->select('c.*,t.*')
            ->join('tournaments t', 't.id = c.id_tournament', 'inner')
            ->where(['c.id_user_host' => $id_user]);
        return $builder->get()->getResultObject();
    }
    public function deleteByTournamentId($id)
    {
        $modelInvite = model(InvitesModel::class);
        $challenges = $this->getChallengesByTournamentId($id);
        foreach ($challenges as $key => $value) {
            $modelInvite->deleteInvitesByChallengeId($value['c.id']); //Debuggear
        }
        return $this->where('id_tournament', $id)->delete();
    }
}
