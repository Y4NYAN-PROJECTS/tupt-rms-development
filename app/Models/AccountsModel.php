<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountsModel extends Model
{
    protected $table = 'tblaccounts';
    protected $primaryKey = 'account_id';
    protected $allowedFields = [
        'account_code',
        'id_number',
        'full_name',
        'first_name',
        'middle_name',
        'last_name',
        'extension_name',
        'address',
        'email_address',
        'mobile_number',
        'birthdate',
        'sex',
        'department_id',
        'plantilla_id',
        'role_id',
        'degree_id',
        'user_type',
        'password',
        'access_level',
        'status',
        'is_retired',
        'is_seniorcitizen',
        'is_active',
        'image_path',
        'date_created'
    ];

    public function analyticsData()
    {
        $builder = $this->builder();
        $builder->select('tblaccounts.*, tbldepartment.*, tbldepartmentcategory.*');
        $builder->join('tbldepartment', 'tblaccounts.department_id = tbldepartment.department_id', 'left');
        $builder->join('tbldepartmentcategory', 'tbldepartment.department_category_id = tbldepartmentcategory.department_category_id', 'left');
        $builder->where('tblaccounts.status', 2);
        $users = $builder->get()->getResultArray();

        $retired = 0;
        $senior = 0;
        $male = 0;
        $female = 0;
        $active = 0;
        $masters = 0;
        $doctorate = 0;
        $baccalaureate = 0;

        // Load department categories and initialize their counts
        $departmentcategoryModel = new DepartmentCategoryModel();
        $categories = $departmentcategoryModel->findAll();

        $categoryCounts = [];
        foreach ($categories as $category) {
            $categoryCounts[$category['department_category_code']] = [
                'department_category_code' => $category['department_category_code'],
                'count' => 0
            ];
        }

        // Process user data
        foreach ($users as $user) {
            if (!empty($user['is_retired']))
                $retired++;
            if (!empty($user['is_seniorcitizen']))
                $senior++;
            if (!empty($user['is_active']))
                $active++;

            if (isset($user['sex'])) {
                if ($user['sex'] === 'Male')
                    $male++;
                if ($user['sex'] === 'Female')
                    $female++;
            }

            if (!empty($user['degree_id'])) {
                switch ($user['degree_id']) {
                    case 1:
                        $baccalaureate++;
                        break;
                    case 2:
                        $masters++;
                        break;
                    case 3:
                        $doctorate++;
                        break;
                }
            }

            if (!empty($user['department_id'])) {
                $categoryCounts[$user['department_category_code']]['count']++;
            }
        }

        // Prepare final analytics data
        $analyticsdata = [
            'allusers' => count($users),
            'retired' => $retired,
            'senior' => $senior,
            'male' => $male,
            'female' => $female,
            'active' => $active,
            'masters' => $masters,
            'doctorate' => $doctorate,
            'baccalaureate' => $baccalaureate,
            'categories' => array_values($categoryCounts)
        ];

        return $analyticsdata;
    }


    public function getAccountDetails($idnumber, $usertype)
    {
        $builder = $this->builder();
        $builder->select('*')
            ->where('id_number', $idnumber)
            ->where('user_type', $usertype)
            ->where('status', 2);
        $query = $builder->get();
        $result = $query->getRowArray();

        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getUserInformation($accountid)
    {
        $builder = $this->builder();
        $builder->select('tblaccounts.*, tblplantilla.*, tbldepartment.*, tblrole.*, tbldegree.*');
        $builder->join('tblplantilla', 'tblaccounts.plantilla_id = tblplantilla.plantilla_id', 'left');
        $builder->join('tbldepartment', 'tblaccounts.department_id = tbldepartment.department_id', 'left');
        $builder->join('tblrole', 'tblaccounts.role_id = tblrole.role_id', 'left');
        $builder->join('tbldegree', 'tblaccounts.degree_id = tbldegree.degree_id', 'left');
        $builder->where('tblaccounts.account_id', $accountid);

        $result = $builder->get()->getRowArray();
        return $result;
    }

    public function getVisitInformation($accountcode)
    {
        $builder = $this->builder();
        $builder->select('tblaccounts.*, tblplantilla.*, tbldepartment.*, tblrole.*');
        $builder->join('tblplantilla', 'tblaccounts.plantilla_id = tblplantilla.plantilla_id', 'left');
        $builder->join('tbldepartment', 'tblaccounts.department_id = tbldepartment.department_id', 'left');
        $builder->join('tblrole', 'tblaccounts.role_id = tblrole.role_id', 'left');
        $builder->where('tblaccounts.account_code', $accountcode);

        $result = $builder->get()->getRowArray();
        return $result;
    }

    public function getAccountList($status, $usertype)
    {
        $builder = $this->builder();
        $builder->select('tblaccounts.*, tblplantilla.*, tbldepartment.*, tblrole.*');
        $builder->join('tblplantilla', 'tblaccounts.plantilla_id = tblplantilla.plantilla_id', 'left');
        $builder->join('tbldepartment', 'tblaccounts.department_id = tbldepartment.department_id', 'left');
        $builder->join('tblrole', 'tblaccounts.role_id = tblrole.role_id', 'left');

        $builder->where('tblaccounts.status', $status);
        if ($usertype == 1 || $usertype == 2) {
            $builder->where('tblaccounts.user_type', $usertype);
        }
        $builder->orderBy('tblaccounts.date_created', 'DESC');

        $result = $builder->get()->getResultArray();
        return $result;
    }

    public function checkAccount($idnumber, $usertype)
    {
        $builder = $this->builder();
        $this->select('*')
            ->where('id_number', $idnumber)
            ->where('user_type', $usertype);
        $query = $builder->get();
        $result = $query->getRowArray();

        if (!empty($result)) {
            return $result['status'];
        } else {
            return false;
        }
    }

    public function getPassword($idnumber, $usertype)
    {
        $builder = $this->builder();
        $builder->select('password')
            ->where('id_number', $idnumber)
            ->where('user_type', $usertype)
            ->where('status', 2);
        $query = $builder->get();
        $result = $query->getRowArray();

        if ($result) {
            return $result['password'];
        } else {
            return false;
        }
    }

    public function getUserType($idnumber, $usertype)
    {
        $builder = $this->builder();
        $builder->select('user_type')
            ->where('id_number', $idnumber);
        $query = $builder->get();
        $result = $query->getRowArray();

        if ($result) {
            return $result['user_type'];
        } else {
            return false;
        }
    }

    public function getPendingAccounts()
    {
        $pendings = $this->where('status', 1)->findAll();
        return $pendings;
    }

    public function getAdministratorAccounts()
    {
        $administrator = $this->where('user_type', 1)->where('status', 2)->findAll();
        return $administrator;
    }

    public function getEmployeeAccounts()
    {
        $employee = $this->where('user_type', 2)->where('status', 2)->findAll();
        return $employee;
    }

    public function checkPassword($accountid, $password)
    {
        $account = $this->find($accountid);
        $accountpassword = $account['password'];

        if (password_verify($password, $accountpassword)) {
            return true;
        } else {
            return false;
        }
    }

}

