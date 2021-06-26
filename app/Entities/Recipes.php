<?php

namespace App\Entities;

use App\Models\ParagraphModel;
use App\Models\IngredientRecipeModel;
use App\Models\CommentModel;
use App\Models\GradesModel;
use App\Models\RecipesModel;
use App\Models\ImageModel;
use CodeIgniter\Entity;

class Recipes extends Entity
{
    public function getCategory()
    {
        $recipeModel = new RecipesModel();
        return $recipeModel->where("idCat", $this->idCat)->findAll();
    }

    public function getImage()
    {
        $imageModel = new ImageModel();
        return $imageModel->where("idImage", $this->idImage)->first();
    }

    public function getGrades()
    {
        $gradesModel = new GradesModel();
        return $gradesModel->where("idRecipe", $this->idRecipe)->first();
    }

    public function getComments()
    {
        $commentsModel = new CommentModel();
        return $commentsModel->where("idRecipe", $this->idRecipe)->findAll();
    }

    public function getIngredientRecipe()
    {
        $ingredientRecipeModel = new IngredientRecipeModel();
        return $ingredientRecipeModel->where("idRecipe", $this->idRecipe)->findAll();
    }

    public function getParagraph()
    {
        $paragraphModel = new ParagraphModel();
        return $paragraphModel->where("idRecipe", $this->idRecipe)->findAll();
    }

    public function getComment($user)
    {
        $commentModel = new CommentModel();
        return $commentModel->where("idRecipe", $this->idRecipe)->where("idUsers",$user->idUsers)->first();
    }

}
