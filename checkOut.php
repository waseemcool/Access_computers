<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "'");

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers - Check Out</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body class="bg-light">

        <div class="container-fluid">
            <div class="row">

                <?php require "header.php"; ?>

                <div class="col-12">
                    <div class="row py-3">

                        <div class="col-12 text-center">
                            <h1 class="fs-1 fw-bolder" style="color: rgb(120, 221, 120);">CHECK OUT</h1>
                        </div>

                    </div>
                </div>

                <?php

                if ($cartrs->num_rows >= 1) {

                ?>

                    <div class="col-12 my-3">
                        <div class="row justify-content-center gy-3">

                            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                                <div class="row">

                                    <div class="col-12 text-center">
                                        <span class="text-dark fs-3 fw-bold">Delivery Details</span>
                                    </div>

                                    <!-- <hr /> -->

                                    <div class="col-12">
                                        <div class="row mt-3">

                                            <?php

                                            $address = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");

                                            if ($address->num_rows == 1) {
                                                $address_detail = $address->fetch_assoc();

                                                $cityinfo = Database::search("SELECT * FROM `city` WHERE `id` = '" . $address_detail["city_id"] . "'");
                                                $city = $cityinfo->fetch_assoc();

                                                $districtinfo = Database::search("SELECT * FROM `district` WHERE `id` = '" . $city["district_id"] . "'");
                                                $district = $districtinfo->fetch_assoc();

                                                $provinceinfo = Database::search("SELECT * FROM `province` WHERE `id` = '" . $district["province_id"] . "'");
                                                $province = $provinceinfo->fetch_assoc();

                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Address Line 01</label>
                                                    <textarea class="form-control" rows="2" id="line1"><?php echo $address_detail["line1"]; ?></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Address Line 02</label>
                                                    <textarea class="form-control" rows="2" id="line2"><?php echo $address_detail["line2"]; ?></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery City</label>
                                                    <input type="text" class="form-control" value="<?php echo $city["name"]; ?>" placeholder="Enter Your City..." id="city" />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Postal Code</label>
                                                    <input type="text" class="form-control" value="<?php echo $city["postal_code"]; ?>" placeholder="Enter Your Postal Code..." id="postalcode" />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Province</label>
                                                    <select class="form-select" id="province" onchange="district();">
                                                        <option value="<?php echo $province["id"]; ?>"><?php echo $province["name"]; ?></option>
                                                        <?php
                                                        $allprovincers = Database::search("SELECT * FROM `province` WHERE `id` != '" . $province["id"] . "'");
                                                        $provincenum = $allprovincers->num_rows;
                                                        for ($i = 0; $i < $provincenum; $i++) {
                                                            $allprovince = $allprovincers->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $allprovince["id"]; ?>"><?php echo $allprovince["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <?php
                                                $all_district_rs = Database::search("SELECT * FROM `district` WHERE `province_id` = '" . $province["id"] . "' AND `id` != '" . $district["id"] . "'");
                                                $district_num = $all_district_rs->num_rows;
                                                ?>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">District</label>
                                                    <select class="form-select" id="district">
                                                        <option value="<?php echo $district["id"]; ?>"><?php echo $district["name"]; ?></option>
                                                        <?php
                                                        for ($i = 0; $i < $district_num; $i++) {
                                                            $all_district = $all_district_rs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $all_district["id"]; ?>"><?php echo $all_district["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Address Line 01</label>
                                                    <textarea class="form-control" rows="2" id="line1"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Address Line 02</label>
                                                    <textarea class="form-control" rows="2" id="line2"></textarea>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery City</label>
                                                    <input type="text" class="form-control" placeholder="Enter Your City..." id="city" />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Delivery Postal Code</label>
                                                    <input type="text" class="form-control" placeholder="Enter Your Postal Code..." id="postalcode" />
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery Province</label>
                                                    <select class="form-select" id="province" onchange="district();">
                                                        <?php
                                                        $allprovincers = Database::search("SELECT * FROM `province`");
                                                        $provincenum = $allprovincers->num_rows;
                                                        for ($i = 0; $i < $provincenum; $i++) {
                                                            $allprovince = $allprovincers->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $allprovince["id"]; ?>"><?php echo $allprovince["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label fw-bold">Deleivery District</label>
                                                    <select class="form-select" id="district">
                                                        <?php
                                                        $alldistrictrs = Database::search("SELECT * FROM `district` WHERE `province_id` = '1'");
                                                        $districtnum = $alldistrictrs->num_rows;
                                                        for ($i = 0; $i < $districtnum; $i++) {
                                                            $alldistrict = $alldistrictrs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $alldistrict["id"]; ?>"><?php echo $alldistrict["name"]; ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                                <div class="row border border-1 border-end-0 border-top-0 border-bottom-0">

                                    <div class="col-12 text-center">
                                        <span class="text-dark fs-3 fw-bold">Product Details</span>
                                    </div>

                                    <!-- <hr /> -->

                                    <div class="col-12">
                                        <div class="row mt-3 ms-2 g-2">

                                            <?php

                                            $grandtotal = "00";
                                            $totalqty = "0";

                                            for ($c = 0; $c < $cartrs->num_rows; $c++) {
                                                $cart = $cartrs->fetch_assoc();
                                                $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cart["product_id"] . "'");
                                                $product = $productrs->fetch_assoc();
                                            ?>

                                                <div class="col-12">
                                                    <div class="row border border-2 border-primary rounded">
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold">Item :</label>
                                                            <label class="form-label"><?php echo $product["title"]; ?></label>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold">Price :</label>
                                                            <label class="form-label">Rs. <?php echo $product["price"]; ?> .00</label>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label fw-bold">Qty :</label>
                                                            <label class="form-label"><?php echo $cart["qty"]; ?></label>
                                                        </div>
                                                        <div class="col-12">
                                                            <?php
                                                            $requesttotal = $product["price"] * $cart["qty"];
                                                            ?>
                                                            <label class="form-label fw-bold">Request Total :</label>
                                                            <label class="form-label">Rs. <?php echo $requesttotal; ?> .00</label>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                                $grandtotal = $grandtotal + $requesttotal;
                                                $totalqty = $totalqty + $cart["qty"];
                                            }
                                            ?>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <hr />

                    <div class="col-12 mt-2">
                        <div class="row justify-content-center">

                            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                                <div class="row">

                                    <div class="col-12">
                                        <span class="fw-bold text-primary fs-3">GRAND TOTAL :</span>
                                        <span class="fw-bold text-primary fs-3">Rs. <?php echo $grandtotal; ?> .00</span>
                                    </div>
                                    <div class="col-12">
                                        <span class="fw-bold text-primary fs-3">TOTAL ITEMS :</span>
                                        <span class="fw-bold text-primary fs-3"><?php echo $totalqty; ?></span>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 my-4">
                        <div class="row justify-content-center">

                            <div class="col-10 col-sm-8 col-md-6 col-lg-4">
                                <div class="row">

                                    <div class="col-12 d-grid">
                                        <button class="btn btn-success kbtn1 kbtn2 text-white fw-bold fs-4" onclick="checkOut();">CHECK OUT</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                <?php

                } else {

                ?>

                    <div class="col-12 text-center" style="margin-top: 100px; margin-bottom: 114px;">
                        <span class="fs-1 text-primary fw-bold">There are no Items in your Cart</span>
                    </div>

                <?php

                }

                ?>

                <?php require "footer.php"; ?>

            </div>
        </div>

        <?php require "jsLinks.php"; ?>
    </body>

    </html>

<?php

} else {

?>

    <script>
        window.location = "signIn.php";
    </script>

<?php

}

?>