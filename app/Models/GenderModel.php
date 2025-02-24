<?php

namespace App\Models;

use CodeIgniter\Model;

// rename the class same as the file name from database


class GenderModel extends Model
{
    protected $table = 'tblgender';
    protected $primaryKey = 'gender_id';
    protected $allowedFields = ['gender_name'];

}

