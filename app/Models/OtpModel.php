<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class OtpModel extends Model
{
    protected $table = 'tblotp';
    protected $primaryKey = 'otp_id';
    protected $allowedFields = ['email_address', 'otp_code', 'date_created', 'status', 'tries'];

    public function hasExceededAttemptLimit($email)
    {
        $date = Time::now()->toDateString();

        $row = $this->where('email_address', $email)->where('DATE(date_created)', $date)->findAll();
        $attempts = count($row);

        if ($attempts > 5) {
            return true;
        } else {
            return false;
        }
    }

    public function otpDetails($email)
    {
        $row = $this->where('email_address', $email)->orderBy('date_created', 'DESC')->first();
        return $row;
    }


    public function getOTP($email)
    {
        $date = Time::now()->toDateString();

        $builder = $this->builder();
        $builder->select('*')
            ->where('email_address', $email)
            ->where('DATE(date_created)', $date)
            ->orderBy('date_created', 'DESC');
        $query = $builder->get();
        $result = $query->getRowArray();

        return $result;
    }

}

