<?php

require "connection.php";

session_start();

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    if (isset($_POST["product_id"])) {

        $array;

        $id = $_POST["product_id"];
        $qty = $_POST["qty"];
        $line1 = $_POST["line1"];
        $line2 = $_POST["line2"];
        $city = $_POST["city"];
        $postalcode = $_POST["postalcode"];
        $district = $_POST["district"];
        $province = $_POST["province"];

        if (empty($qty)) {
            echo "Please Add a Quantity.";
        } else if ($qty <= 0) {
            echo "Please Add a Valid Quantity.";
        } else if (empty($line1)) {
            echo "Please Enter Address Line 1.";
        } else if (empty($city)) {
            echo "Please Enter Your City.";
        } else if (empty($postalcode)) {
            echo "Please Enter Your Postal Code.";
        } else if ($postalcode ==  5) {
            echo "Invalid Postal Code.";
        } else {

            // echo $email;
            // echo "<br />";
            // echo $id;
            // echo "<br />";
            // echo $qty;
            // echo "<br />";
            // echo $line1;
            // echo "<br />";
            // echo $line2;
            // echo "<br />";
            // echo $city;
            // echo "<br />";
            // echo $postalcode;
            // echo "<br />";
            // echo $province;
            // echo "<br />";
            // echo $district;

            $orderid = uniqid();

            $array['orderid'] = $orderid;

            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");

            if ($productrs->num_rows == 1) {

                $product = $productrs->fetch_assoc();

                $array['title'] = $product["title"];
                $array['price'] = $product["price"] * $qty;

                $customerrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");

                if ($customerrs->num_rows == 1) {

                    $customer = $customerrs->fetch_assoc();

                    $array['fname'] = $customer["fname"];
                    $array['lname'] = $customer["lname"];
                    $array['email'] = $customer["email"];

                    $customer_has_addressrs = Database::search("SELECT `user_has_address`.`line1`, `user_has_address`.`line2`, `user_has_address`.`user_email`, 
                    `city`.`name` AS `city` FROM `user_has_address` INNER JOIN `city` ON `user_has_address`.`city_id` = `city`.`id` WHERE `user_email` = '" . $email . "'");

                    if ($customer_has_addressrs->num_rows == 1) {

                        $customer_has_address = $customer_has_addressrs->fetch_assoc();

                        $array['address'] = $customer_has_address["line1"] . " " . $customer_has_address["line2"];
                        $array['city'] = $customer_has_address["city"];
                    } else {
                        $array['address'] = $line1 . " " . $line2;
                        $array['city'] = $city;
                    }
                    $array['delivery_address'] = $line1 . " " . $line2;
                    $array['delivery_city'] = $city;
                } else {
                    echo "Invalid User";
                }
                echo json_encode($array);
            } else {
                echo "Invalid Product";
            }
        }
    } else {
        echo "Invalid Request";
    }
} else {
    echo "Please Sign In First";
}

?>