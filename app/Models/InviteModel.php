<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TournamentModel;

class InviteModel extends Model
{
    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_challenge','id_user_invited','response'];

    public function getPhases($id = false){
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getPhasesOfTournament($tournamentId){
        $data = $this->where(['id_tournament' => $tournamentId])->findAll();
        return $data;
    }

    public function getPhasesByTournamentIdOrderByStartDate($id_tournament){
        $data = $this->where(['id_tournament' => $id_tournament])->orderBy('start_date', 'DESC')->findAll();
        return $data;
    }

}
