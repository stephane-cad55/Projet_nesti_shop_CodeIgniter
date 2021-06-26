<?php

namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model
{
    protected $table = "comment";
    protected $returnType = 'App\Entities\Comment'; 
    protected $allowedFields = ["idRecipe", "idUsers", "commentTitle", "commentContent", "flag"];//colonnes à modifier bdd

    public function findRecipe($idRecipe){
        return $this->where("idRecipe", $idRecipe)->first();
    }
}