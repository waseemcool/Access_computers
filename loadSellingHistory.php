<?php

// session_start();

// require "connection.php";

// $kfrom = $_GET["kfrom"];
// $kto = $_GET["kto"];

?>

    <!-- <div class="col-12 mt-3 mb-2">
        <div class="row">

            <div class="col-4 col-lg-2 bg-primary pt-2 pb-2 text-end">
                <span class="fs-4 fw-bold text-white">Order ID</span>
            </div>

            <div class="col-5 col-lg-3 bg-light pt-2 pb-2 d-lg-block">
                <span class="fs-4 fw-bold">Product</span>
            </div>

            <div class="col-3 bg-primary pt-2 pb-2  d-none d-lg-block">
                <span class="fs-4 fw-bold text-white">Buyer</span>
            </div>

            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                <span class="fs-4 fw-bold">Price</span>
            </div>

            <div class="col-3 col-lg-2 bg-primary pt-2 pb-2 d-lg-block">
                <span class="fs-4 fw-bold">Quantity</span>
            </div>


        </div>
    </div> -->

    <?php

    // if(empty($kfrom) && empty($kto)){

    //     $invoicers = Database::search("SELECT * FROM `invoice`");
    //     $inr = $invoicers->num_rows;

    //     for ($y = 0; $y < $inr; $y++) {
    //         $ir = $invoicers->fetch_assoc();
            //not need
            // $betweendate = $ir["datetime_added"];

            // $splitdate = explode(" ", $betweendate);
            // $date = $splitdate[0];

            // if ($kfrom <=  $date && $kto >= $date) {
                // echo $br["order_id"];
                // echo "<br />";
            //not need
            ?>

                
                <!-- <div class="col-12">
                    <div class="row">

                        <div class="col-4 col-lg-2 bg-primary pt-2 pb-2 text-end">
                            <span class="fs-5 fw-bold text-white"><?php //echo $ir["order_id"]; ?></span>
                        </div>

                        <div class="col-5 col-lg-3 bg-light p-2 d-lg-block">
                            <?php

                            // $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $ir["product_id"] . "'");
                            // $pr = $productrs->fetch_assoc();

                            ?>
                            <span class="fs-5 fw-bold"><?php //echo $pr["title"]; ?></span>
                        </div>

                        <div class="col-6 col-lg-3 bg-primary d-none d-lg-block pt-2 pb-2">
                            <?php

                            // $urs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $ir["user_email"] . "'");
                            // $ur = $urs->fetch_assoc();

                            ?>
                            <span class="fs-5 fw-bold text-white"><?php //echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                        </div>

                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold"><?php //echo $ir["total"]; ?></span>
                        </div>

                        <div class="col-3 col-lg-2 bg-primary pt-2 pb-2 d-lg-block">
                            <span class="fs-5 fw-bold text-white"><?php //echo $ir["qty"]; ?></span>
                        </div>

                    </div>
                </div> -->

            <?php
        
            //}

        //}

    //}else{

        // if (!empty($kfrom) && !empty($kto)) {

        //     $betweenrs = Database::search("SELECT * FROM `invoice`");
        //     $bnr = $betweenrs->num_rows;
    
        //     for ($y = 0; $y < $bnr; $y++) {
        //         $br = $betweenrs->fetch_assoc();
        //         $betweendate = $br["datetime_added"];
    
        //         $splitdate = explode(" ", $betweendate);
        //         $date = $splitdate[0];
    
        //         if ($kfrom <=  $date && $kto >= $date) {
                    //not need
                    // echo $br["order_id"];
                    // echo "<br />";
                    //not need
                ?>
    
                    
                    <!-- <div class="col-12">
                        <div class="row">
    
                            <div class="col-4 col-lg-2 bg-primary pt-2 pb-2 text-end">
                                <span class="fs-5 fw-bold text-white"><?php //echo $br["order_id"]; ?></span>
                            </div>
    
                            <div class="col-5 col-lg-3 bg-light p-2 d-lg-block">
                                <?php
    
                                // $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $br["product_id"] . "'");
                                // $pr = $productrs->fetch_assoc();
    
                                ?>
                                <span class="fs-5 fw-bold"><?php //echo $pr["title"]; ?></span>
                            </div>
    
                            <div class="col-6 col-lg-3 bg-primary d-none d-lg-block pt-2 pb-2">
                                <?php
    
                                // $urs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $br["user_email"] . "'");
                                // $ur = $urs->fetch_assoc();
    
                                ?>
                                <span class="fs-5 fw-bold text-white"><?php //echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                            </div>
    
                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold"><?php //echo $br["total"]; ?></span>
                            </div>
    
                            <div class="col-3 col-lg-2 bg-primary pt-2 pb-2 d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php //echo $br["qty"]; ?></span>
                            </div>
    
                        </div>
                    </div> -->
    
                <?php
            
                // }else{
                    
                ?>
                    
                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label class="fs-1 fw-bolder">No Exact Matches Found</label>
                            </div>
                        </div>
                    </div> -->
    
                <?php
    
                //}
    
            //}
    
        // } else if (!empty($kfrom) && empty($kto)) {
        //     $fromrs = Database::search("SELECT * FROM `invoice`");
        //     $fnr = $fromrs->num_rows;
    
        //     for ($x = 0; $x < $fnr; $x++) {
        //         $fr = $fromrs->fetch_assoc();
        //         $fromdate = $fr["datetime_added"];
    
        //         $splitdate = explode(" ", $fromdate);
        //         $date = $splitdate[0];
    
        //         if ($kfrom == $date) {
                    //not need
                    // echo $fr["order_id"];
                    // echo "<br />";
                    //not need
            
                ?>
    
                    <!-- <div class="col-12">
                        <div class="row">
    
                            <div class="col-4 col-lg-2 bg-primary pt-2 pb-2 text-end">
                                <span class="fs-5 fw-bold text-white"><?php //echo $fr["order_id"]; ?></span>
                            </div>
    
                            <div class="col-5 col-lg-3 bg-light p-2 d-lg-block">
                            <?php
    
                            // $prod = Database::search("SELECT * FROM `product` WHERE `id` = '" . $fr["product_id"] . "'");
                            // $pr = $prod->fetch_assoc();
    
                            ?>
                            <span class="fs-5 fw-bold"><?php //echo $pr["title"]; ?></span>
                            </div>
    
                            <div class="col-6 col-lg-3 bg-primary d-none d-lg-block pt-2 pb-2">
                            <?php
    
                            // $urs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $fr["user_email"] . "'");
                            // $ur = $urs->fetch_assoc();
    
                            ?>
                            <span class="fs-5 fw-bold text-white"><?php //echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                            </div>
    
                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold"><?php //echo $fr["total"]; ?></span>
                            </div>
    
                            <div class="col-3 col-lg-2 bg-primary pt-2 pb-2 d-lg-block">
                            <span class="fs-5 fw-bold text-white"><?php //echo $fr["qty"]; ?></span>
                            </div>
    
                        </div>
                    </div>    -->
    
                <?php
    
                //}else{
    
                ?>
    
                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="col-12 text-center">
                                <label class="fs-1 fw-bolder">No Exact Matches Found</label>
                            </div>
                        </div>
                    </div> -->
    
                <?php
    
            //     }
    
            // }
    
        //} else if(empty($kfrom) && !empty($kto)){
    
            // $todayrs = Database::search("SELECT * FROM `invoice`");
            // $tn = $todayrs->num_rows;
    
            // for ($z = 0; $z < $tn; $z++) {
            //     $tr = $todayrs->fetch_assoc();
            //     $nodate = $tr["date"];
    
            //     $splitdate = explode(" ", $nodate);
            //     $date = $splitdate[0];
    
            //     $today = date("Y-m-d");
    
            //     if ($today <=  $date) {
                    //not need
                    // echo $tr["order_id"];
                    // echo "<br />";
                    //not need
                ?>
    
                    <!-- <div class="col-12">
                        <div class="row">
    
                            <div class="col-4 col-lg-2 bg-primary pt-2 pb-2 text-end">
                                <span class="fs-5 fw-bold text-white"><?php //echo $tr["order_id"]; ?></span>
                            </div>
    
                            <div class="col-5 col-lg-3 bg-light p-2 d-lg-block">
                                <?php
    
                                // $prod = Database::search("SELECT * FROM `product` WHERE `id` = '" . $tr["product_id"] . "'");
                                // $pr = $prod->fetch_assoc();
    
                                ?>
                                <span class="fs-5 fw-bold"><?php //echo $pr["title"]; ?></span>
                            </div>
    
                            <div class="col-6 col-lg-3 bg-primary d-none d-lg-block pt-2 pb-2">
                                <?php
    
                                // $urs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $tr["user_email"] . "'");
                                // $ur = $urs->fetch_assoc();
    
                                ?>
                                <span class="fs-5 fw-bold text-white"><?php //echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                            </div>
    
                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold"><?php //echo $tr["total"]; ?></span>
                            </div>
    
                            <div class="col-3 col-lg-2 bg-primary pt-2 pb-2 d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php //echo $tr["qty"]; ?></span>
                            </div>
    
                        </div>
                    </div> -->
    
    <?php
    
            //     }
            
            // }
    
            ?>
    
            <!-- <div class="col-12">
                <div class="row">
                    <div class="col-12 text-center">
                        <label class="fs-1 fw-bolder">Please Choose The From Date</label>
                    </div>
                </div>
            </div> -->
    
            <?php
    
    //     }

    // }

?>