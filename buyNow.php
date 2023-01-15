<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    if (isset($_GET["id"])) {

        $id = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");

        if ($productrs->num_rows == 1) {

            $product = $productrs->fetch_assoc();

?>

            <!DOCTYPE html>

            <html>

            <head>

                <title>Kur Computers - Buy Now</title>

                <?php require "headLinks.php"; ?>

            </head>

            <body>

                <div class="container-fluid">
                    <div class="row">

                        <!-- header -->
                        <?php require "header.php"; ?>
                        <!-- header -->

                        <div class="col-12 mt-4 mb-5">
                            <div class="row justify-content-center">

                                <div class="col-12 col-sm-10 col-md-6 col-lg-4">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-12">
                                            <h3 class="fs-2 fw-bold text-success"><?php echo $product["title"]; ?></h3>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label fw-bold fs-4 text-dark">Rs. <?php echo $product["price"]; ?> .00</label>
                                        </div>

                                        <hr />

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
                                                    $all_district_rs = Database::search("SELECT * FROM `district` WHERE `province_id` = '1'");
                                                    $district_num = $all_district_rs->num_rows;
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
                                        }
                                        ?>

                                        <div class="col-12">
                                            <label class="form-label fw-bold">Quantity</label>
                                            <input type="number" value="1" class="form-control" id="qty" />
                                        </div>

                                        <div class="col-10 d-grid mt-4">
                                            <button class="btn btn-success kbtn1 fw-bold fs-5" onclick="buyNow(<?php echo $product['id']; ?>);">Buy Now</button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- footer -->
                        <?php require "footer.php"; ?>
                        <!-- footer -->

                    </div>
                </div>

                <?php require  "jsLinks.php"; ?>
            </body>

            </html>

        <?php

        } else {

        ?>

            <script>
                window.location = "index.php";
            </script>

        <?php

        }
    } else {

        ?>
        <script>
            window.location = "index.php";
        </script>

    <?php

    }
} else {

    ?>

    <script>
        window.location = "signIn.php";
    </script>

<?php

}

?>