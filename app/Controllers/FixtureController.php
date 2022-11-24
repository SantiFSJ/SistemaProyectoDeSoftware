<?php

namespace App\Controllers;

use App\Models\GroupModel;
use App\Models\MatchModel;
use App\Models\PhaseModel;
use App\Models\TournamentModel;

class FixtureController extends BaseController
{
    public function view($id_tournament)
    {
        $modelMatch = model(MatchModel::class);
        $modelPhase = model(PhaseModel::class);
        $modelGroup = model(GroupModel::class);
        $modelTournament = model(TournamentModel::class);
        $phases = $modelPhase->getPhasesByTournamentIdOrderByStartDate($id_tournament);

        foreach ($phases as $p) {
            $phase_groups[$p['id']] = [
                'groups' => $modelGroup->getGroupsOfPhase($p['id']),
            ];
        }

        $data = [
            'id_tournament' => $modelTournament->getTournaments($id_tournament),
            'phases' => $modelPhase->getPhasesByTournamentIdOrderByStartDate($id_tournament),
            'phase_groups' => $phase_groups,
            'groups' => $modelGroup->getGroupsByIdTournament($id_tournament),
            'matches' => $modelMatch->getMatchesByTournamentId($id_tournament),
        ];
        return $this->showUserView('fixtures/fixture', 'Vista del fixture', $data);
    }
}
