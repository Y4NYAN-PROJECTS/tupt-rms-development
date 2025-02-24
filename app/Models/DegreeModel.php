<?php

namespace App\Models;

use CodeIgniter\Model;

class DegreeModel extends Model
{
    protected $table = 'tbldegree';
    protected $primaryKey = 'degree_id';
    protected $allowedFields = ['degree_title'];

}

