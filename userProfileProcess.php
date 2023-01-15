<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $line1 = $_POST["line1"];
    $line2 = $_POST["line2"];
    $province = $_POST["province"];
    $district = $_POST["district"];
    $city = $_POST["city"];
    $postalcode = $_POST["postalcode"];

    if (empty($fname)) {
        echo "Please enter your first name";
    } else if (strlen($fname) > 50) {
        echo "First Name must be leass than 50 characters";
    } else if (empty($lname)) {
        echo "Please enter your last name";
    } else if (strlen($lname) > 50) {
        echo "Last Name must be leass than 50 characters";
    } else if (empty($line1)) {
        echo "Please enter your adddress";
    } else if (empty($city)) {
        echo  "Please enter your city";
    } else if (empty($postalcode)) {
        echo  "Please enter your postalcode";
    } else {

        Database::iud("UPDATE `user` SET `fname` = '" . $fname . "',`lname` = '" . $lname . "' WHERE `email` = '" . $email . "'");

        $_SESSION["u"]["fname"] = $fname;
        $_SESSION["u"]["lname"] = $lname;

        // echo "User Table Updated";

        $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $email . "'");
        $nr = $addressrs->num_rows;

        if ($nr == 1) {
            // update

            $ucity = Database::search("SELECT * FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "' AND `district_id` = '" . $district . "'");

            if ($ucity->num_rows == 0) {
                Database::iud("INSERT INTO `city` (`name`,`district_id`,`postal_code`) VALUES('" . $city . "','" . $district . "','" . $postalcode . "')");

                $updatecity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");
                $upcity1 = $updatecity->fetch_assoc();

                Database::iud("UPDATE `user_has_address` SET 
                `line1` = '" . $line1 . "',
                `line2` = '" . $line2 . "',
                `city_id` = '" . $upcity1["id"] . "' WHERE 
                `user_email` = '" . $email . "'
                ");
            } else {

                $city_up = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "' AND `district_id` = '" . $district . "'");
                $city_i = $city_up->fetch_assoc();

                Database::iud("UPDATE `city` SET `name` = '" . $city . "',`postal_code` = '" . $postalcode . "', `district_id` = '" . $district . "' WHERE `id` = '" . $city_i["id"] . "')");

                $upcity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "' AND `district_id` = '" . $district . "'");
                $up = $ucity->fetch_assoc();

                Database::iud("UPDATE `user_has_address` SET 
                `line1` = '" . $line1 . "',
                `line2` = '" . $line2 . "',
                `city_id` = '" . $up["id"] . "' WHERE 
                `user_email` = '" . $email . "'
                ");
            }
            // echo "Address updated";
        } else {
            // add new

            $ncrs = Database::search("SELECT * FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "' AND `district_id` = '" . $district . "'");

            if ($ncrs->num_rows == 0) {

                Database::iud("INSERT INTO `city`(`name`,`district_id`,`postal_code`) VALUES('" . $city . "','" . $district . "','" . $postalcode . "')");

                $updatecity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "'");
                $upcity1 = $updatecity->fetch_assoc();

                Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`city_id`) VALUES
                ('" . $email . "','" . $line1 . "','" . $line2 . "','" . $upcity1["id"] . "')");
            } else {

                $ucity = Database::search("SELECT `id` FROM `city` WHERE `name` = '" . $city . "' AND `postal_code` = '" . $postalcode . "' AND `district_id` = '" . $district . "'");
                $unr = $ucity->fetch_assoc();

                Database::iud("INSERT INTO `user_has_address`(`user_email`,`line1`,`line2`,`city_id`) VALUES
                ('" . $email . "','" . $line1 . "','" . $line2 . "','" . $unr["id"] . "')");

                // echo "New address  added.";
            }
        }

        if (isset($_FILES["img"])) {

            $allowed_image_extension = array("png", "jpg", "jpeg", "svg");

            $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

            if (in_array($file_extension, $allowed_image_extension)) {
                $FileName = "resources//userprofile_photos//" . uniqid() . $_FILES["img"]["name"];
                move_uploaded_file($_FILES["img"]["tmp_name"], $FileName);

                $profilers = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");

                if ($profilers->num_rows == 1) {
                    Database::iud("UPDATE `profile_image` SET `code` = '" . $FileName . "' WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");
                } else {
                    Database::iud("INSERT INTO `profile_image`(`code`,`user_email`) VALUES('" . $FileName . "','" . $_SESSION["user"]["email"] . "')");
                }
            } else {
                echo "Please Select Valid Image. You Can Select Only PNG, JPG, JPEG or SVG Files.";
            }
        }
    }

    echo "Success";
} else {
    echo "Sign In First.";
}

// echo $fname;
// echo $lname;
// echo $line1;
// echo $line2;
// echo $province;
// echo $district;
// echo $city;
// echo $postalcode;
// echo $img["name"];

?>