<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'tblrole';
    protected $primaryKey = 'role_id';
    protected $allowedFields = ['role_code', 'role_description', 'date_created'];

}

