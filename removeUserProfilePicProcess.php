<?php

session_start();

require "connection.php";

if ($_SESSION["user"]) {

    $profilers = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");

    if ($profilers->num_rows == 1) {
        Database::iud("DELETE FROM `profile_image` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");
        echo "Success";
    } else {
        echo "Invalid Request.";
    }
} else {
    echo "Sign In First.";
}

?>