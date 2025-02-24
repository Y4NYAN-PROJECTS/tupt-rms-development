<?php

namespace App\Models;

use CodeIgniter\Model;

class FoldersModel extends Model
{
    protected $table = 'tblfolders';
    protected $primaryKey = 'folder_id';
    protected $allowedFields = ['folder_code', 'folder_name', 'account_id', 'user_type', 'parent_folder', 'access_level', 'access_level_title', 'hierarchy', 'visits', 'date_created'];

    // [ Employee Files and Folders ]
    public function getMyFolders($accountid, $folderid)
    {
        $result = $this->where('account_id', $accountid)
            ->where('parent_folder', $folderid)
            ->whereIn('user_type', [1, 2])
            ->orderBy('folder_name', 'ASC')
            ->findAll();

        return $result;
    }

    public function getPublicFolders($folderid)
    {
        $builder = $this->builder();
        // Join
        $builder->select('tblfolders.*, tblaccounts.id_number');
        $builder->join('tblaccounts', 'tblaccounts.account_id = tblfolders.account_id', 'left');

        // Conditions
        $builder->where('tblfolders.parent_folder', $folderid);
        $builder->where('tblfolders.access_level', 1);

        // $builder->orderBy('tblfolders.user_type', 'DESC');
        $builder->orderBy('tblfolders.visits', 'DESC');
        $result = $builder->get()->getResultArray();

        return $result;
    }


    // [ Admin Public Folders ]
    public function getAdminPublicFolders($folderid)
    {
        $builder = $this->builder();
        // Join
        $builder->select('tblfolders.*, tblaccounts.id_number, tblaccounts.full_name');
        $builder->join('tblaccounts', 'tblaccounts.account_id = tblfolders.account_id', 'left');

        // Conditions
        $builder->where('tblfolders.parent_folder', $folderid);
        $builder->whereIn('tblfolders.access_level', [1, 2]);

        // $builder->orderBy('tblfolders.user_type', 'DESC');
        $builder->orderBy('tblfolders.visits', 'DESC');
        $results = $builder->get()->getResultArray();

        $systemfolders = [];
        $pandrfolders = [];
        $allpublicfolders = [];

        foreach ($results as $folder) {
            if ($folder['user_type'] == 1 || $folder['user_type'] == 2) {
                $pandrfolders[] = $folder;
            } elseif ($folder['user_type'] == 3) {
                $systemfolders[] = $folder;
            }
            $allpublicfolders[] = $folder;
        }

        return [
            'systemfolders' => $systemfolders,
            'publicandrestrictedfolders' => $pandrfolders,
            'allpublicfolders' => $allpublicfolders,
        ];
    }

    public function getAdminSubFolders($folderid)
    {
        $builder = $this->builder();
        // Join
        $builder->select('tblfolders.*, tblaccounts.id_number');
        $builder->join('tblaccounts', 'tblaccounts.account_id = tblfolders.account_id', 'left');

        // Conditions
        $builder->where('tblfolders.parent_folder', $folderid);
        $builder->whereIn('tblfolders.access_level', [1, 2]);

        // $builder->orderBy('tblfolders.user_type', 'DESC');
        $builder->orderBy('tblfolders.visits', 'DESC');
        $results = $builder->get()->getResultArray();

        return $results;
    }


    public function getAdminParentFolders()
    {
        $parents = $this->where('account_id', $this->accountid)
            ->where('parent_folder', 0)
            ->where('user_type', 1)
            ->findAll();
        return $parents;
    }


    public function getFolderHierarchyPath($folderid, $hierarchy)
    {
        $filepath = [];
        $currentlevel = 0;

        while ($folderid && $currentlevel < $hierarchy) {
            $currentfolder = $this->where('folder_id', $folderid)->first();

            if (!$currentfolder) {
                break;
            }

            $filepath[] = [
                'folder_id' => $currentfolder['folder_id'],
                'folder_code' => $currentfolder['folder_code'],
                'folder_name' => $currentfolder['folder_name'],
            ];
            $folderid = $currentfolder['parent_folder'];
            $currentlevel++;
        }

        $arrayfilepath = array_reverse($filepath);
        // $stringfilepath = implode('/ ', $filepath);
        return $arrayfilepath;
    }

    public function getFolderHierarchyLevel($foldercode)
    {
        $folder = $this->where('folder_code', $foldercode)->first();

        if ($folder) {
            $parenthierarchylevel = $folder['hierarchy'];
            $hierarchylevel = $parenthierarchylevel + 1;
        } else {
            $hierarchylevel = 1;
        }

        return $hierarchylevel;
    }

    public function folderVisit($folderid)
    {
        $folder = $this->find($folderid);

        if (!$folder) {
            return false;
        }

        $visit = (int) $folder['visits'] + 1;
        $result = $this->update($folderid, ['visits' => $visit]);

        return $result;
    }


    public function updateFolderAccessLevel($folderid, $accesslevel, $title)
    {
        $filesModel = new FilesModel();
        $filesModel->where('folder_id', $folderid)->set([
            'access_level' => $accesslevel,
            'access_level_title' => $title
        ])->update();

        $this->update($folderid, [
            'access_level' => $accesslevel,
            'access_level_title' => $title
        ]);

        $subfolders = $this->where('parent_folder', $folderid)->findAll();


        foreach ($subfolders as $subfolder) {
            $this->updateFolderAccessLevel($subfolder['folder_id'], $accesslevel, $title);
        }
    }

    public function deleteFolder($folderid)
    {
        $filesModel = new FilesModel();
        $files = $filesModel->where('folder_id', $folderid)->findAll();

        foreach ($files as $file) {
            $filesModel->delete($file['file_id']);
            $filePath = FCPATH . $file['file_path'];

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $this->delete($folderid);

        $subfolders = $this->where('parent_folder', $folderid)->findAll();
        foreach ($subfolders as $subfolder) {
            $this->deleteFolder($subfolder['folder_id']);
        }
    }
}
