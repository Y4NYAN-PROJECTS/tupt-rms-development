<?php

if (!function_exists('format_fullname')) {
    function format_fullname($fname, $mname, $lname, $xname)
    {


        $fname = trim($fname);
        $mname = trim($mname);
        $lname = trim($lname);
        $xname = trim($xname);

        $initial = $mname !== '' ? strtoupper(substr($mname, 0, 1)) . '.' : '';
        $fullname = ucwords(strtolower(trim("$fname $initial $lname"))) . ($xname ? " $xname" : '');

        return trim($fullname);
    }
}

?>