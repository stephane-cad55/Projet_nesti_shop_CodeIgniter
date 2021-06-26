<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = "image";
    protected $returnType = 'App\Entities\Image'; 
}