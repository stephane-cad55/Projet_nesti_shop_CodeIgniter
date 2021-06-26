<?php

namespace App\Models;

use CodeIgniter\Model;

class RecipesModel extends Model
{
    // protected $table = 'recipes';
    // protected $allowedFields = ['name'];
    // protected $returnType = 'App\Entities\Recipes';
    // protected $useTimestamps = true;

    public function findAllForApi()
    {
        $query = $this->db->query('SELECT * FROM `view_api_recipes`');
        return $query->getResult();
    }

    public function findAllGlutenForApi()
    {
        $query = $this->db->query('SELECT * FROM `view_api_recipes` WHERE cat="sans gluten"');
        return $query->getResult();
    }

    public function findAllTraditionForApi()
    {
        $query = $this->db->query('SELECT * FROM `view_api_recipes` WHERE cat="tradition"');
        return $query->getResult();
    }

    public function findAllSeasonForApi()
    {
        $query = $this->db->query('SELECT * FROM `view_api_recipes` WHERE cat="de saison"');
        return $query->getResult();
    }

    public function findAllEasyForApi()
    {
        $query = $this->db->query('SELECT * FROM `view_api_recipes` WHERE cat="facile"');
        return $query->getResult();
    }

    public function findSearchForApi($ing){
        $query = $this->db->query('SELECT * FROM `view_api_recipes` WHERE title LIKE "%'.$ing.'%"');
        return $query->getResult();
    }

    public function findIngredientForApi($idRecipe){
        $builder = $this->db->table('view_api_ingredient');
            $builder->where("idRecipe", $idRecipe);
            return $builder->get()->getResult();
    }

    public function findPreparationForApi($idRecipe){
        $builder = $this->db->table('view_api_preparation');
            $builder->where("idRecipe", $idRecipe);
            return $builder->get()->getResult();
    }

    protected $table = 'recipe';
    protected $allowedFields = ['name']; //entre crochet nom colonne table que l'on veut modifier
    protected $returnType = 'App\Entities\Recipes';
    protected $useTimestamps = true;
    protected $primaryKey = "idRecipe";

}
