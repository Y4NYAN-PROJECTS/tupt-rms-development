<?php

namespace App\Controllers;

class Error extends BaseController
{
    public function SessionExpired()
    {
        return view('/ErrorTemplates/session-has-expired');
    }

    public function TooManyAttempts()
    {
        return view('/ErrorTemplates/too-many-attempts');
    }
}
