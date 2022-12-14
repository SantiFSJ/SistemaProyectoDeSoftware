<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\PhaseModel;

class FixtureController extends BaseController
{
    public function view($id_tournament)
    {
        dd($id_tournament);
        //asdf
        $modelPhase = model(PhaseModel::class);
        $modelGroup = model(GroupModel::class);
        $data = [
            'id_tournament' => $id_tournament,
            'phases' => $modelPhase->getPhasesByTournamentIdOrderByStartDate($id_tournament),
            'groups' => $modelGroup->getGroupsByIdTournament($id_tournament),
        ];
        return $this->showUserView('fixture', 'Vista del fixture', $data);
    }
}
