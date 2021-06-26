<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = "orders"; 
    protected $returnType = 'App\Entities\Cart';

}