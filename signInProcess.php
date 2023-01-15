<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];

if (empty($email)) {
    echo "Please enter your email";
} else if (empty($password)) {
    echo "Please enter your password";
} else {

    $r = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "' AND `password` = '" . $password . "'");
    $n = $r->num_rows;

    if ($n == 1) {
        echo "Success";
        $d = $r->fetch_assoc();
        $_SESSION["user"] = $d;
    } else {
        echo "Invalid details";
    }
    
}

?>