<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSFinalReferenceItemsModel extends Model
{
    protected $table = 'tblpdsfinalreferenceitems';
    protected $primaryKey = 'reference_id';
    protected $allowedFields = ['final_id', 'reference_name', 'reference_address', 'reference_telephone', 'date_created'];

    public function getFinalReferenceItems($finalid)
    {
        $referencedata = $this->where('final_id', $finalid)->findAll();
        return $referencedata;
    }

}

