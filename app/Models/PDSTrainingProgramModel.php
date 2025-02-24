<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSTrainingProgramModel extends Model
{
    protected $table = 'tblpdstrainingprogram';
    protected $primaryKey = 'trainingprogram_id';
    protected $allowedFields = ['account_id', 'trainingprogram_count', 'date_created'];

    public function getTrainingProgramData($trainingprogramid)
    {
        $trainingprogramdata = $this->find($trainingprogramid);
        return $trainingprogramdata;
    }
}
