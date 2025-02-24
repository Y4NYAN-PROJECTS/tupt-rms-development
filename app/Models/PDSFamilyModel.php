<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSFamilyModel extends Model
{
    protected $table = 'tblpdsfamily';
    protected $primaryKey = 'family_id';
    protected $allowedFields = ['account_id', 'spouse_last_name', 'spouse_first_name', 'spouse_middle_name', 'spouse_extension_name', 'spouse_occupation', 'spouse_employer_or_business_name', 'spouse_business_address', 'spouse_telephone_no', 'children_count', 'father_last_name', 'father_first_name', 'father_middle_name', 'father_extension_name', 'mother_last_name', 'mother_first_name', 'mother_middle_name', 'mother_maiden_name', 'date_created'];

    public function getFamilyData($familyid)
    {
        $familydata = $this->find($familyid);
        return $familydata;
    }

}

