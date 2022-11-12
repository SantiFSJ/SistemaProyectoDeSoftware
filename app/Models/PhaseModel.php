<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TournamentModel;

class PhaseModel extends Model
{
    protected $table = 'phases';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'match_amount', 'team_amount', 'start_date', 'end_date', 'id_tournament']; //si no anda es pq le falta la id.
    //protected $modelTournament = new TournamentModel();
    public function getPhases($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getPhasesOfTournament($tournamentId)
    {
        dd($tournamentId);
        return $this->where(['id_tournament' => $tournamentId]);
    }
    /*public function getTournament($phaseId)
    {
        $data = $this->getPhases($phaseId);
        return $this->modelTournament->getTournament($data['id_tournament']);
    }*/
}
