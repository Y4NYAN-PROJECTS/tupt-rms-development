<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSFinalModel extends Model
{
    protected $table = 'tblpdsfinal';
    protected $primaryKey = 'final_id';
    protected $allowedFields = ['account_id', 'id_picture', 'government_id', 'id_number', 'date_or_issuance', 'reference_count', 'date_created'];

    public function getFinalData($finalid)
    {
        $finaldata = $this->find($finalid);
        return $finaldata;
    }

}

