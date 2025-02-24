<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSPersonalModel extends Model
{
    protected $table = 'tblpdspersonal';
    protected $primaryKey = 'personal_id';
    protected $allowedFields = ['account_id', 'first_name', 'middle_name', 'last_name', 'extension_name', 'place_of_birth', 'birthdate', 'sex', 'civil_status', 'height', 'weight', 'blood_type', 'gsis', 'pagibig', 'philhealth', 'sss', 'tin', 'agency', 'citizenship', 'citizenship_by', 'second_country', 'raddress_no', 'raddress_street', 'raddress_village', 'raddress_city', 'raddress_barangay', 'raddress_province', 'raddress_zipcode', 'paddress_no', 'paddress_street', 'paddress_village', 'paddress_city', 'paddress_barangay', 'paddress_province', 'paddress_zipcode', 'telephone_no', 'mobile_no', 'email_address', 'date_created'];

    public function getPersonalData($personalid)
    {
        // $personaldata = $this->where('account_id', $accountid)->first();
        $personaldata = $this->find($personalid);
        return $personaldata;
    }

}

