<?php

namespace App\Entities;

use App\Models\ImageModel;
use App\Models\ProductModel;
use App\Models\ArticlePriceModel;
use CodeIgniter\Entity;

class Article extends Entity
{
    public function getPrice()
    {
        $articlePriceModel = new ArticlePriceModel();
        return  $articlePriceModel->where("idArticle", $this->idArticle)->first();
    }

    public function getImage()
    {
        $imageModel = new ImageModel();
        return $imageModel->where("idImage", $this->idImage)->first();
    }

    public function getProduct()
    {
        $productModel = new ProductModel();
        return $productModel->where("idProduct", $this->idProduct)->first();
    }
}
