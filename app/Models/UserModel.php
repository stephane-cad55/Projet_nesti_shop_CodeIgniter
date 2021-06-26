<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ["lastName", "firstName", "email", "passwordHash", "flag", "login", "address1", "address2", "zipCode", "idCity"];
    protected $returnType = 'App\Entities\Users';
    protected $primaryKey = 'idUsers';

    public function findUserLogin($login){
        return $this->where("login", $login)->first();
    }
}


