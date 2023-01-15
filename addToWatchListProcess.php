<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"]) && isset($_GET["id"])) {

    $id = $_GET["id"];
    $email = $_SESSION["user"]["email"];

    $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '" . $id . "' AND `user_email` = '" . $email . "'");
    $n = $watchlistrs->num_rows;

    if ($n == 1) {
        echo "You Have Recently Addded this Product to the Watchlist.";
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $datetime = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `watchlist` (`product_id`,`user_email`,`datetime_added`) VALUES('" . $id . "','" . $email . "','" . $datetime . "')");

        echo "Success";
    }
} else {
    # code...
}
