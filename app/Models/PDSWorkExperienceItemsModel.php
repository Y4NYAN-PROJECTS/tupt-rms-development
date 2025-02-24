<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSWorkExperienceItemsModel extends Model
{
    protected $table = 'tblpdsworkexperienceitems';
    protected $primaryKey = 'workexperience_item_id';
    protected $allowedFields = ['workexperience_id', 'position', 'inclusive_date_from', 'inclusive_date_to', 'company', 'mothly_salary', 'increment', 'appointment_status', 'gov_service', 'date_created'];

    public function getWorkExperienceItems($workexperienceid)
    {
        $workexperiencedata = $this->where('workexperience_id', $workexperienceid)->findAll();
        return $workexperiencedata;
    }

}

