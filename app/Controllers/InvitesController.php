<?php

namespace App\Controllers;

use App\Models\InviteModel;
use App\Models\InvitesModel;

class InvitesController extends BaseController
{

    public function rejectInvite($id, $user_id)
    {
        $model = model(InviteModel::class);
        $model->rejectInvite($id);
        $data = [
            'invites'  => $model->getPendingsInvitesByUser($user_id),
        ];
        return $this->listByPending($user_id);
    }
    public function acceptInvite($id, $user_id)
    {
        $model = model(InviteModel::class);
        $model->acceptInvite($id);
        $data = [
            'invites'  => $model->getPendingsInvitesByUser($user_id),
        ];
        return $this->listByPending($user_id);
    }
    public function list($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getInvitesByUser($user_id),
        ];
        return $this->showAdminView('invites/list', 'Listado de invitaciones', $data);
    }

    public function listByPending($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getPendingsInvitesByUser($user_id),
        ];
        return $this->showAdminView('invites/list', 'Listado de invitaciones pendientes', $data);
    }
    public function listByAccepted($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getAcceptedInvitesByUser($user_id),
        ];
        return $this->showAdminView('invites/list', 'Listado de invitaciones aceptadas', $data);
    }
    public function listByRejected($user_id)
    {
        $model = model(InvitesModel::class);
        $data = [
            'invites'  => $model->getAcceptedInvitesByUser($user_id),
        ];
        return $this->showAdminView('invites/list', 'Listado de invitaciones rechazadas', $data);
    }
}
