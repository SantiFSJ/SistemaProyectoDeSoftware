<?php

namespace App\Models;

use CodeIgniter\Model;

class ForecastModel extends Model
{
    protected $table = 'forecasts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_bet', 'id_match', 'expected_result'];
    public function getForecasts($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getForecastsByBetId($id)
    {
        return $this->where(['id_bet' => $id])->findAll();
    }
    public function deleteByBetId($id)
    {
        return $this->where(['id_bet' => $id])->delete();
    }
    public function findByUserAndPhase($id_user, $id_phase){
        $query = $this->db->query('SELECT m.*, s.name as stadium_name, tl.name as local, tv.name visitor, (select b.id from bets b where b.id_user = ' . $id_user . ' and b.id_phase = ' . $id_phase . ') bet_id, f.id as forecast_id, f.expected_result
        FROM matches m left join teams tl on ( m.id_local = tl.id) join teams tv on (m.id_visitor = tv.id) left join forecasts f ON (f.id_match = m.id) join stadiums s ON (m.id_stadium = s.id) where m.id_phase = ' . $id_phase . ' order by 1');

        return $query->getResult();
    }
}
