<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSOtherInformationItemsModel extends Model
{
    protected $table = 'tblpdsotherinformationitems';
    protected $primaryKey = 'otherinformation_item_id';
    protected $allowedFields = ['otherinformation_id', 'item_type', 'information', 'date_created'];

    public function getOtherInformationItems($otherinformationid)
    {
        $otherinformationdata = $this->where('otherinformation_id', $otherinformationid)->findAll();
        return $otherinformationdata;
    }
}
