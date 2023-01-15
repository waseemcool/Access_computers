<?php

require "connection.php";

$brand = $_POST["brand"];
$title = $_POST["title"];
$condition = $_POST["condition"];
$colour = $_POST["colour"];
$price = $_POST["price"];
$qty = $_POST["qty"];
$dwk = $_POST["dwk"];
$dok = $_POST["dok"];
$description = $_POST["description"];
//$mail = "abdulrahumanmuhammedwaseem@gmail.com";

if ($brand == "0") {
    echo "Please select the Brand.";
} else if (empty($title)) {
    echo "Please add the Title.";
} else if ($condition == "0") {
    echo "Please select the Condition.";
} else if ($colour == "0") {
    echo "Please select the Colour.";
} else if (empty($price)) {
    echo "Please enter the Product Price.";
} else if ($price == "0") {
    echo "Please enter the Valid Product Price.";
} else if ($qty == "0") {
    echo "Please Add a Quantity.";
} else if ($dwk == "0") {
    echo "Please enter the delivery fee within Kandy.";
} else if ($dok == "0") {
    echo "Please enter the delivery fee out of Kandy.";
} else if (empty($description)) {
    echo "Please enter the description.";
} else {
    if (!isset($_FILES["img"])) {
        echo "Please Add Product Image.";
    } else {
        $allowed_image_extension = array("png", "jpg", "jpeg", "svg");

        $file_extension = pathinfo($_FILES["img"]["name"], PATHINFO_EXTENSION);

        if (in_array($file_extension, $allowed_image_extension)) {
            $d = new DateTime();
            $tz = new DateTimeZone("Asia/Colombo");
            $d->setTimezone($tz);
            $datetime = $d->format("Y-m-d H:i:s");

            $FileName = "resources//products//" . uniqid() . $_FILES["img"]["name"];
            move_uploaded_file($_FILES["img"]["tmp_name"], $FileName);

            Database::iud("INSERT INTO `product`(`title`,`description`,`price`,`qty`,`datetime_added`,`image`,`delivery_fee_kandy`,`delivery_fee_other`,
                            `colour_id`,`brand_id`,`condition_id`,`status_id`) 
                            VALUES('" . $title . "','" . $description . "','" . $price . "','" . $qty . "','" . $datetime . "','" . $FileName . "','" . $dwk . "',
                            '" . $dok  . "','" . $colour . "','" . $brand . "','" . $condition . "','1')");

            echo "Success";
        } else {
            echo "Please Select Valid Image. You Can Select Only PNG, JPG, JPEG or SVG Files.";
        }
    }
}

// echo $brand;
// echo "<br />";
// echo $title;
// echo "<br />";
// echo $price;
// echo "<br />";
// echo $qty;
// echo "<br />";
// echo $crown;
// echo "<br />";
// echo $shape;
// echo "<br />";
// echo $caseclr;
// echo "<br />";
// echo $dialclr;
// echo "<br />";
// echo $bracelet;
// echo "<br />";
// echo $braceletclr;
// echo "<br />";
// echo $gender;
// echo "<br />";
// echo $datedisplay;
// echo "<br />";
// echo $description;
// echo "<br />";
// echo $FileName;
// echo "<br />";
// echo $mail;
// echo "<br />";
// echo $datetime;
// echo "<br />";

?>