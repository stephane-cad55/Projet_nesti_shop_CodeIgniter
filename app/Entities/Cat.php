<?php

namespace App\Entities;

use App\Models\CatModel;
use CodeIgniter\Entity;

class Cat extends Entity
{
    public function getRecipes(){
        $catModel = new CatModel();
        return $catModel->where("idRecipe", $this->idRecipe)->findAll();
    }
}
