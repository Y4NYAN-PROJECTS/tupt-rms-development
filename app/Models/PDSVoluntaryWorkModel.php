<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSVoluntaryWorkModel extends Model
{
    protected $table = 'tblpdsvoluntarywork';
    protected $primaryKey = 'voluntarywork_id';
    protected $allowedFields = ['account_id', 'voluntarywork_count', 'date_created'];

    public function getVoluntaryWorkData($voluntaryworkid)
    {
        $voluntaryworkdata = $this->find($voluntaryworkid);
        return $voluntaryworkdata;
    }
}
