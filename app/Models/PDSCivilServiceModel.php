<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSCivilServiceModel extends Model
{
    protected $table = 'tblpdscivilservice';
    protected $primaryKey = 'civilservice_id';
    protected $allowedFields = ['account_id', 'civilservice_count', 'date_created'];

    public function getCivilServiceData($civilserviceid)
    {
        $civilservicedata = $this->find($civilserviceid);
        return $civilservicedata;
    }
}
