<?php

namespace App\Validation;

use App\Models\AccountsModel;

class CustomRules
{
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
}
