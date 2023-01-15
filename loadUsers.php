<?php

require "connection.php";

if (empty($_GET["search"])) {

?>

    <div class="col-12">
        <div class="row mb-2">

            <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                <span class="fw-bolder fs-4 text-dark">Profile</span>
            </div>
            <div class="col-8 col-lg-4 bg-primary p-1 text-center">
                <span class="fw-bolder fs-4 text-white">Email</span>
            </div>
            <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-4 text-dark">Customer Name</span>
            </div>
            <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                <span class="fw-bolder fs-4 text-white">Registered Date</span>
            </div>
            <div class="col-1 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-4 text-dark">Account</span>
            </div>
            <div class="col-4 col-lg-1 p-1 bg-primary text-center">
            </div>


        </div>
    </div>

    <?php

    $customerrs = Database::search("SELECT * FROM `user`");

    for ($rows = 0; $rows < $customerrs->num_rows; $rows++) {

        $customer = $customerrs->fetch_assoc();

    ?>

        <div class="col-12">
            <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                <?php

                $imgrs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $customer["email"] . "'");

                if ($imgrs->num_rows == 1) {
                    $img = $imgrs->fetch_assoc();
                ?>
                    <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                        <img src="<?php echo $img["code"]; ?>" height="60px" width="60px" />
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                        <img src="Resources/demoprofile.svg" height="50px" width="50px" />
                    </div>
                <?php
                }


                ?>

                <div class="col-8 col-lg-4 bg-primary p-1 text-center">
                    <span class="fw-bolder fs-5 text-white fst-italic text-decoration-underline" style="cursor: pointer;" onclick="sendEmailToUser('<?php echo $customer['email']; ?>');"><?php echo $customer["email"]; ?></span>
                </div>
                <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                    <span class="fw-bolder fs-5 text-dark"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                </div>
                <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                    <?php
                    $date = $customer["registered_date"];
                    $splitdate = explode(" ", $date);
                    ?>
                    <span class="fw-bolder fs-5 text-white"><?php echo $splitdate[0]; ?></span>
                </div>
                <div class="col-1 d-none d-lg-block fs-5 bg-light p-1 text-center">
                    <?php
                    $acc = Database::search("SELECT * FROM `v_status` WHERE `id` = '" . $customer["v_status_id"] . "'");
                    $account = $acc->fetch_assoc();
                    ?>
                    <span class="fw-bolder fs-5 text-dark"><?php echo $account["name"]; ?></span>
                </div>
                <div class="col-4 col-lg-1 p-3 bg-white text-center d-grid">
                    <?php
                    if ($customer["status_id"] == "1") {
                    ?>
                        <button id="userStatus<?php echo $customer['email']; ?>" class="btn btn-danger fw-bold" onclick="userStatus('<?php echo $customer['email']; ?>');">Block</button>
                    <?php
                    } else {
                    ?>
                        <button id="userStatus<?php echo $customer['email']; ?>" class="btn btn-success fw-bold" onclick="userStatus('<?php echo $customer['email']; ?>');">Unblock</button>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>

    <?php

    }
} else {

    $search = $_GET["search"];

    ?>

    <div class="col-12">
        <div class="row mb-2">

            <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                <span class="fw-bolder fs-4 text-dark">Profile</span>
            </div>
            <div class="col-8 col-lg-4 bg-primary p-1 text-center">
                <span class="fw-bolder fs-4 text-white">Email</span>
            </div>
            <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-4 text-dark">Customer Name</span>
            </div>
            <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                <span class="fw-bolder fs-4 text-white">Registered Date</span>
            </div>
            <div class="col-1 d-none d-lg-block bg-light p-1 text-center">
                <span class="fw-bolder fs-4 text-dark">Account</span>
            </div>
            <div class="col-4 col-lg-1 p-1 bg-primary text-center"></div>

        </div>
    </div>

    <?php

    $customerrs = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $search . "%'");

    if ($customerrs->num_rows >= 1) {

        for ($rows = 0; $rows < $customerrs->num_rows; $rows++) {

            $customer = $customerrs->fetch_assoc();

    ?>

            <div class="col-12">
                <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                    <?php

                    $imgrs = Database::search("SELECT * FROM `profile_image` WHERE `user_email` = '" . $customer["email"] . "'");

                    if ($imgrs->num_rows == 1) {
                        $img = $imgrs->fetch_assoc();
                    ?>
                        <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                            <img src="<?php echo $img["code"]; ?>" height="60px" width="60px" />
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="col-2 d-none d-lg-block p-1 bg-light text-center">
                            <img src="Resources/demoprofile.svg" height="50px" width="50px" />
                        </div>
                    <?php
                    }


                    ?>

                    <div class="col-8 col-lg-4 bg-primary p-1 text-center">
                        <span class="fw-bolder fs-5 text-white fst-italic text-decoration-underline" style="cursor: pointer;" onclick="sendEmailToUser('<?php echo $customer['email']; ?>');"><?php echo $customer["email"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light p-1 text-center">
                        <span class="fw-bolder fs-5 text-dark"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                    </div>
                    <div class="col-2 d-none d-lg-block p-1 bg-primary text-center">
                        <?php
                        $date = $customer["registered_date"];
                        $splitdate = explode(" ", $date);
                        ?>
                        <span class="fw-bolder fs-5 text-white"><?php echo $splitdate[0]; ?></span>
                    </div>
                    <div class="col-1 d-none d-lg-block fs-5 bg-light p-1 text-center">
                        <?php
                        $acc = Database::search("SELECT * FROM `v_status` WHERE `id` = '" . $customer["v_status_id"] . "'");
                        $account = $acc->fetch_assoc();
                        ?>
                        <span class="fw-bolder fs-5 text-dark"><?php echo $account["name"]; ?></span>
                    </div>
                    <div class="col-4 col-lg-1 p-1 bg-white text-center d-grid">
                        <?php
                        if ($customer["status_id"] == "1") {
                        ?>
                            <button id="userStatus<?php echo $customer['email']; ?>" class="btn btn-danger fw-bold" onclick="userStatus('<?php echo $customer['email']; ?>');">Block</button>
                        <?php
                        } else {
                        ?>
                            <button id="userStatus<?php echo $customer['email']; ?>" class="btn btn-success fw-bold" onclick="userStatus('<?php echo $customer['email']; ?>');">Unblock</button>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>

        <?php

        }
    } else {

        ?>

        <div class="col-12" style="margin-top: 210px;">
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="text-primary fw-bolder">No Exact Matches Found</h2>
                </div>
            </div>
        </div>

<?php

    }
}

?>