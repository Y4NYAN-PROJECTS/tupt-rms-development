<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSCivilServiceItemsModel extends Model
{
    protected $table = 'tblpdscivilserviceitems';
    protected $primaryKey = 'civilservice_item_id';
    protected $allowedFields = ['civilservice_id', 'career_service', 'rating', 'date_of_examination', 'place_of_examination', 'license_number', 'validity_date', 'date_created'];

    public function getCivilServiceItems($civilserviceid)
    {
        $civilservicedata = $this->where('civilservice_id', $civilserviceid)->findAll();
        return $civilservicedata;
    }
}
