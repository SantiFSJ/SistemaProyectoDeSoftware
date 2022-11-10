<?php

namespace App\Controllers;

use App\Models\GroupModel;


class GroupController extends BaseController
{
    public function create($id)
    {
        $data = [
            'id' => $id,
        ];
        return $this->showAdminView('group/form', 'Creación de grupo', $data);
    }
    public function edit($id)
    {
        $model = model(GroupModel::class);
        if (isset($id)) {
            $data = [
                'match' => $model->getMatches($id),
            ];
            return $this->showAdminView('group/form', 'Modificación de grupo', $data);
        }
    }
    public function save()
    {
        $model = model(GroupModel::class);
        if ($this->request->getMethod() === 'POST') {
            $model->save([
                'id' => $this->request->getPost('id'),
                'name' => $this->request->getPost('name'),
            ]);
        }
        return redirect()->to(site_url('group/list'));
    }
    public function delete($id)
    {
        $model = model(GroupModel::class);
        $model->delete($id);
        return redirect()->to(site_url('group/list'));
    }
    public function view()
    {
        return $this->showAdminView('group/list', 'Lista de grupos');
    }
}
