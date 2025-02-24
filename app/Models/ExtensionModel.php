<?php

namespace App\Models;

use CodeIgniter\Model;

// rename the class same as the file name from database


class ExtensionModel extends Model
{
    protected $table = 'tblnameextension';
    protected $primaryKey = 'extension_id';
    protected $allowedFields = ['extension_name'];

}

