<?php

namespace App\Models;

use CodeIgniter\Model;

class SuggestionsModel extends Model
{
    protected $table = 'recipe';
    protected $allowedFields = ['name'];
    protected $returnType = 'App\Entities\Suggestions';
    protected $useTimestamps = true;
}