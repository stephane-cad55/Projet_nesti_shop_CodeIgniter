<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticlePriceModel extends Model
{
    protected $table = "articleprice";
    protected $returnType = 'App\Entities\ArticlePrice';

    public function priceArticles()
    {
        $builder = $this->db->table('articleprice');
        $builder->select('articleprice.*, articleprice.idArticle ,articleprice.price');
        return $builder->get()->getResultArray();
    }
}
