<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionHistoryModel extends Model
{
    protected $table = 'tblpromotionhistory';
    protected $primaryKey = 'promotion_history_id ';
    protected $allowedFields = ['account_id', 'plantilla_id', 'date_promoted', 'date_created'];

    public function getPromotionHistory($accountid)
    {
        $builder = $this->builder();
        $builder->select('tblpromotionhistory.*, tblaccounts.*, tblplantilla.*');
        $builder->join('tblaccounts', 'tblpromotionhistory.account_id = tblaccounts.account_id', 'left');
        $builder->join('tblplantilla', 'tblpromotionhistory.plantilla_id = tblplantilla.plantilla_id', 'left');
        $builder->where('tblpromotionhistory.account_id', $accountid);
        $history = $builder->get()->getResultArray();

        return $history;
    }

}

