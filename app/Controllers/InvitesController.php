<?php

namespace App\Controllers;

use App\Models\InvitesModel;

class InvitesController extends BaseController
{

    protected $filters = ['allowAll'];

    public function rejectInvite($id, $user_id)
    {
        $model = model(InvitesModel::class);
        $model->rejectInvite($id);
        $response = [
            'status' => 'success',
            'message' => 'Invitación rechazada correctamente.',
        ];
        return $this->response->setJSON($response);
    }

    public function acceptInvite($id, $user_id)
    {
        $model = model(InvitesModel::class);
        $model->acceptInvite($id);
        $response = [
            'status' => 'success',
            'message' => 'Invitación aceptada correctamente.',
        ];
        return $this->response->setJSON($response);
    }
    public function rejectInviteGET($id, $user_id)
    {
        $model = model(InvitesModel::class);
        $model->rejectInvite($id);
        redirect()->to(site_url('challenges/list/'));
    }

    public function acceptInviteGET($id, $user_id)
    {
        $model = model(InvitesModel::class);
        $model->acceptInvite($id);
        redirect()->to(site_url('challenges/list/'));
    }

    public function list($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getInvitesByUser($user_id),
        ];
        return $this->showUserView('invites/list', 'Listado de invitaciones', $data);
    }

    public function listByPending($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getPendingsInvitesByUser($user_id),
        ];
        return $this->showUserView('invites/list', 'Listado de invitaciones pendientes', $data);
    }
    public function listByAccepted($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getAcceptedInvitesByUser($user_id),
        ];
        return $this->showUserView('invites/list', 'Listado de invitaciones aceptadas', $data);
    }
    public function listByRejected($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getRejectedInvitesByUser($user_id),
        ];
        return $this->showUserView('invites/list', 'Listado de invitaciones rechazadas', $data);
    }
}
