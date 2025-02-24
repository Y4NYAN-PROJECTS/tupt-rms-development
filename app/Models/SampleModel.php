<?php

namespace App\Models;

use CodeIgniter\Model;

// rename the class same as the file name from database


class SampleModel extends Model
{
    protected $table = 'tblsample';
    protected $primaryKey = 'sample_id';
    protected $allowedFields = ['column_name1', 'column_name2', 'column_name3'];
}
