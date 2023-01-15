<?php

require "connection.php";

$e = $_POST["e"];
$np = $_POST["np"];
$rnp = $_POST["rnp"];
$vc = $_POST["vc"];

if (empty($e)) {
    echo "Missing email address";
} else if (empty($np)) {
    echo "Please enter your new password";
} else if (!preg_match("#[0-9]#", $np)) {
    echo "Password must contains numbers";
} else if (empty($rnp)) {
    echo "Please Re-type your password";
} else if ($np != $rnp) {
    echo "Password and Re-type password does not match";
} else if (empty($vc)) {
    echo "Please enter your verification code";
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "' AND `v_code` = '" . $vc . "'");
    if ($rs->num_rows == 1) {

        Database::iud("UPDATE `user` SET `password` = '" . $np . "',`v_status_id` = '1' WHERE `email` = '" . $e . "'");
        echo "Success";
    } else {
        echo "Password Reset Fail";
    }
}
