<?php

namespace App\Entities;

use App\Models\UnitModel;
use App\Models\ProductModel;
use CodeIgniter\Entity;

class IngredientRecipe extends Entity
{
    public function getProduct()
    {
        $productModel = new ProductModel();
        return $productModel->where("idProduct", $this->idProduct)->first();
    }

    public function getUnit()
    {
        $unitModel = new UnitModel();
        return $unitModel->where("idUnit", $this->idUnit)->first();
    }
}
