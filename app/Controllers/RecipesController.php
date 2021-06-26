<?php

namespace App\Controllers;

$session = \Config\Services::session();

use App\Entities\Comment;
use App\Models\ParagraphModel;
use App\Models\IngredientRecipeModel;
use App\Models\TimePreparationModel;
use App\Models\CommentModel;
use App\Models\GradesModel;
use App\Models\CatModel;
use App\Models\RecipesModel;

class RecipesController extends BaseController
{
    public function recipes()
    {
        $data["loggedInUser"] = UserController::getLoggedInUser();

        $data["slug"] = "recipes"; //routes pour savoir ou on va

        $model = new RecipesModel();
        $recipes = $model->findAll();
        $data["recipes"] = $recipes;

        $modelCat = new CatModel();
        $cat = $modelCat->findAll();
        $data["cat"] = $cat;

        $modelGrades = new GradesModel();
        $grades = $modelGrades->findAll();
        $data["grades"] = $grades;

        $modelComment = new CommentModel();
        $comment = $modelComment->findAll();
        $data["comment"] = $comment;

        $this->twig->display('recipe/recipes', $data);
    }

    public function recipeDetail($idRecipe)
    {
        $data["loggedInUser"] = UserController::getLoggedInUser();

        $data["slug"] = "recipes"; //routes pour savoir ou on va

        $recipeDetailmodel = new RecipesModel();
        $recipeDetail = $recipeDetailmodel->find($idRecipe);
        $data["recipe"] = $recipeDetail;

        $modelTimePreparation = new TimePreparationModel();
        $Timepreparation = $modelTimePreparation->find();
        $data["timepreparation"] = $Timepreparation;

        $modelCatRecipe = new CatModel();
        $catRecipe = $modelCatRecipe->find();
        $data["cat"] = $catRecipe;

        $modelIngredientRecipe = new IngredientRecipeModel();
        $ingredientRecipe = $modelIngredientRecipe->find();
        $data["listIngredient"] = $ingredientRecipe;

        $modelParagraph = new ParagraphModel();
        $paragraph = $modelParagraph->find();
        $data["paragraph"] = $paragraph;

        if (isset($_POST['titleComment'])) {
            $commentModel = new CommentModel();
            if(!UserController::getLoggedInUser()){
                redirect('/connection');
            }
            $comment = $recipeDetail->getComment(UserController::getLoggedInUser());
            if ($comment == null) {
                $title =  sanitize_filename($_POST['titleComment']);
                $content =  sanitize_filename($_POST['contentComment']);
                if (!empty($content) && !empty($title)) {
                    $comment = new Comment();
                    $comment->setRecipe($recipeDetail);
                    $comment->setUser(UserController::getLoggedInUser());
                    $comment->commentTitle = $title;
                    $comment->commentContent = $content;
                    $comment->flag = "a";

                    $commentModel->save($comment);

                    $data["commentSave"] = "success";
                }
            } else {
                $data["commentSave"] = "failed";
            }
        }
        $_SESSION["listRecipes"][$idRecipe] = date("Y-m-d H:i:s");

        $this->twig->display('recipe/recipeDetail', $data);
    }
}
