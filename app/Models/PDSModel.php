<?php

namespace App\Models;

use CodeIgniter\Model;

class PDSModel extends Model
{
    protected $table = 'tblpds';
    protected $primaryKey = 'pds_id';
    protected $allowedFields = ['account_id', 'personal', 'family', 'education', 'civil_service', 'work_experience', 'voluntary_work', 'training_program', 'other_information', 'final', 'is_complete'];

    public function checkPDS($accountid)
    {
        $pds = $this->where('account_id', $accountid)->first();
        return $pds;
    }

    public function updatePDS($accountid, $column, $rowid)
    {
        $row = $this->where('account_id', $accountid)->first();
        $id = $row['pds_id'];
        $result = $this->update($id, [$column => $rowid]);

        return $result;
    }

    public function checkPDSComplete($accountid)
    {
        $pdsrow = $this->where('account_id', $accountid)->first();
        // check all columns if all are not equal to 0

        $result = true;

        foreach ($pdsrow as $column => $value) {
            if ($column != 'is_complete') {
                if ($value == 0) {
                    $result = false;
                }
            }
        }

        if ($result) {
            $id = $pdsrow['pds_id'];
            $this->update($id, ['is_complete' => 1]);
        }

        return $result;
    }

}

