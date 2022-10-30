<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','username','password'];
    
    public function getUsers($slug = false){
        if ($slug === false) {
            return $this->findAll();
        }
        return $this->where(['id' => $slug])->first();
    }
}