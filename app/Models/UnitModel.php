<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitModel extends Model
{
    protected $table = "unit";
    protected $returnType = 'App\Entities\Unit'; 
}