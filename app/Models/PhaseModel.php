<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TournamentModel;

class PhaseModel extends Model
{
    protected $table = 'phases';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'match_amount', 'team_amount', 'start_date', 'end_date', 'id_tournament', 'is_elimination']; //si no anda es pq le falta la id.

    public function getPhases($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getPhasesOfTournament($tournamentId)
    {
        $data = $this->where(['id_tournament' => $tournamentId])->findAll();
        return $data;
    }
    public function getPhasesByTournamentIdOrderByStartDate($id_tournament)
    {
        $data = $this->where(['id_tournament' => $id_tournament])->orderBy('start_date', 'DESC')->findAll();
        return $data;
    }
}
