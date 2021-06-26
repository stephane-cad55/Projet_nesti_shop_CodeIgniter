<?php

namespace App\Controllers;


use App\Models\CartModel;

class CartController extends BaseController
{
    public function cart()
    {
        $data["loggedInUser"] = UserController::getLoggedInUser();
     
        $data["slug"] = "cart"; //routes pour savoir ou on va
        $model = new CartModel();
        $cart = $model->findAll();
        $this->twig->display('cart', $data);
    }
}
