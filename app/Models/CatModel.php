<?php

namespace App\Models;

use CodeIgniter\Model;

class CatModel extends Model
{
    protected $table = "cat"; 
    protected $returnType = 'App\Entities\Cat';
}