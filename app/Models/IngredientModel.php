<?php

namespace App\Models;

use CodeIgniter\Model;

class IngredientModel extends Model
{
    protected $table = "ingredient"; 
    protected $returnType = 'App\Entities\Ingredient';

}