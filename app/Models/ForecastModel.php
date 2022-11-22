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
}
