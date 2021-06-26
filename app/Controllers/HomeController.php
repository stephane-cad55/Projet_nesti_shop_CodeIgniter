<?php

namespace App\Controllers;
$session = \Config\Services::session();
use App\Models\RecipesModel;

class HomeController extends BaseController
{
	public function index()
	{
		if (!isset($_SESSION["listRecipes"])) {
			$_SESSION["listRecipes"] = [];
		}
		arsort($_SESSION["listRecipes"]);
		$lastPages = array_slice($_SESSION["listRecipes"], 0, 5, true);
		$recipesModel = new RecipesModel();
		if (isset($_SESSION["listRecipes"])) {
			foreach ($lastPages as $id => $date) {
				$recipe = $recipesModel->find($id);
				$data["recipes"][] = $recipe;
			}
		}
		$data["loggedInUser"] = UserController::getLoggedInUser();
		$this->twig->display('home.html', $data);
	}
}
