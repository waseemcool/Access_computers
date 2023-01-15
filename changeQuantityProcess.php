<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        if (isset($_GET["qty"])) {

            $qty = $_GET["qty"];

            if (empty($qty)) {
                echo "Please Add a Quantity";
            } else if ($qty <= 0) {
                echo "Please Enter Valid Quanty";
            } else {
                Database::iud("UPDATE `cart` SET `qty` = '" . $qty . "' WHERE `product_id` = '" . $id . "'");
                echo "Success";
            }
        } else {
            echo "Please Add a Quantity.";
        }
    } else {
        echo "Invalid Request.";
    }
} else {
    echo "Please Sign In First.";
}

?>