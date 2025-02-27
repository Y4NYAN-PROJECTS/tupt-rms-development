<?php

namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\AccountsModel;
use App\Models\DepartmentModel;
use App\Models\LogsModel;
use App\Models\OtpModel;
use App\Models\PlantillaModel;

class MainController extends BaseController
{
    public function UserTypePage()
    {
        return view('/Index/Pages/user-type');
    }

    public function Login($usertype)
    {
        if ($usertype != 1 && $usertype != 2) {
            return redirect()->back();
        }

        $rqst_idnumber = $this->request->getPost('log_idnumber');
        $rqst_password = $this->request->getPost('log_password');
        $rqst_checklogin = $this->request->getPost('log_checklogin');

        $checklogin = $rqst_checklogin ? true : false;
        $idnumberError = false;
        $passwordError = false;
        $idnumber = '';

        $accountsModel = new AccountsModel();
        $checkid = $accountsModel->checkAccount($rqst_idnumber, $usertype);

        if ($checklogin) {
            if ($checkid == 2) {
                $password = $accountsModel->getPassword($rqst_idnumber, $usertype);
                if (password_verify($rqst_password, $password)) {
                    $checkusertype = $accountsModel->getUserType($rqst_idnumber, $usertype);
                    $userinfo = $accountsModel->getAccountDetails($rqst_idnumber, $usertype);

                    if ($checkusertype == 1) {
                        session()->set([
                            'is_logged' => true,
                            'logged_id' => $userinfo['account_id'],
                            'logged_usertype' => $userinfo['user_type'],
                        ]);
                        session()->setFlashdata('fd_primary_toast_center', "Welcome back! " . $userinfo['first_name']);
                        return redirect()->to('/AdminController/DashboardPage');
                    } else if ($checkusertype == 2) {
                        $middlename = !empty($userinfo['middle_name']) ? $userinfo['middle_name'] : '';
                        $extensionname = $userinfo['extension_name'] != "N/A" ? $userinfo['extension_name'] : '';
                        $fullname = strtolower($userinfo['first_name'] . " " . $middlename . " " . $userinfo['last_name'] . " ");
                        $diplayname = ucwords($fullname) . $extensionname;

                        // employee
                        session()->set([
                            'is_logged' => true,
                            'logged_id' => $userinfo['account_id'],
                            'logged_usertype' => $userinfo['user_type'],
                        ]);
                        session()->setFlashdata('fd_primary_toast_center', "Welcome back! " . $userinfo['first_name']);
                        return redirect()->to('/EmployeeController/DashboardPage');
                    }
                } else {
                    $idnumber = $rqst_idnumber;
                    $passwordError = true;
                }
            } else {
                if ($checkid == 1) {
                    session()->setFlashdata('fd_primary_toast_center', "Account is pending for approval.");
                } else {
                    $idnumberError = true;
                }
            }
        }

        $data = [
            'checkLogin' => $checklogin,
            'usertype' => $usertype,
            'idnumber' => $idnumber,
            'idnumberError' => $idnumberError,
            'passwordError' => $passwordError,
        ];

        return view('/Index/Pages/login', $data);
    }

    public function Register($usertype)
    {
        if ($usertype != 1 && $usertype != 2) {
            return redirect()->to('/');
        }

        $data = [
            'usertype' => $usertype
        ];
        $data = array_merge($this->data, $data);
        return view('/Index/Pages/register', $data);
    }

    public function Registration()
    {
        helper('text');
        $accountcode = bin2hex(random_bytes(6));
        $rqst = $this->request->getPost();

        // Get validated data
        $rqst_department = $this->request->getPost('reg_department');
        $rqst_employeetype = $this->request->getPost('reg_employeetype');
        $rqst_plantilla = $this->request->getPost('reg_plantilla');
        $rqst_firstname = $this->request->getPost('reg_firstname');
        $rqst_middlename = $this->request->getPost('reg_middlename');
        $rqst_lastname = $this->request->getPost('reg_lastname');
        $rqst_extension = $this->request->getPost('reg_extension');
        $rqst_email = $this->request->getPost('reg_email');
        $rqst_password = $this->request->getPost('reg_password');
        $hashedpassword = password_hash($rqst_password, PASSWORD_BCRYPT);

        $rqst_usertype = $this->request->getPost('reg_usertype');
        $rqst_idnumber = $this->request->getPost('reg_idnumber');
        $rqst_fullidnumber = $this->request->getPost('reg_fullidnumber');

        $accountsModel = new AccountsModel();
        $idcheck = $accountsModel->checkAccount($rqst_idnumber, $rqst_usertype);
        $errorid = '';
        if ($idcheck) {
            $errorid = 'This id number already exist.';
        }

        $validation = \Config\Services::validation();
        $validationRules = [
            'reg_firstname' => [
                'label' => 'First Name',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'First name is required.',
                    'alpha_space' => 'Cannot contains special characters or numbers.',
                ],
            ],
            'reg_middlename' => [
                'label' => 'Middle Name',
                'rules' => 'alpha_space',
                'errors' => [
                    'alpha_space' => 'Cannot contains special characters or numbers.',
                ],
            ],
            'reg_lastname' => [
                'label' => 'Last Name',
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Last name is required.',
                    'alpha_space' => 'Cannot contains special characters or numbers.',
                ],
            ],
            'reg_department' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select your departments.',
                ],
            ],
            'reg_employeetype' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select what type of employee.',
                ],
            ],
            'reg_plantilla' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please select your plantilla.',
                ],
            ],
            'reg_idnumber' => [
                'label' => 'ID Number',
                'rules' => [
                    'required',
                    'regex_match[/^\d{2}-\d{4}$/]',
                ],
                'errors' => [
                    'required' => 'Id number is required.',
                    'regex_match' => 'Invalid id number.',
                ],
            ],
            'reg_email' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'The Email field is required.',
                    'valid_email' => 'Please enter a valid email address.',
                ],
            ],
            'reg_password' => [
                'label' => 'Password',
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*\d).{8,}$/]',
                'errors' => [
                    'required' => 'The Password field is required.',
                    'min_length' => 'The Password must be at least 8 characters long.',
                    'regex_match' => 'The Password must contain at least one number and one uppercase letter.',
                ],
            ],
            'reg_confirmpassword' => [
                'label' => 'Confirm Password',
                'rules' => 'required|matches[reg_password]',
                'errors' => [
                    'required' => 'The Confirm Password field is required.',
                    'matches' => 'Password does not match.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            $data = [
                'usertype' => $rqst_usertype,
                'validation' => $validation,
                'oldinput' => $rqst,
                'errorid' => $errorid
            ];
            $data = array_merge($this->data, $data);
            return view('/Index/Pages/register', $data);
        }

        // Store user data in session
        session()->set([
            's_accountcode' => strtoupper($accountcode),
            's_user_type' => $rqst_usertype,
            's_employeetype' => $rqst_employeetype,
            's_department' => $rqst_department,
            's_plantilla' => $rqst_plantilla,
            's_firstname' => strtoupper($rqst_firstname),
            's_middlename' => strtoupper($rqst_middlename),
            's_lastname' => strtoupper($rqst_lastname),
            's_extension' => $rqst_extension,
            's_idnumber' => $rqst_fullidnumber,
            's_email' => $rqst_email,
            's_password' => $hashedpassword,
        ]);

        return redirect()->to("/MainController/OTPVerificationPage");
    }


    public function OTPVerificationPage()
    {
        $otpcode = session()->get('s_otpcode');
        $remainingtime = session()->get('s_remainingtime');

        if (empty($otpcode)) {
            return redirect()->to('MainController/SendOTP');
        } else {
            $data = [
                'remainingtime' => $remainingtime
            ];

            return view('/Index/Pages/verification-otp', $data);
        }
    }


    public function SendOTP()
    {
        $email = session()->get('s_email');
        $generatedcode = random_int(1000, 9999);

        $emailsubject = 'OTP Verification Code';
        $templatePath = APPPATH . '/Views/EmailTemplates/registration-otp.html';
        $emailmessage = file_get_contents($templatePath);
        $emailmessage = str_replace('{{otp_code}}', $generatedcode, $emailmessage);

        $emailService = \Config\Services::email();
        $emailService->setTo($email);
        $emailService->setSubject($emailsubject);
        $emailService->setMessage($emailmessage);
        if ($emailService->send()) {
            $datetime = Time::now()->toDateTimeString();

            $otpModel = new OtpModel();
            $otpData = [
                'email_address' => $email,
                'otp_code' => $generatedcode,
                'date_created' => $datetime,
            ];

            $otpModel->save($otpData);

            $sessionData = [
                's_registration' => true,
                's_otpcode' => $generatedcode
            ];
            session()->set($sessionData);

            session()->setFlashdata('fd_primary_toast_center', 'OTP Code sent to email.');
            return redirect()->to('MainController/OTPVerificationPage');
        } else {
            session()->setFlashdata('fd_primary_toast_center', 'Failed to send OTP Code');
            return redirect()->to('/');
            // echo $emailService->printDebugger(['headers']);
            // exit;
        }
    }


    public function VerifyOTP()
    {
        $email = session()->get('s_email');
        $otpcode = session()->get('s_otpcode');

        $rqst_otpcode = implode('', [
            $this->request->getPost('code1'),
            $this->request->getPost('code2'),
            $this->request->getPost('code3'),
            $this->request->getPost('code4')
        ]);

        $otpModel = new OtpModel();
        $otpinformation = $otpModel->getOTP($email);
        $otpid = $otpinformation['otp_id'];
        $tries = $otpinformation['tries'] + 1;

        if ($rqst_otpcode == $otpcode) {
            $otpModel->update($otpid, ['status' => 1, 'tries' => $tries]);

            $this->SaveRegistration();
            session()->setFlashdata('alert_registersuccess', 'Registered Successfully!');
            session()->destroy();
            return redirect()->to('/MainController/UserTypePage');
        } else {
            $otpModel->update($otpid, ['tries' => $tries]);
            session()->setFlashdata('fd_primary_toast_center', "Incorrect OTP Code. Attempt No.$tries.");
            return redirect()->back();
        }
    }


    public function SaveRegistration()
    {
        $is_registration = session()->get('s_registration');

        if ($is_registration) {
            $fname = session()->get('s_firstname');
            $mname = session()->get('s_middlename');
            $lname = session()->get('s_lastname');
            $xname = session()->get('s_extension');

            $initial = !empty($mname) ? strtoupper(substr($mname, 0, 1)) . '.' : '';
            $fullname = ucwords(strtolower("$fname $initial $lname ")) . "$xname";

            $accountModel = new AccountsModel();
            $accountData = [
                'account_code' => session()->get('s_accountcode'),
                'id_number' => session()->get('s_idnumber'),
                'full_name' => $fullname,
                'first_name' => session()->get('s_firstname'),
                'middle_name' => session()->get('s_middlename'),
                'last_name' => session()->get('s_lastname'),
                'extension_name' => session()->get('s_extension'),
                'email_address' => session()->get('s_email'),
                'employee_type_id' => session()->get('s_employeetype'),
                'department_id' => session()->get('s_department'),
                'plantilla_id' => session()->get('s_plantilla'),
                'user_type' => session()->get('s_user_type'),
                'password' => session()->get('s_password'),
            ];
            $saverow = $accountModel->save($accountData);
            $rowid = $accountModel->getInsertID();

            if ($saverow) {
                $datetime = Time::now()->toDateTimeString();
                $usertype = (session()->get('s_user_type') == 1) ? 'Administrator' : 'Employee';

                $logsModel = new LogsModel();
                $logsData = [
                    'account_id' => $rowid,
                    'category' => 'accounts',
                    'title' => 'Requesting for Approval',
                    'description' => "$fullname registered as $usertype. Waiting for approval.",
                    'date_created' => $datetime,
                ];
                $logsModel->insert($logsData);
            }
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function test()
    {
        $fname = 'PAUL IAN';
        $mname = 'SOLANO';
        $lname = 'JUCAR';
        $xname = 'Jr.';

        $initial = !empty($mname) ? strtoupper(substr($mname, 0, 1)) . '.' : '';
        $fullname = ucfirst(strtolower($fname)) . ' ' . $initial . ' ' . ucfirst(strtolower($lname)) . ' ' . ($xname ? ucfirst(strtolower($xname)) : '');

        echo $fullname;
    }

}

