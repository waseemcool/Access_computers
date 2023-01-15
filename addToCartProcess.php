<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    if (isset($_GET["id"]) && isset($_GET["qty"])) {
        $id = $_GET["id"];
        $qty = $_GET["qty"];
        $email = $_SESSION["user"]["email"];

        if ($qty == 0) {
            echo "Please add a quantity";
        } else {

            $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "' AND `product_id` = '" . $id . "'");
            $cn = $cartrs->num_rows;

            if ($cn == 1) {
                echo "This Product is already exists in your Cart.";
            } else {

                $productrs = Database::search("SELECT `qty` FROM `product` WHERE `id` = '" . $id . "'");
                $pr = $productrs->fetch_assoc();

                if ($pr["qty"] >= $qty) {
                    $d = new DateTime();
                    $tz = new DateTimeZone("Asia/Colombo");
                    $d->setTimezone($tz);
                    $date = $d->format("Y-m-d H:i:s");
                    Database::iud("INSERT INTO `cart`(`qty`,`datetime_added`,`user_email`,`product_id`) VALUES('" . $qty . "','" . $date . "','" . $email . "','" . $id . "')");
                    echo "Success";
                } else {
                    echo  "Please enter a valid Quantity below " . $pr['qty'] . ".";
                }
            }
        }
    } else {
        echo "Invalid";
    }
} else {
    echo "Please Sign In First";
}

?>