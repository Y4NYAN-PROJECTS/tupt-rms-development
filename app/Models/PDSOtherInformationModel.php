<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSOtherInformationModel extends Model
{
    protected $table = 'tblpdsotherinformation';
    protected $primaryKey = 'otherinformation_id';
    protected $allowedFields = ['account_id', 'skill_count', 'recognition_count', 'membership_count', 'date_created'];

    public function getOtherInformationData($otherid)
    {
        $otherdata = $this->find($otherid);
        return $otherdata;
    }

}
