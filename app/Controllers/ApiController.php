<?php

namespace App\Controllers;

use App\Models\TokenModel;
use App\Models\RecipesModel;

class ApiController extends BaseController
{

    public function index()
    {
        return view('api_help');
    }

    public function recipes($token)
    {
        $this->checkToken($token);
        $model = new RecipesModel();
        $recipes = $model->findAllForApi();
        header('Content-Type: application/json');
        echo json_encode($recipes);
        die();
    }

    public function category($token, $cat)
    {
        $this->checkToken($token);
        $model = new RecipesModel();
        if ($cat == "gluten") {

            $recipes = $model->findAllGlutenForApi();
        } else if ($cat == "tradition") {

            $recipes = $model->findAllTraditionForApi();
        } else if ($cat == "season") {

            $recipes = $model->findAllSeasonForApi();
        } else if ($cat == "easy") {

            $recipes = $model->findAllEasyForApi();
        }
        header('Content-Type: application/json');
        echo json_encode($recipes);
        die();
    }

    public function search($token, $ing)
    {
        $this->checkToken($token);
        $model = new RecipesModel();
        $recipes = $model->findSearchForApi($ing);
        header('Content-Type: application/json');
        echo json_encode($recipes);
        die();
    }

    public function recipesIngredient($token, $idRecipe)
    {
        $this->checkToken($token);
        $model = new RecipesModel();
        $ingredient = $model->findIngredientForApi($idRecipe);
        header('Content-Type: application/json');
        echo json_encode($ingredient);
        die();
    }

    public function recipesPreparation($token, $idRecipe)
    {
        $this->checkToken($token);
        $model = new RecipesModel();
        $preparation = $model->findPreparationForApi($idRecipe);
        header('Content-Type: application/json');
        echo json_encode($preparation);
        die();
    }

    private function checkToken($token)
    {
        $model = new TokenModel();
        $token = $model->where('valueToken', $token)->where('stateToken', "a")
            ->first();
        if ($token) {
            //todo
        } else {
            header('Content-Type: application/json');
            echo json_encode("Token invalide");
            die();
        }
    }
}
