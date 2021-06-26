<?php

namespace App\Models;

use CodeIgniter\Model;

class TokenModel extends Model
{
    protected $table = "tokenapi";
    protected $returnType = 'App\Entities\Token'; 
}
