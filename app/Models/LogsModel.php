<?php

namespace App\Models;

use CodeIgniter\Model;

class LogsModel extends Model
{
    protected $table = 'tbllogs';
    protected $primaryKey = 'logs_id';
    protected $allowedFields = ['account_id', 'log_to', 'category', 'title', 'description', 'is_complete', 'date_created'];

    public function LatestNotification($category)
    {
        $log = $this->where('category', $category)
            ->where('is_complete', 0)
            ->orderBy('date_created', 'DESC')
            ->findAll();

        return $log;
    }

    public function CheckNotification()
    {
        $log = $this->where('is_complete', 0)->findAll();

        if ($log) {
            return true;
        } else {
            return false;
        }
    }

    public function CountNotification()
    {
        $log = $this->where('is_complete', 0)->findAll();
        return count($log);
    }

}

