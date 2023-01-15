<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    if (isset($_GET["oid"])) {

        $orderid = $_GET["oid"];

        $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderid . "'");

        if ($invoicers->num_rows >= 1) {

            $invoice = $invoicers->fetch_assoc();
?>

            <!DOCTYPE html>

            <html>

            <head>

                <title>Kur Computers - Invoice</title>

                <?php require "headLinks.php"; ?>

            </head>

            <body class="bg-light">

                <div class="container-fluid">
                    <div class="row">

                        <?php require "header.php"; ?>

                        <div class="col-12">
                            <div class="row mt-3">
                                <div class="col-12 text-end">
                                    <button class="btn btn-primary fw-bold" style="border-radius: 7px;" onclick="printDiv();"><i class="bi bi-printer-fill"></i> &nbsp;Print</button>
                                </div>
                            </div>
                        </div>

                        <div id="GFG">

                            <div class="col-12">
                                <div class="row mb-3">

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12">
                                                <h1 class="fs-1 fw-bold text-start" style="color: rgb(120, 221, 120);">Kur Computers</h1>
                                            </div>
                                            <div class="col-12">
                                                <span class="fw-bold text-primary text-start">37/4, 1/1, Kurundugolla Werallagama, Aladeniya</span>
                                                <br />
                                                <span class="fw-bold text-primary text-start">Kandy</span>
                                                <br />
                                                <span class="fw-bold text-primary text-start">Sri Lanka</span>
                                                <br />
                                                <span class="fw-bold text-primary text-start">0761234567</span>
                                                <br />
                                                <span class="fw-bold text-primary text-start">kurcomputers@gmail.com</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6 mt-5">
                                        <div class="row me-1">
                                            <div class="col-12">
                                                <div class="row justify-content-end">
                                                    <span class="text-primary fw-bold fs-5 text-end col-5">Invoice Id</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-success rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $invoice["id"]; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="row justify-content-end">
                                                    <span class="text-primary fw-bold fs-5 text-end col-5">Order Id</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-success rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $invoice["order_id"]; ?></span>
                                                </div>
                                            </div>
                                            <?php
                                            $datetime = $invoice["datetime_added"];
                                            $splitdate = explode(" ", $datetime)
                                            ?>
                                            <div class="col-12 mt-1">
                                                <div class="row justify-content-end">
                                                    <span class="text-primary fw-bold fs-5 text-end col-5">Date</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-success rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $splitdate[0]; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-1">
                                                <div class="row justify-content-end">
                                                    <span class="text-primary fw-bold fs-5 text-end col-5">Time</span>
                                                    <span class="fw-bold fs-6 text-center border border-2 border-success rounded p-1 col-7 col-sm-6 col-md-4 bg-white"><?php echo $splitdate[1]; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr />

                            <div class="col-12">
                                <div class="row border border-5 border-primary border-top-0 border-end-0 border-bottom-0" style="margin-left: 2px;">
                                    <div class="col-12 col-md-6 col-lg-4 bg-info p-1">
                                        <h3 class="text-white fw-bold fs-4 text-center">Bill To</h3>
                                    </div>
                                </div>
                            </div>
                            <?php

                            $customerrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $invoice["user_email"] . "'");
                            $customer = $customerrs->fetch_assoc();

                            $delivery_detailsrs = Database::search("SELECT * FROM `delivery` WHERE `invoice_id` = '" . $invoice["id"] . "'");
                            $delivery_details = $delivery_detailsrs->fetch_assoc();

                            $cityrs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $delivery_details["city_id"] . "'");
                            $city = $cityrs->fetch_assoc();

                            ?>
                            <div class="col-12 mb-3">
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <span class="fw-bold text-black-50 text-start">Name :</span>&nbsp;&nbsp;&nbsp;
                                        <span class="fw-bold text-start" style="color: rgb(120, 221, 120);"><?php echo $customer["fname"] . " " . $customer["lname"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50 text-start">E-mail Address :</span>&nbsp;&nbsp;&nbsp;
                                        <span class="fw-bold text-start" style="color: rgb(120, 221, 120);"><?php echo $customer["email"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50 text-start">Delivery Address :</span>&nbsp;&nbsp;&nbsp;
                                        <span class="fw-bold text-start" style="color: rgb(120, 221, 120);"><?php echo $delivery_details["address"]; ?></span>
                                        <br />
                                        <span class="fw-bold text-black-50 text-start">City Name :</span>&nbsp;&nbsp;&nbsp;
                                        <span class="fw-bold text-start" style="color: rgb(120, 221, 120);"><?php echo $city["name"]; ?></span>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <table class="table table-responsive table-secondary">
                                <thead>
                                    <tr>
                                        <th class="text-primary fw-bold">Product</th>
                                        <th class="text-primary fw-bold">Unit Price</th>
                                        <th class="text-primary fw-bold">Quantity</th>
                                        <th class="text-primary fw-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $subtotal = "0";
                                    $discount = "00";
                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $orderid . "'");
                                    for ($i = 0; $i < $invoice_rs->num_rows; $i++) {
                                        $invoice_details = $invoice_rs->fetch_assoc();
                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice_details["product_id"] . "'");
                                        // for ($p = 0; $p < $prductrs->num_rows; $p++) {
                                            $product = $productrs->fetch_assoc();
                                            $subtotal = $subtotal + $invoice_details["total"];
                                            $grandtotal = $subtotal - $discount;

                                    ?>
                                            <tr class="table-active">
                                                <td class="fw-bold"><?php echo $product["title"]; ?></td>
                                                <td class="fw-bold"><?php echo $product["price"]; ?></td>
                                                <td class="fw-bold"><?php echo $invoice_details["qty"]; ?></td>
                                                <td class="fw-bold"><?php echo $invoice_details["total"]; ?></td>
                                            </tr>
                                    <?php
                                        // }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6 col-md-3 offset-md-3 mt-1">
                                        <span class="fs-5 fw-bold text-end">SUBTOTAL</span>
                                        <hr class="border border-3 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-5 fw-bold text-end">DISCOUNT</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-4 fw-bold text-end" style="color: rgb(120, 221, 120);">GRAND TOTAL</span>
                                        <hr class="border border-3 border-start-0 border-top-0 border-end-0 border-primary" />
                                    </div>
                                    <div class="col-6 text-end mt-1">
                                        <span class="fs-5 fw-bold text-end">Rs. <?php echo $subtotal; ?> .00</span>
                                        <hr class="border border-3 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-5 fw-bold text-end">Rs. <?php echo $discount; ?> .00</span>
                                        <hr class="border border-2 border-start-0 border-top-0 border-end-0 border-dark" />
                                        <span class="fs-4 fw-bold text-end" style="color: rgb(120, 221, 120);">Rs. <?php echo $grandtotal; ?> .00</span>
                                        <hr class="border border-3 border-start-0 border-top-0 border-end-0 border-primary" />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 mt-3">
                                        <h1 class="fs-1 fw-bolder text-center" style="color: rgb(120, 221, 120);">Thank You!!!</h1>
                                    </div>
                                </div>
                            </div>

                            <hr />

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 mb-3 text-center">
                                        <span class="text-danger fw-bold">Invoice was created on a computer and is valid without the Signature and Seal.</span>
                                    </div>
                                </div>
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