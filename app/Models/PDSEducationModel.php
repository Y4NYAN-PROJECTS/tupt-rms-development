<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSEducationModel extends Model
{
    protected $table = 'tblpdseducation';
    protected $primaryKey = 'education_id';
    protected $allowedFields = ['elementary_school', 'elementary_education', 'elementary_period_from', 'elementary_period_to', 'elementary_highest_level', 'elementary_year_graduated', 'elementary_honors', 'secondary_school', 'secondary_education', 'secondary_period_from', 'secondary_period_to', 'secondary_highest_level', 'secondary_year_graduated', 'secondary_honors', 'vocational_school', 'vocational_education', 'vocational_period_from', 'vocational_period_to', 'vocational_highest_level', 'vocational_year_graduated', 'vocational_honors', 'graduatestudies_school', 'graduatestudies_education', 'graduatestudies_period_from', 'graduatestudies_period_to', 'graduatestudies_highest_level', 'graduatestudies_year_graduated', 'graduatestudies_honors', 'college_school', 'college_education', 'college_period_from', 'college_period_to', 'college_highest_level', 'college_year_graduated', 'college_honors', 'date_created'];

    public function getEducationData($educationid)
    {
        $educationdata = $this->find($educationid);
        return $educationdata;
    }

}

