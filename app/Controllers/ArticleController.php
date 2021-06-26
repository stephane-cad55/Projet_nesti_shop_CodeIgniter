<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\UserModel;

class ArticleController extends BaseController
{
    public function list()
    {
        $data["loggedInUser"] = UserController::getLoggedInUser();

        $data["slug"] = "articles"; //routes pour savoir ou on va

        $articleModel = new ArticleModel();
        $articles =  $articleModel->findAll();
        $data["articles"] = $articles;

        $this->twig->display('article/list', $data);
    }

    public function oneArticle($idArticle)
    {
        $data["loggedInUser"] = UserController::getLoggedInUser();

        $data["slug"] = "articles";

        $oneArticleModel = new ArticleModel();
        $oneArticle =  $oneArticleModel->find($idArticle);
        $data["article"] = $oneArticle;

        $listRecipes = $oneArticleModel->findRecipes($idArticle);
        $data["recipes"] = $listRecipes;

        $this->twig->display('article/oneArticle', $data);
    }
}
