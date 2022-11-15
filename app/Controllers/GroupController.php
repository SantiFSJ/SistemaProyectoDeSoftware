<?php

namespace App\Controllers;


use App\Models\GroupModel;


class GroupController extends BaseController
{
    public function create($id)
    {
        $data = [
            'id_phase' => $id,
        ];
        return $this->showAdminView('groups/form', 'Creación de grupo', $data);
    }
    public function edit($id)

    {
        $model = model(GroupModel::class);
        if (isset($id)) {
            $data = [
                'group' => $model->getGroups($id),
            ];
            return $this->showAdminView('groups/form', 'Editar un grupo', $data);
        }
    }
    public function save()
    {
        $model = model(GroupModel::class);
        if ($this->request->getMethod() === 'post') {

            $model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'name' => $this->request->getPost('name'),
                'id_phase' => $this->request->getPost('idPhase'),
            ]);
        }
        return $this->listPhases();
    }
    public function listPhases()
    {
        $modelPhase = model(PhaseModel::class);
        $data = [
            'phases'  => $modelPhase->getPhases(),
        ];
        return $this->showAdminView('phases/list', 'Listado de fases', $data);
    }

    public function list()
    {
        $model = model(GroupModel::class);
        $data = [
            'groups'  => $model->getGroups(),
        ];
        return $this->showAdminView('groups/list', 'Listado de grupos', $data);
    }
}
