<?php

namespace App\Models;

use CodeIgniter\Model;

class ArticleModel extends Model
{
    protected $table = 'article';
    protected $allowedFields = ['name'];
    protected $returnType = 'App\Entities\Article';
    protected $useTimestamps = true;
    protected $primaryKey = "idArticle";

    public function findArticles()
    {
        $builder = $this->db->table('article');
        $builder->select('product.*, image.name as nameImg, image.idImage, image.fileExtension');
        $builder->join('image', 'article.idImage = image.idImage', 'left');
        $builder->join('product', 'article.idProduct = product.idProduct', 'left');
        return $builder->get()->getResultArray();
    }

    public function findRecipes($id)
    {
        $builder = $this->db->table('recipe');
        $builder->select('recipe.idRecipe, recipe.name');
        $builder->join('ingredientrecipe', 'recipe.idRecipe = ingredientrecipe.idRecipe');
        $builder->join('article', 'article.idProduct = ingredientrecipe.idProduct');
        $builder->where('article.idArticle', $id);
        return $builder->get()->getResultArray();
    }
}
