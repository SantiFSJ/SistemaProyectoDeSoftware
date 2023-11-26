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
        $builder = $this->db->table('matches m');
        if ($id) {
            $builder->select('m.*, tl.name as name_local, tv.name as name_visitor, s.name as name_stadium, g.name as group_name')
                ->join('teams tl', 'm.id_local = tl.id')->join('teams tv', 'm.id_visitor = tv.id')
                ->join('stadiums s', 'm.id_stadium = s.id')
                ->join('groups g', 'm.id_group = g.id', 'left')
                ->where('m.id', $id);
        } else {
            $builder->select('m.*, tl.name as name_local, tv.name as name_visitor, s.name as name_stadium, g.name as group_name')
                ->join('teams tl', 'm.id_local = tl.id')->join('teams tv', 'm.id_visitor = tv.id')
                ->join('stadiums s', 'm.id_stadium = s.id')
                ->join('groups g', 'm.id_group = g.id', 'left');
        }
        return $builder->get()->getResult();
    }
    public function getMatchesByPhaseId($id_phase)
    {
        $builder = $this->db->table('matches m');
        $builder->select('m.*, tl.name as name_local, tv.name as name_visitor')
            ->join('teams tl', 'm.id_local = tl.id')->join('teams tv', 'm.id_visitor = tv.id')
            ->join('stadiums s', 'm.id_stadium = s.id')
            ->where('m.id_phase', $id_phase);
        return $builder->get()->getResult();
    }
    public function getMatchesByTournamentId($id_tournament)
    {
        $builder = $this->db->table('matches m');
        $builder->select('m.*, tl.name as name_local, tv.name as name_visitor')
            ->join('teams tl', 'm.id_local = tl.id')->join('teams tv', 'm.id_visitor = tv.id')
            ->join('stadiums s', 'm.id_stadium = s.id')->join('phases p', 'p.id = m.id_phase')
            ->where('p.id_tournament', $id_tournament);
        return $builder->get()->getResult();
    }
}
