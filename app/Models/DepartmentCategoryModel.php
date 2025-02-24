<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentCategoryModel extends Model
{
    protected $table = 'tbldepartmentcategory';
    protected $primaryKey = 'department_category_id';
    protected $allowedFields = ['department_category_id', 'department_category_code', 'department_category_name'];

}

