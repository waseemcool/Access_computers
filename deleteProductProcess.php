<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");

        if ($productrs->num_rows == 1) {
            Database::iud("DELETE FROM `cart` WHERE `product_id` = '" . $id . "'");

            Database::iud("DELETE FROM `watchlist` WHERE `product_id` = '" . $id . "'");

            Database::iud("DELETE FROM `recent` WHERE `product_id` = '" . $id . "'");

            Database::iud("DELETE FROM `feedback` WHERE `product_id` = '" . $id . "'");

            Database::iud("DELETE FROM `invoice` WHERE `product_id` = '" . $id . "'");

            Database::iud("DELETE FROM `product` WHERE `id` = '" . $id . "'");

            echo "Success";
        } else {
            echo "Invalid Product";
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}

?>