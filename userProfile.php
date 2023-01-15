<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {
?>

    <!DOCTYPE html>

    <head>

        <title>Kur Computers - User Profile</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "header.php"; ?>
                <!-- header -->

                <div class="col-12 mt-3">
                    <h1 class="fs-1 text-center fw-bolder" style="color: rgb(120, 221, 120);">My Profile</h1>
                </div>

                <?php

                $user = Database::search("SELECT * FROM `user` WHERE `email` = '" . $_SESSION["user"]["email"] . "'");

                if ($user->num_rows == 1) {
                    $user_deatail = $user->fetch_assoc();
                ?>

                    <div class="col-12">
                        <div class="row justify-content-center mt-3">

                            <div class="col-sm-10 col-md-6 col-lg-3 border-3 border-end border-primary">
                                <div class="row mt-3" style="text-align: center;">
                                    <?php
                                    $profile_rs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'");

                                    if ($profile_rs->num_rows == 0) {
                                    ?>
                                        <div class="col-12">
                                            <img src="resources/emptyprofileimg1.svg" id="prev" class="img-thumbnail rounded-circle" width="150px" height="150px" />
                                        </div>
                                        <div class="col-12 mt-3">
                                            <input type="file" accept="img/*" class="form-control d-none" id="profile" />
                                            <label for="profile" class="btn btn-primary fw-bold" style="width: 150px;" onclick="uploadImage();">Upload Photo</label>
                                        </div>
                                    <?php
                                    } else {
                                        $profile = $profile_rs->fetch_assoc();
                                    ?>
                                        <div class="col-12">
                                            <img src="<?php echo $profile["code"]; ?>" id="prev" class="img-thumbnail rounded-circle" width="170px" height="150px" />
                                        </div>
                                        <div class="col-12 mt-3">
                                            <input type="file" accept="img/*" class="form-control d-none" id="profile" />
                                            <label for="profile" class="btn btn-primary fw-bold" style="width: 150px;" onclick="uploadImage();">Change Photo</label>
                                            <br />
                                            <button class="btn btn-danger fw-bold mt-1" onclick="removePic();">Remove Photo</button>
                                        </div>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-sm-10 col-md-6 col-lg-6 ms-5">
                                <div class="row g-2 p-2 justify-content-center">
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">First Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["fname"]; ?>" placeholder="Enter Your First Name" id="fname" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">Last Name</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["lname"]; ?>" placeholder="Enter Your Last Name" id="lname" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["email"]; ?>" disabled id="email" />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">Password</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["password"]; ?>" disabled />
                                    </div>
                                    <?php
                                    $verificationrs = Database::search("SELECT * FROM `v_status` WHERE `id` = '" . $user_deatail["v_status_id"] . "'");
                                    $verification = $verificationrs->fetch_assoc();
                                    if ($verification["id"] == 1) {
                                    ?>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Account</label>
                                            <input type="text" class="form-control" value="<?php echo $verification["name"]; ?>" disabled />
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Account</label>
                                            <div class="row">
                                                <div class="col-12 input-group">
                                                    <input type="text" class="form-control" value="<?php echo $verification["name"]; ?>" disabled />
                                                    <button class="btn btn-outline-danger" onclick="verify_Account();">Verify</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">Date of Birth</label>
                                        <input type="text" class="form-control" value="<?php echo $user_deatail["dob"]; ?>" disabled />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">Gender</label>
                                        <?php
                                        $genderrs = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $user_deatail["gender_id"] . "'");
                                        $gender = $genderrs->fetch_assoc();
                                        ?>
                                        <input type="text" class="form-control" value="<?php echo $gender["name"]; ?>" disabled />
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label fw-bold">Registered Date</label>
                                        <?php
                                        $reg_date = $user_deatail["registered_date"];
                                        $splitdate = explode(" ", $reg_date);
                                        ?>
                                        <input type="text" class="form-control" value="<?php echo $splitdate[0]; ?>" disabled />
                                    </div>
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
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Address Line 01</label>
                                            <textarea class="form-control" rows="2" id="line1"><?php echo $address_detail["line1"]; ?></textarea>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Address Line 02</label>
                                            <textarea class="form-control" rows="2" id="line2"><?php echo $address_detail["line2"]; ?></textarea>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">City</label>
                                            <input type="text" class="form-control" value="<?php echo $city["name"]; ?>" placeholder="Enter Your City..." id="city" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Postal Code</label>
                                            <input type="text" class="form-control" value="<?php echo $city["postal_code"]; ?>" placeholder="Enter Your Postal Code..." id="postalcode" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Province</label>
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
                                        <div class="col-12 col-lg-6">
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
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Address Line 01</label>
                                            <textarea class="form-control" rows="2" id="line1"></textarea>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Address Line 02</label>
                                            <textarea class="form-control" rows="2" id="line2"></textarea>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">City</label>
                                            <input type="text" class="form-control" placeholder="Enter Your City..." id="city" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Postal Code</label>
                                            <input type="text" class="form-control" placeholder="Enter Your Postal Code..." id="postalcode" />
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">Province</label>
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
                                        <div class="col-12 col-lg-6">
                                            <label class="form-label fw-bold">District</label>
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
                            
                            <div class="col-12 col-sm-10 col-md-8 col-lg-3 d-grid mt-4 mb-5">
                                <button class="btn btn-secondary kbtn1 kbtn2 fs-4 fw-bold" onclick="updateProfile();">Update Profile</button>
                            </div>

                        </div>
                    </div>

                <?php
                } else {
                ?>
                    <script>
                        alert("Invalid User");
                    </script>
                <?php
                }
                ?>

                <!-- Email Verification Modal -->
                <div class="modal fade" tabindex="-1" id="code">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Email Verification</h5>
                                <span class="modal-title">Verification Code Sent.Please Check Your Email</span>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Verification Code</label>
                                        <input class="form-control" type="text" id="vc" />
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="AC();">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Email Verification Modal -->

                <!-- header -->
                <?php require "footer.php"; ?>
                <!-- header -->

            </div>
        </div>

        <?php require "jsLinks.php"; ?>
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

?>