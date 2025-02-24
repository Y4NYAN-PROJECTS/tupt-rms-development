<?php

namespace App\Models;

use CodeIgniter\Model;

class StoredProcedureModel extends Model
{

    public function getPublicFolders()
    {
        $query = $this->db->query('CALL GetPublicFolders');
        return $query->getResultArray();
    }

    public function DeleteFolder($folder_id)
    {
        $query = $this->db->query('CALL DeleteFolderProcedure(?)', [$folder_id]);

        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function checkFolderAccess($accountid, $foldercode)
    {
        $this->db->query('CALL CheckFolderAccess(?, ?, @access_granted)', [$accountid, $foldercode]);

        $query = $this->db->query('SELECT @access_granted AS access_granted');
        $result = $query->getRow();

        return $result->access_granted;
    }


    // [ Logs / Notification ]
    public function GetLatestAccountRequest()
    {
        $query = $this->db->query('CALL LatestAccountRequestProcedure');
        return $query->getRowArray();
    }

}

