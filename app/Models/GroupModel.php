<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TournamentModel;

class GroupModel extends Model
{
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'id_phase'];

    public function getGroups($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getGroupsOfPhase($phaseId)
    {
        return $this->where(['id_phase' => $phaseId])->findAll();
    }

    public function getGroupsByIdTournament($id_tournament)
    {
        return $this->select('g.*')->distinct()->from('groups g')->join('phases p', 'p.id = g.id_phase')->where(['p.id_tournament' => $id_tournament])->findAll();
    }
}
