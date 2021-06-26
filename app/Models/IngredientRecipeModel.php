<?php

namespace App\Models;

use CodeIgniter\Model;

class IngredientRecipeModel extends Model
{
    protected $table = "ingredientrecipe"; 
    protected $returnType = 'App\Entities\IngredientRecipe';
}