<?php

namespace App\Models;

use CodeIgniter\Model;

class FilesModel extends Model
{
    protected $table = 'tblfiles';
    protected $primaryKey = 'file_id';
    protected $allowedFields = ['folder_id', 'file_name', 'file_type', 'file_size', 'file_path', 'access_level', 'access_level_title', 'date_created'];

    public function getFiles()
    {
        $files = $this->findAll();
        return $files;
    }

    public function getFolderFiles($folderid)
    {
        $folderfiles = $this->where('folder_id', $folderid)->findAll();
        return $folderfiles;
    }

    public function deleteFile($fileid)
    {
        $delete = $this->where('file_id', $fileid)->delete();
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }

}

