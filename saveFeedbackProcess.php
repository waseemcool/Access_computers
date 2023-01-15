<?php

session_start();

require "connection.php";

if ($_SESSION["user"]) {

    $email = $_SESSION["user"]["email"];

    if (isset($_POST["content"]) && isset($_POST["product_id"])) {

        $content = $_POST["content"];
        
        if (empty($content)) {
            echo "Please Add a Feed Back";
        } else {
            $product_id = $_POST["product_id"];

            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $date = $d->format("Y-m-d H:i:s");

            Database::iud("INSERT INTO `feedback`(`user_email`,`product_id`,`content`,`datetime_added`) 
            VALUES('" . $email . "','" . $product_id . "','" . $content . "','" . $date . "')");
            echo "Success";
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}

?>