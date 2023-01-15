<?php

require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$rpassword = $_POST["rpassword"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];

if (empty($fname)) {
    echo "Please enter your first name";
} else if (strlen($fname) > 50) {
    echo "First Name must be less than 50 characters";
} else if (empty($lname)) {
    echo "Please enter your last name";
} else if (strlen($lname) > 50) {
    echo "Last Name must be less than 50 characters";
} else if (empty($email)) {
    echo "Please enter your email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address";
} else if (strlen($email) > 100) {
    echo "email must be leass than 100 characters";
} else if (empty($password)) {
    echo "Please enter your password";
} else if (!preg_match("#[0-9]#", $password)) {
    echo "Password must contains numbers";
} else if (empty($rpassword)) {
    echo "Please enter your password again";
} else if ($password != $rpassword) {
    echo "Password and re-type password are not equal";
} else if (empty($dob)) {
    echo "Please select your date of birth";
} else {

    $r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    if ($r->num_rows > 0) {
        echo "User with the same email address already exsist";
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `user`(`email`,`fname`,`lname`,`password`,`dob`,`registered_date`,`gender_id`,`v_status_id`,`status_id`) 
        VALUES('" . $email . "','" . $fname . "','" . $lname . "','" . $password . "','" . $dob . "','" . $date . "','" . $gender . "','2','1')");
        echo "Success";
    }
}

?>