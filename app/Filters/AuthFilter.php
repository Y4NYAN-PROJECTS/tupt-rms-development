<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $islogged = session()->get('is_logged');
        $usertype = session()->get('logged_usertype');

        $uri = $request->getUri();
        $firstSegment = $uri->getSegment(1);
        $controller = strtolower($firstSegment);

        if (!$controller) {
            return redirect()->to('/tup');
        } else {
            if ($islogged) {
                if ($usertype == 1) {
                    if ($controller !== 'admincontroller') {
                        session()->setFlashdata('fd_primary_toast_center', 'Unauthorized access.');
                        return redirect()->to('admincontroller/dashboardpage');
                    }
                } elseif ($usertype == 2) {
                    if ($controller !== 'employeecontroller') {
                        session()->setFlashdata('fd_primary_toast_center', 'Unauthorized access.');
                        return redirect()->to('employeecontroller/dashboardpage');
                    }
                }
            } else {
                if ($controller !== 'maincontroller' && $controller !== 'tup' && $controller !== 'error') {
                    session()->setFlashdata('fd_primary_toast_center', 'Unauthorized access.');
                    return redirect()->to('/tup');
                }
            }
        }


        if (!$controller && $islogged) {
            session()->setFlashdata('fd_primary_toast_center', 'Cannot access.');
            if ($usertype == 1) {
                return redirect()->to('admincontroller/dashboardpage');
            } elseif ($usertype == 2) {
                return redirect()->to('employeecontroller/dashboardpage');
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

    }

}

