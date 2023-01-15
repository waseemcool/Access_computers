<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
    $productnum = $productrs->num_rows;

    if ($productnum == 1) {

        $productrow = $productrs->fetch_assoc();

?>

        <!DOCTYPE html>

        <html>

        <head>

            <title>Kur Computers - Product View</title>

            <?php require "headLinks.php"; ?>

        </head>

        <body>

            <div class="container-fluid">
                <div class="row">

                    <!-- header -->
                    <?php require "header.php"; ?>
                    <!-- header -->

                    <!-- product pic -->
                    <div class="col-12">
                        <div class="row mt-5 justify-content-center">

                            <div class="col-sm-10 col-md-8 col-lg-4">
                                <div class="row justify-content-center">
                                    <div class="col-10 p-2">
                                        <img src="<?php echo $productrow["image"]; ?>" class="col-12 img-thumbnail" height="50vh" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-10 col-md-8 col-lg-4">
                                <div class="row justify-content-center g-3">

                                    <div class="col-12">
                                        <h1 class="fw-bold fs-1 text-success"><?php echo $productrow["title"]; ?></h1>
                                    </div>

                                    <hr />

                                    <div class="col-12 mt-3">
                                        <label class="form-label fs-5 fw-bold">Rs. <?php echo $productrow["price"]; ?> .00</label>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Add a Quantity</label>
                                        <input type="number" class="form-control" value="1" id="qty" />
                                    </div>
                                    <div class="col-12 d-grid">
                                        <a class="btn btn-outline-success" href="buyNow.php?id=<?php echo $productrow["id"]; ?>">Buy Now</a>
                                    </div>
                                    <div class="col-12 d-grid">
                                        <button onclick="AddToCart(<?php echo $id; ?>);" class="btn btn-outline-primary">Add To Cart</button>
                                    </div>

                                    <?php

                                    $watchlist = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '" . $productrow["id"] . "' AND `user_email` = '" . $_SESSION["user"]["email"] . "'");

                                    if ($watchlist->num_rows == 1) {
                                        $watchlistrow = $watchlist->fetch_assoc();
                                    ?>

                                        <div class="col-12 text-center">
                                            <i onclick="RemoveFromWatchlist(<?php echo $watchlistrow['id']; ?>);" class="bi bi-heart-fill text-danger fs-1"></i>
                                        </div>
                                    <?php

                                    } else {

                                    ?>

                                        <div class="col-12 text-center">
                                            <i onclick="AddToWatchlist(<?php echo $productrow['id']; ?>);" class="bi bi-heart-fill text-secondary fs-1"></i>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label text-primary fs-1 fw-bold">Description</label>
                                            </div>
                                            <div class="col-12">
                                                <p class="fw-bold"><?php echo $productrow["description"]; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- product pic -->

                    <div class="col-12">
                        <hr />
                    </div>

                    <!--feed back-->
                    <?php

                    $feedbackrs = Database::search("SELECT * FROM feedback WHERE `product_id`='" . $productrow["id"] . "';");
                    $feedbacknr = $feedbackrs->num_rows;

                    if ($feedbacknr >= 1) {

                    ?>

                        <div class="col-12 my-2">
                            <div class="row g-1">

                                <div class="col-12 text-center mb-3">
                                    <h1 class="fw-bold">Feed Backs</h1>
                                </div>

                                

                                <?php

                                for ($k = 0; $k < $feedbacknr; $k++) {

                                    $feedbackrow = $feedbackrs->fetch_assoc();

                                    $customerrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $feedbackrow["user_email"] . "';");
                                    $customerrow = $customerrs->fetch_assoc();

                                ?>

                                    <div class="col-12 col-sm-10 col-md-6 col-lg-4 border border-2 border-primary rounded mb-5 me-2 p-1">
                                        <div class="row">
                                            <div class="col-12 text-center">
                                                <span class="text-primary align-center fw-bold fs-4"><?php echo $customerrow["fname"] . " " . $customerrow["lname"]; ?></span>
                                            </div>
                                            <div class="col-12">
                                                <hr />
                                            </div>
                                            <div class="col-12 mb-2">
                                                <span style="color: rgb(120, 221, 120);" class="fs-5"><?php echo $feedbackrow["content"]; ?></span>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                }

                                ?>

                            </div>
                        </div>

                    <?php

                    }

                    ?>
                    <!-- feed back -->

                    <!-- footer -->
                    <?php require "footer.php"; ?>
                    <!-- footer -->

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

} else {

    ?>

    <script>
        window.location = "index.php";
    </script>

<?php

}

?>