<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentModel extends Model
{
    protected $table = 'tbldepartment';
    protected $primaryKey = 'department_id';
    protected $allowedFields = ['department_acronym', 'department_name', 'date_created'];

    public function getDepartments()
    {
        $builder = $this->builder();
        $builder->select('tbldepartment.*, tbldepartmentcategory.*');
        $builder->join('tbldepartmentcategory', 'tbldepartmentcategory.department_category_id = tbldepartment.department_category_id', 'left');
        $builder->orderBy('tbldepartment.department_name', 'ASC');

        $result = $builder->get()->getResultArray();
        return $result;
    }

}

