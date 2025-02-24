<?php

namespace App\Filters;

use App\Models\OtpModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class RegistrationFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // [ Registration ]
        if (session()->get('s_registration')) {
            $uri = $request->getUri();
            $firstSegment = $uri->getSegment(1);
            $controller = strtolower($firstSegment);

            // ?
            if (!$controller || $controller !== 'maincontroller') {
                return redirect()->to('/MainController/OTPVerificationPage');
            }

            $email = session()->get('s_email');
            $timenow = Time::now()->getTimestamp();

            // Check Registration Attempts
            $otpModel = new OtpModel();
            $exceedAttempts = $otpModel->hasExceededAttemptLimit($email);
            if ($exceedAttempts) {
                session()->destroy();
                return redirect()->to('Error/TooManyAttempts');
            }

            // OTP Details
            if (!empty($email)) {
                $otp = $otpModel->otpDetails($email);
                $otptime = strtotime($otp['date_created']);
                $otptries = $otp['tries'];
            }

            // Registration Security
            $expirationtime = $otptime + 300;
            $remainingtime = $expirationtime - $timenow;

            // echo $expirationtime . " - ";
            // echo $timenow . " = ";
            // echo $remainingtime;

            if ($remainingtime > 0 && $remainingtime <= 300) {
                session()->set('s_remainingtime', $remainingtime);

                if ($otptries > 5) {
                    session()->destroy();
                    return redirect()->to('Error/TooManyAttempts');
                }
            } else {
                session()->destroy();
                return redirect()->to('Error/SessionExpired');
            }
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // [ Change Email ]
        if (session()->get('s_emailchange')) {
            $timenow = Time::now()->getTimestamp();

            $otptime = session()->get('s_otptime');
            $expirationtime = $otptime + 10;
            $remainingtime = $expirationtime - $timenow;

            if ($remainingtime > 0) {
                session()->remove([
                    's_emailchange',
                    's_otpcode',
                    's_otptime',
                    's_email',
                    's_remainingtime',
                ]);
            }
        }
    }

}

