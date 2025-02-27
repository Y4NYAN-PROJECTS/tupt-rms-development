<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeTypeModel extends Model
{
    protected $table = 'tblemployeetype';
    protected $primaryKey = 'employee_type_id';
    protected $allowedFields = ['employee_type_name'];

}

