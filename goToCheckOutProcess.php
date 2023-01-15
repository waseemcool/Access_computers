<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $customerrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

    $customer = $customerrs->fetch_assoc();

    if ($customer["v_status_id"] == 1) {
        if ($customer["status_id"] == 1) {
            echo "Success";
        } else {
            echo "Your Account is Deactivated Please Contact Admins to Activate your Account.";
        }
    } else {
        echo "Please Verify Your Account in My Profile.";
    }
} else {
    echo "Please Sign In First.";
}

?>