<?php

namespace App\Controllers;

use App\Models\ParticipantModel;
use App\Models\PhaseModel;

class FixtureController extends BaseController
{
    public function view($id_tournament)
    {
        dd($id_tournament);
        $modelPhase = model(PhaseModel::class);
        $data = [
            'id_tournament' => $id_tournament,
            'phases' => $modelPhase->getPhasesByTournamentIdOrderByStartDate($id_tournament),
        ];
        return $this->showUserView('fixture', 'Vista del fixture', $data);
    }
}
