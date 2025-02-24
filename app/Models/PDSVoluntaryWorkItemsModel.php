<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSVoluntaryWorkItemsModel extends Model
{
    protected $table = 'tblpdsvoluntaryworkitems';
    protected $primaryKey = 'voluntarywork_item_id';
    protected $allowedFields = ['voluntarywork_id', 'organization', 'inclusive_date_from', 'inclusive_date_to', 'hours', 'nature_of_work', 'date_created'];

    public function getVoluntaryWorkItems($voluntaryworkid)
    {
        $voluntaryworkdata = $this->where('voluntarywork_id', $voluntaryworkid)->findAll();
        return $voluntaryworkdata;
    }

}

