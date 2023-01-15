<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];
    $total = "0";

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers - Cart</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php require "header.php"; ?>

                <div class="col-12 mt-3 mb-5">
                    <div class="row">

                        <div class="col-12 text-center">
                            <h1 class="form-label fw-bolder" style="color: rgb(120, 221, 120);">Basket <i class="bi bi-cart3"></i></h1>
                        </div>

                        <!-- <div class="col-12">
                            <hr class="hrbreak1" />
                        </div> -->

                        <?php

                        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "'");
                        $cn = $cartrs->num_rows;

                        if ($cn == 0) {
                        ?>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <h2 class="form-label fw-bolder text-primary">You Have no Items in Your Basket</h2>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid">
                                        <a href="index.php" class="btn btn-success kbtn1 fs-3">Start Shopping</a>
                                    </div>
                                </div>
                            </div>

                        <?php
                        } else {
                        ?>

                            <div class="col-12 col-lg-8 mt-3">
                                <div class="row g-2">
                                    <?php
                                    for ($i = 0; $i < $cn; $i++) {
                                        $cr  = $cartrs->fetch_assoc();
                                        $cid = $cr["product_id"];

                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cid . "'");
                                        $productrow = $productrs->fetch_assoc();
                                        $prod = $productrow["id"];

                                        $total = $total + ($productrow["price"] * $cr["qty"]);

                                    ?>

                                        <div class="card mb-3 mx-0 mx-lg-3 col-12">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="<?php echo $productrow["image"]; ?>" class="img-fluid rounded-start" />
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">
                                                        <h3 class="card-title text-success fw-bold"><?php echo $productrow["title"]; ?></h3>
                                                        <div class="col-12 mt-3">
                                                            <h3 class="text-primary fw-bolder">Description</h3>
                                                        </div>
                                                        <div class="col-12">
                                                            <p class="fw-bold"><?php echo $productrow["description"]; ?></p>
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
                                                                    <label class="form-label fw-bold">Quantity</label>
                                                                    <input type="number" class="form-control" value="<?php echo $cr["qty"]; ?>" id="qty<?php echo $productrow['id']; ?>" onkeyup="changeQuantity('<?php echo $productrow['id']; ?>');" onchange="changeQuantity('<?php echo $productrow['id']; ?>');" />
                                                                    <small class="fw-bold text-danger" id="error"></small>
                                                                </div>
                                                                <hr class="my-3" />
                                                                <!-- <div class="col-12">
                                                                    <label class="form-label fw-bold text-dark fs-5">Request Total :</label>&nbsp;
                                                                    <label class="form-label fw-bold text-black-50 fs-5">Rs. .00</label>
                                                                </div> -->
                                                                <div class="col-12 d-grid">
                                                                    <a href="BuyNow.php?id=<?php echo $productrow["id"]; ?>" class="btn btn-outline-success">Pay for This</a>
                                                                </div>
                                                                <div class="col-12 d-grid">
                                                                    <button class="btn btn-outline-danger" onclick="removeFromCart(<?php echo $cr['id']; ?>);">Remove</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>

                            <div class="col-12 col-lg-3 mt-1 ms-5">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label text-primary fs-3 fw-bold">Summary</label>
                                    </div>
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-6 fw-bold">Items (<?php echo $cn; ?>)</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold">Rs. <?php echo $total; ?> .00</span>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <span class="fs-6 fw-bold">Shipping (Free)</span>
                                    </div>
                                    <div class="col-6 text-end mt-3">
                                        <span class="fs-6 fw-bold">Rs. 00 .00</span>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <hr />
                                    </div>
                                    <div class="col-6 mt-2">
                                        <span class="text-primary fs-5 fw-bolder">Total</span>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <span class="text-primary fs-5 fw-bolder">Rs. <?php echo $total; ?> .00</span>
                                    </div>
                                    <div class="col-12 mt-3 mb-3 d-grid">
                                        <button class="btn btn-success kbtn1 kbtn2 fs-5 fw-bold" onclick="goToCheckOut();">CHECK OUT</button>
                                    </div>
                                </div>
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
        window.location = "signIn.php";
    </script>

<?php

}

?>