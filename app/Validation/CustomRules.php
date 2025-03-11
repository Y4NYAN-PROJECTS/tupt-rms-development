<?php

namespace App\Validation;

use App\Models\AccountsModel;

class CustomRules
{
    // $params is the value passed in the validation
    public function oldPasswordCheck(string $str, string $params, array $data): bool
    {
        list($accountid, $password) = explode(',', $params);

        if (empty($accountid) || empty($password)) {
            return false;
        }

        $accountsModel = new AccountsModel();
        $existingAccount = $accountsModel->checkPassword($accountid, $password);
        return $existingAccount;
    }

    public function idnumberCheck(string $str, string $idnumber, array $data): bool
    {
        $accountsModel = new AccountsModel();
        $isidnumberExsist = $accountsModel->checkIdNumber($idnumber);
        return $isidnumberExsist;
    }

    public function emailCheck(string $str, string $params, array $data): bool
    {
        list($idnumber, $email) = explode(',', $params);

        if (empty($idnumber) || empty($email)) {
            return false;
        }

        $accountsModel = new AccountsModel();
        $iscorrectEmail = $accountsModel->checkEmail($idnumber, $email);
        return $iscorrectEmail;
    }

}

