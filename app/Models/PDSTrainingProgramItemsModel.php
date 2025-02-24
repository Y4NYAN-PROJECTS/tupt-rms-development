<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSTrainingProgramItemsModel extends Model
{
    protected $table = 'tblpdstrainingprogramitems';
    protected $primaryKey = 'trainingprogram_item_id';
    protected $allowedFields = ['trainingprogram_id', 'training_program', 'inclusive_date_from', 'inclusive_date_to', 'hours', 'type_of_ld', 'sponsored_by', 'date_created'];

    public function getTrainingProgramItems($trainingprogramid)
    {
        $trainingprogramdata = $this->where('trainingprogram_id', $trainingprogramid)->findAll();
        return $trainingprogramdata;
    }
}
