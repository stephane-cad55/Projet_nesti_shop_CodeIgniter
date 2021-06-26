<?php

namespace App\Controllers;

use App\Models\SuggestionsModel;

class SuggestionsController extends BaseController
{
    public function suggestions()
    {
        $model = new SuggestionsModel();
        $suggestions = $model->findAll();
        $this->twig->display('suggestions');
    }
}