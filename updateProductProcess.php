<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_POST["id"])) {

        $id = $_POST["id"];
        $price = $_POST["price"];
        $qty = $_POST["qty"];
        $dwk = $_POST["dwk"];
        $dok = $_POST["dok"];
        $des = $_POST["des"];

        if (empty($price)) {
            echo "Please enter the Cost per Item.";
        } else if (empty($qty)) {
            echo "Please add a Quantity.";
        }else if (empty($dwk)) {
            echo "Please enter the Delivery Cost Within Kandy.";
        }else if (empty($dok)) {
            echo "Please enter the Delivery Cost Out of Kandy.";
        } else if (empty($des)) {
            echo "Please enter the description.";
        } else {

            //$d = new DateTime();
            //$tz = new DateTimeZone("Asia/Colombo");
            // $d->setTimezone($tz);
            //$datetime = $d->format("Y-m-d H:i:s");

            Database::iud("UPDATE `product` SET `price` = '" . $price . "' ,`qty` = '" . $qty . "',`delivery_fee_kandy` = '" . $dwk . "',`delivery_fee_other` = '" . $dok . "',
            `description` = '" . $des . "' WHERE `id` = '" . $id . "'");

            echo "Success";
        }
    } else {
        echo "Invalid Request.";
    }
} else {
    echo "Please Sign In First.";
}

?>