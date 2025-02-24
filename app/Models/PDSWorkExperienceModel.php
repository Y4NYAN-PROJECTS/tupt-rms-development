<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSWorkExperienceModel extends Model
{
    protected $table = 'tblpdsworkexperience';
    protected $primaryKey = 'workexperience_id';
    protected $allowedFields = ['account_id', 'workexperience_count', 'date_created'];

    public function getWorkExperienceData($workexperienceid)
    {
        $workexperiencedata = $this->find($workexperienceid);
        return $workexperiencedata;
    }
}
