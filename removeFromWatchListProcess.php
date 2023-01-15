<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"]) && isset($_GET["id"])) {

    $id = $_GET["id"];

    $watchrs = Database::search("SELECT * FROM `watchlist` WHERE `id` = '" . $id . "'");
    $watchrow  = $watchrs->fetch_assoc();

    $pid = $watchrow["product_id"];
    $mail = $watchrow["user_email"];

    $recent = Database::search("SELECT * FROM `recent` WHERE `user_email` = '" . $mail . "' AND `product_id` = '" . $pid . "'");

    if ($recent->num_rows == 1) {
        Database::iud("DELETE FROM `watchlist` WHERE `id` = '" . $id . "'");
    } else {
        Database::iud("INSERT INTO `recent`(`product_id`,`user_email`) VALUES('" . $pid . "','" . $mail . "')");
        Database::iud("DELETE FROM `watchlist` WHERE `id` = '" . $id . "'");
    }

    echo "Success";
} else {
?>
    <script>
        window.location = "Watchlist.php";
    </script>
<?php
}
?>