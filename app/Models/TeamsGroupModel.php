<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamsGroupModel extends Model
{
    protected $table = 'teams_group';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_group', 'id_team'];

    public function getTeamsGroup($id = null, $id_group = null, $id_team = null)
    {
        $builder = $this->db->table('teams_group tg');
        if ($id_group and $id_team) {
            $builder->select('tg.*')
                ->where("id_group = '" . $id_group . "' AND id_team = '" . $id_team . "'");
            return $builder->get()->getResult();
        } elseif ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
