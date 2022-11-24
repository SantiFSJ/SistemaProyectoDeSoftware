<?php

namespace App\Controllers;

use App\Models\ParticipantModel;


class ParticipantController extends BaseController
{
    public function create()
    {
        $data = [
            'id_tournament' => $id_tournament,
        ];
        return $this->showAdminView('phases/form', 'Creación de fase', $data);
    }
    public function edit($id = null)
    {
        $model = model(PhaseModel::class);
        if (isset($id)) {
            $data = [
                'phase' => $model->getPhases($id),
            ];
            return $this->showAdminView('phases/form', 'Editar una fase', $data);
        }
    }
}
