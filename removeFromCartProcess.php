<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email =  $_SESSION["user"]["email"];
    $id = $_GET["id"];

    $cartrs = Database::search("SELECT `product_id` FROM `cart` WHERE `id` = '" . $id . "'");
    $cf = $cartrs->fetch_assoc();
    $pid = $cf["product_id"];

    $recentrs = Database::search("SELECT * FROM `recent` WHERE `product_id` = '" . $pid . "' AND `user_email` = '" . $email . "'");
    $rn = $recentrs->num_rows;

    if ($rn == 1) {

        Database::iud("DELETE FROM `cart` WHERE `id` = '" . $id . "'");

        echo "Success";
    } else {

        Database::iud("INSERT INTO `recent`(`user_email`,`product_id`) VALUES('" . $email . "','" . $pid . "')");

        Database::iud("DELETE FROM `cart` WHERE `id` = '" . $id . "'");

        echo "Success";
    }
}

?>