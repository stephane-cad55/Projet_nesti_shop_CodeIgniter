<?php

namespace App\Models;

use CodeIgniter\Model;

class ParagraphModel extends Model
{
    protected $table = "paragraph"; 
    protected $returnType = 'App\Entities\Paragraph';

}