<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers - Selling History</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body onload="searchSellHis();">

        <div class="container-fluid">

            <div class="row">

                <?php require "adminHeader.php"; ?>

                <div class="col-12 mt-3 mb-2 text-center" style="color: rgb(120, 221, 120);">
                    <h1 class="form-label fw-bold">Product Selling History</h1>
                </div>

                <!-- <div class="col-12">
                    <div class="row ">
                        <div class="offset-lg-4 col-6 col-lg-2 mt-2 text-center">
                            <span class="text-primary fs-4 fw-bold">From Date</span>
                            <input type="date" class="form-control fs-5 fw-bold" id="kfrom"/>
                        </div>
                        <div class="col-6 col-lg-2 mt-2 text-center">
                            <span class="text-primary fs-4 fw-bold">To Date</span>
                            <input type="date" class="form-control fs-5 fw-bold" id="kto"/>
                        </div>
                        <div class="col-12 col-lg-2 d-grid mt-3 mt-lg-5 text-center">
                            <button class="btn btn-success kbtn1 kbtn2" onclick="searchSellHis();">Search</button>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-12 mb-5">
                    <div class="row" id="sellhis">
                        
                    </div>
                </div> -->

                <div class="col-12 mt-3 mb-2">
                    <div class="row">

                        <div class="col-4 col-lg-2 bg-primary pt-2 pb-2">
                            <span class="fs-4 fw-bold text-white">Order ID</span>
                        </div>

                        <div class="col-5 col-lg-3 bg-light pt-2 pb-2 d-lg-block">
                            <span class="fs-4 fw-bold">Product</span>
                        </div>

                        <div class="col-3 bg-primary pt-2 pb-2  d-none d-lg-block">
                            <span class="fs-4 fw-bold text-white">Buyer</span>
                        </div>

                        <div class="col-1 bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-4 fw-bold">Price</span>
                        </div>

                        <div class="col-3 col-lg-1 bg-primary pt-2 pb-2 d-lg-block">
                            <span class="fs-4 fw-bold">Quantity</span>
                        </div>

                        <div class="col-3 col-lg-2 bg-light pt-2 pb-2 d-lg-block">
                            <span class="fs-4 fw-bold">Date</span>
                        </div>


                    </div>
                </div>

                <div class="col-12">
                    <div class="row">

                        <?php
                            $invoicers = Database::search("SELECT * FROM `invoice`");
                            $inr = $invoicers->num_rows;
                    
                            for ($k = 0; $k < $inr; $k++) {
                                $ir = $invoicers->fetch_assoc();
                            
                        ?>

                        <div class="col-4 col-lg-2 bg-primary pt-2 pb-2">
                            <span class="fs-5 fw-bold text-white"><?php echo $ir["order_id"]; ?></span>
                        </div>

                        <div class="col-5 col-lg-3 bg-light p-2 d-lg-block">
                            <?php

                            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $ir["product_id"] . "'");
                            $pr = $productrs->fetch_assoc();

                            ?>
                            <span class="fs-5 fw-bold"><?php echo $pr["title"]; ?></span>
                        </div>

                        <div class="col-6 col-lg-3 bg-primary d-none d-lg-block pt-2 pb-2">
                            <?php

                            $urs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $ir["user_email"] . "'");
                            $ur = $urs->fetch_assoc();

                            ?>
                            <span class="fs-5 fw-bold text-white"><?php echo $ur["fname"] . " " . $ur["lname"]; ?></span>
                        </div>

                        <div class="col-1 bg-light pt-2 pb-2 d-none d-lg-block">
                            <span class="fs-5 fw-bold"><?php echo $ir["total"]; ?></span>
                        </div>

                        <div class="col-3 col-lg-1 bg-primary pt-2 pb-2 d-lg-block">
                            <span class="fs-5 fw-bold text-white"><?php echo $ir["qty"]; ?></span>
                        </div>

                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                            <?php
                            $splitdate = explode(" ", $ir["datetime_added"]);
                            $datetime1 = $splitdate[0];
                            $datetime2 = $splitdate[1];
                            ?>
                            <span class="fs-5 fw-bold"><?php echo $datetime1." ".$datetime2; ?></span>
                        </div>

                        <?php
                            }
                        ?>

                    </div>
                </div>

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
        window.location = "adminSignIn.php";
    </script>

<?php

}

?>