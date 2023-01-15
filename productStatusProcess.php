<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");

        if ($productrs->num_rows == 1) {

            $product = $productrs->fetch_assoc();

            if ($product["status_id"] == "1") {

                Database::iud("UPDATE `product` SET `status_id` = '2' WHERE `id` = '" . $id . "'");

                echo "Deactivated";

            } else {

                Database::iud("UPDATE `product` SET `status_id` = '1' WHERE `id` = '" . $id . "'");

                echo "Activated";

            }

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