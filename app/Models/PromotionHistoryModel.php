<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionHistoryModel extends Model
{
    protected $table = 'tblpromotionhistory';
    protected $primaryKey = 'promotion_history_id ';
    protected $allowedFields = ['account_id', 'plantilla_id', 'id_number', 'date_promoted', 'promotion_status', 'date_created'];

    public function getPromotionHistory($accountid)
    {
        $builder = $this->builder();
        $builder->select('tblpromotionhistory.*, tblplantilla.*');
        $builder->join('tblplantilla', 'tblpromotionhistory.plantilla_id = tblplantilla.plantilla_id', 'left');
        $builder->where('tblpromotionhistory.account_id', $accountid);
        $builder->orderBy('tblpromotionhistory.date_promoted', 'DESC');
        $history = $builder->get()->getResultArray();

        return $history;
    }

}

