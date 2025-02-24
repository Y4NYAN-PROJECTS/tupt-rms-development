<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSFamilyChildrenModel extends Model
{
    protected $table = 'tblpdsfamilychildren';
    protected $primaryKey = 'children_id';
    protected $allowedFields = ['family_id', 'children_name', 'children_birthdate', 'date_created'];

    public function getFamilyChildrens($familyid)
    {
        $familydata = $this->where('family_id', $familyid)->findAll();
        return $familydata;
    }

}

