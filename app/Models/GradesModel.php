<?php

namespace App\Models;

use CodeIgniter\Model;

class GradesModel extends Model
{
    protected $table = "grades";
    protected $returnType = 'App\Entities\Grades'; 
}