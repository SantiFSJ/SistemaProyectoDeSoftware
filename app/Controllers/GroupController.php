<?php

namespace App\Controllers;


use App\Models\GroupModel;


class GroupController extends BaseController
{
    public function create($id){
        $data = [
            'id_phase' => $id,
        ];
        return $this->showAdminView('groups/form', 'Creación de grupo', $data);
    }

    public function edit($id){
        $model = model(GroupModel::class);
        if (isset($id)) {
            $data = [
                'group' => $model->getGroups($id),
            ];

            return $this->showAdminView('groups/form', 'Editar un grupo', $data);
        }
    }

    public function save(){
        //dd($this->request);
        $model = model(GroupModel::class);
        if ($this->request->getMethod() === 'post') {
            $model->save([
                'id' => ($this->request->getPost('id')) !== null ? $this->request->getPost('id') : '',
                'name' => $this->request->getPost('name'),
                'id_phase' => $this->request->getPost('id_phase'),
            ]);
            return redirect()->to(site_url('groups/list/' . $this->request->getPost('id_phase')));
        }
        return redirect()->to(site_url('groups/list/'));
    }
    public function listGroups($id_phase = null) //Dos function duplicadas XD
    {
        $model = model(GroupModel::class);
        if ($id_phase) {
            $data = [
                
                'groups'  => $model->getGroupsOfPhase($id_phase),
            ];
        } else {
            $data = [
                'groups'  => $model->getGroups(),
            ];
        }

        return $this->showAdminView('groups/list', 'Listado de grupos', $data);
    }

    public function list($id_phase = null)
    {
        $model = model(GroupModel::class);
        if (isset($id_phase)) {
            $data = [
                'phaseId' => $id_phase,
                'groups'  => $model->getGroupsOfPhase($id_phase),
            ];
        } else {
            $data = [
                'groups'  => $model->getGroups(),
            ];
        }
        return $this->showAdminView('groups/list', 'Listado de grupos', $data);
    }


    public function delete($id = null,$id_phase = null){
        $model = model(GroupModel::class);
        $model->delete($id);
        return $this->list($id_phase);

    }


}
