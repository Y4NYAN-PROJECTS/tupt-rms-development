<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\BaseConnection;


class EventFilter implements FilterInterface
{
    protected $db;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $islogged = session()->get('is_logged');

        if ($islogged) {
            $this->db->query("UPDATE tblaccounts SET age = TIMESTAMPDIFF(YEAR, birthdate, CURDATE()) WHERE birthdate IS NOT NULL");
            $this->db->query("UPDATE tbllogs JOIN tblaccounts ON tbllogs.account_id = tblaccounts.account_id SET tbllogs.is_complete = 1 WHERE tblaccounts.status != 1");
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }

}

