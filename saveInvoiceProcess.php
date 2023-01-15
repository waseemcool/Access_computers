<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $orderid = $_POST["orderid"];
    $qty = $_POST["qty"];
    $total = $_POST["total"];
    $delivery_address = $_POST["delivery_address"];
    $delivery_city = $_POST["delivery_city"];
    $product_id = $_POST["product_id"];
    $postalcode = $_POST["postalcode"];
    $district = $_POST["district"];
    $province = $_POST["province"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    // echo $email;
    // echo "<br/>";
    // echo $orderid;
    // echo "<br/>";
    // echo $qty;
    // echo "<br/>";
    // echo $total;
    // echo "<br/>";
    // echo $delivery_address;
    // echo "<br/>";
    // echo $delivery_city;
    // echo "<br/>";
    // echo $product_id;
    // echo "<br/>";
    // echo $postalcode;
    // echo "<br/>";
    // echo $district;
    // echo "<br/>";
    // echo $province;
    // echo "<br/>";
    // echo $date;

    Database::iud("INSERT INTO `invoice`(`user_email`,`product_id`,`order_id`,`qty`,`total`,`datetime_added`) 
    VALUES('" . $email . "','" . $product_id . "','" . $orderid . "','" . $qty . "','" . $total . "','" . $date . "')");

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderid . "'");
    $invoice = $invoicers->fetch_assoc();

    $cityrs = Database::search("SELECT * FROM `city` WHERE  `name` = '" . $delivery_city . "' AND `postal_code` = '" . $postalcode . "'");

    if ($cityrs->num_rows == 1) {
        $cityid = $cityrs->fetch_assoc();
        Database::iud("INSERT INTO `delivery`(`address`,`city_id`,`invoice_id`) VALUES('" . $delivery_address . "','" . $cityid["id"] . "','" . $invoice["id"] . "')");
    } else {
        Database::iud("INSERT INTO `city`(`name`,`district_id`,`postal_code`) VALUES('" . $delivery_city . "','" . $district . "','" . $postalcode . "')");

        $newcityrs = Database::search("SELECT * FROM `city` WHERE  `name` = '" . $delivery_city . "' AND `postal_code` = '" . $postalcode . "'");
        $newcity = $newcityrs->fetch_assoc();

        Database::iud("INSERT INTO `delivery`(`address`,`city_id`,`invoice_id`) VALUES('" . $delivery_address . "','" . $newcity["id"] . "','" . $invoice["id"] . "')");
    }
    echo "Success";
} else {
    echo "Please Sign In First.";
}

?>