<?php

namespace App\Models;

use App\Models\PhaseModel;

use CodeIgniter\Model;

class TournamentModel extends Model
{
    protected $table = 'tournaments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'start_date', 'end_date']; //si no anda es pq le falta la id.
    protected $modelPhase = new PhaseModel(); //cuidado
    public function getTournaments($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function addPhase($phase)
    {
        $this->modelPhase->save([
            'name' => $phase['name'],
            'match_amount' => $phase['match_amount'],
            'team_amount' => $phase['team_amount'],
            'start_date' => $phase['start_date'],
            'end_date' => $phase['end_date'],
            'id_tournament' => $phase['id_tournament'],
        ]);
    }
    public function getPhases($tournamentId)
    {
        return $this->modelPhase->getPhases($tournamentId);
    }
}
