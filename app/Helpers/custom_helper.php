<?php

// [ Format Full Name ] 
if (!function_exists('format_fullname')) {
    function format_fullname($fname, $mname, $lname, $xname)
    {


        $fname = trim($fname);
        $mname = trim($mname);
        $lname = trim($lname);
        $xname = trim($xname);

        $initial = $mname !== '' ? strtoupper(substr($mname, 0, 1)) . '.' : '';
        $fullname = ucwords(strtolower(trim("$fname $initial $lname"))) . ($xname ? " $xname" : '');

        return $fullname;
    }
}

// [ Create Temporary Password - Direct Registration ]
if (!function_exists('temporary_password')) {
    function temporary_password($fname, $lname)
    {


        $fname = trim($fname);
        $lname = trim($lname);

        $first = substr($fname, 0, 1);
        $lastname = str_replace(' ', '', $lname);

        $passwordformat = strtoupper($first . $lastname);
        $temporarypassword = password_hash($passwordformat, PASSWORD_BCRYPT);

        return $temporarypassword;
    }
}

if (!function_exists('random_code')) {
    function random_code($length)
    {


        if (!is_numeric($length) || $length <= 0) {
            $length = 10;
        }

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomcode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomcode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomcode;
    }
}
?>