<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {


    $email = $_SESSION["user"]["email"];


?>

<!DOCTYPE html>

<html>

<head>

    <title>Kur Computers - Watch List</title>

    <?php require "headLinks.php"; ?>

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <!-- header -->
            <?php require "header.php"; ?>
            <!-- header -->

            <div class="col-12 mt-3 mb-5">
                <div class="row">

                    <div class="col-12">
                        <h1 class="form-label fs-1 fw-bolder" style="color: rgb(120, 221, 120);">Watch List &hearts;</h1>
                    </div>

                    <!-- <div class="col-12">
                        <div class="row">
                            <div class="offset-1 offset-lg-3 col-8 col-lg-5 mb-3">
                                <input type="text" class="form-control" placeholder="Search in Watchlist..." />
                            </div>
                            <div class="col-2 col-lg-2 d-grid mb-3">
                                <button class="btn btn-outline-primary">Search</button>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-12">
                        <hr class="hrbreak1" />
                    </div>
            
                    <div class="col-12 col-lg-2 mt-3 border border-start-0 border-top-0 border-bottom-0 border-end border-2 border-primary" style="border-color: rgb(120, 221, 120);">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                            </ol>
                        </nav>
                        <nav class="nav nav-pills flex-column">
                            <a class="nav-link active" aria-current="page" style="background-color: rgb(120, 221, 120);">My Watch List</a>
                            <a class="nav-link" href="cart.php">My Cart</a>
                        </nav>
                    </div>

                    <?php

                    $watchlistrs = Database::Search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $email . "'");
                    $wn = $watchlistrs->num_rows;

                    if ($wn <= 0) {

                    ?>

                    <!-- without items -->
                    <div class="col-12 col-lg-10">
                        <div class="row">
                            <div class="col-12 emptyview"></div>
                            <div class="col-12 text-center">
                                <h1 class="form-label fw-bolder text-primary">You Have no Items in Your Watch List.</h1>
                            </div>
                        </div>
                    </div>
                    <!-- without items -->

                    <?php

                    } else {

                    ?>

                        <div class="col-12 col-lg-9 mt-3">
                            <div class="row g-2">
                                <?php

                                for ($i = 0; $i < $wn; $i++) {
                                    $wr  = $watchlistrs->fetch_assoc();
                                    $wid = $wr["product_id"];

                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $wid . "'");
                                    $pn = $productrs->num_rows;

                                    if ($pn == 1) {
                                        $productrow = $productrs->fetch_assoc();
                                        $prod = $productrow["id"];

                                ?>

                                    <div class="card mb-3 mx-0 mx-lg-3 col-12">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="<?php echo $productrow["image"]; ?>" class="img-fluid rounded-start" />
                                            </div>
                                            <div class="col-md-5">
                                                <div class="card-body">
                                                    <h2 class="card-title text-success fw-bold"><?php echo $productrow["title"]; ?></h2>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 mt-3">
                                                                <h3 class="form-label text-primary fw-bold">Description</h3>
                                                            </div>
                                                            <div class="col-12">
                                                                <p class="fw-bold"><?php echo $productrow["description"]; ?></p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-3 mt-4">
                                                <div class="row">
                                                    <div class="col-12 card-body">
                                                        <div class="row g-2">
                                                            <div class="col-12">
                                                                <span class="fs-3 text-dark fw-bold">Rs. <?php echo $productrow["price"]; ?> .00</span>
                                                            </div>
                                                            <div class="col-12">
                                                                <label class="form-label fs-5 fw-bold">Quantity</label>
                                                                <input type="number" class="form-control" value="1" id="qty" />
                                                            </div>
                                                            <hr class="my-3" />
                                                            <div class="col-12 d-grid">
                                                                <button class="btn btn-outline-success">Buy Now</button>
                                                            </div>
                                                            <div class="col-12 d-grid">
                                                                <button class="btn btn-outline-primary" onclick="AddToCart(<?php echo  $productrow['id']; ?>);">Add To Cart</button>
                                                            </div>
                                                            <div class="col-12 d-grid">
                                                                <button class="btn btn-outline-danger" onclick="RemoveFromWatchlist(<?php echo $wr['id']; ?>);">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                        
                                    }

                                }
                                        
                                ?>

                            </div>
                        </div>

                    <?php

                    }

                    ?>

                </div>
            </div>

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

<script>alert("Please Sign In First");</script>

<?php

}

?>