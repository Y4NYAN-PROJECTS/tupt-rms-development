<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantillaModel extends Model
{
    protected $table = 'tblplantilla';
    protected $primaryKey = 'plantilla_id';
    protected $allowedFields = ['plantilla_titlecode', 'plantilla_title', 'plantilla_salary_grade', 'plantilla_annual_salary', 'plantilla_status', 'date_created'];

}

