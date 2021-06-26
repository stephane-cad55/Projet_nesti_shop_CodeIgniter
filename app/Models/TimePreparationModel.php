<?php

namespace App\Models;

use CodeIgniter\Model;

class TimePreparationModel extends Model
{
    protected $table = "recipe";
    protected $returnType = 'App\Entities\TimePreparation'; 
}