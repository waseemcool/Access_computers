<?php

session_start();

require "connection.php";

if (isset($_SESSION["user"])) {

    $email = $_SESSION["user"]["email"];

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $email . "'");
    $invoicenum = $invoicers->num_rows;

?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Kur Computers - Purchased History</title>

        <?php require "headLinks.php"; ?>
    </head>

    <body>

        <div class="container-fluid">

            <div class="row">

                <?php require "header.php"; ?>

                <div class="col-12">
                    <h1 style="color: rgb(120, 221, 120); font-weight: bold; text-align: center; margin-top: 20px;">Purchased History</h1>
                </div>

                <?php

                    if ($invoicenum == 0) {
                    ?>
                        <div class="col-12">
                            <div class="row">

                                <div class="col-12" style="margin-top: 250px; margin-bottom: 250px;">
                                    <h1 class="text-center text-primary fw-bolder">You Have Not Purchased any Items Yet...</h1>
                                </div>

                            </div>
                        </div>
                    <?php
                    } else {
                    ?>

                        <div class="col-12">
                            <div class="row">

                                <div class="col-12 d-none d-lg-block bg-primary mt-3">
                                    <div class="row">

                                        <div class="col-1 text-center py-1">
                                            <span class="fw-bold fs-5 text-white">Order Id</span>
                                        </div>

                                        <div class="col-4 text-center ms-3 py-1">
                                            <span class="fw-bold fs-5 text-white">Product</span>
                                        </div>

                                        <div class="col-1 text-center py-1 ms-3">
                                            <span class="fw-bold fs-5 text-white">Qty</span>
                                        </div>

                                        <div class="col-1 text-center py-1 ms-3">
                                            <span class="fw-bold fs-5 text-white">Amount</span>
                                        </div>

                                        <div class="col-2 text-center py-1 ms-3">
                                            <span class="fw-bold fs-5 text-white">Purchased Date & Time</span>
                                        </div>

                                        <div class="col-2 py-1">
                                            
                                        </div>

                                    </div>
                                </div>

                                <?php

                                for ($i = 0; $i < $invoicenum; $i++) {
                                    $invoice = $invoicers->fetch_assoc();
                                ?>

                                    <div class="col-12">
                                        <div class="row border border-2 border-success border-top-0 border-start-0 border-end-0">

                                            <div class="col-12 col-lg-1 bg-info pt-5">
                                                <span class="fw-bold"><?php echo $invoice["order_id"]; ?></span>
                                            </div>

                                            <?php

                                            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $invoice["product_id"] . "'");
                                            $product = $productrs->fetch_assoc();

                                            ?>

                                            <div class="card col-12 col-lg-4 my-2 text-center ms-3">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="<?php echo $product["image"]; ?>" class="img-fluid rounded-start" />
                                                    </div>
                                                    <div class="col-md-8 mt-4">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-success fw-bold fs-3"><?php echo $product["title"]; ?></h5>
                                                            <span class="text-primary text-center fs-5 fw-bold">Rs. <?php echo $product["price"]; ?> .00</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-1 text-center mt-5 ms-3">
                                                <span class="fw-bold"><?php echo $invoice["qty"]; ?></span>
                                            </div>

                                            <div class="col-12 col-lg-1 text-center mt-5 ms-3">
                                                <span class="fw-bold">Rs. <?php echo $invoice["total"]; ?> .00</span>
                                            </div>

                                            <div class="col-12 col-lg-2 text-center mt-5 ms-3">
                                                <span class="fw-bold"><?php echo $invoice["datetime_added"]; ?></span>
                                            </div>

                                            <div class="col-12 col-lg-2 text-center mt-5">
                                                <button class="btn btn-secondary" onclick="openFeedbackModal(<?php echo $product['id']; ?>)" ;><i class="bi bi-info-circle-fill"></i> Feedback</button>
                                            </div>

                                            <!--<hr />-->

                                        </div>
                                    </div>

                                    <!-- Feedback Modal -->
                                    <div class="modal fade" id="feedbackmodal<?php echo $product["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="exampleModalLabel"><?php echo $product["title"]; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-12">
                                                        <textarea class="form-control" rows="10" id="content<?php echo $product["id"]; ?>"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success" onclick="sendFeedback(<?php echo $product['id']; ?>);">Send Feedback</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Feedback Modal -->

                                <?php

                                }

                                ?>

                            </div>
                        </div>

                        <!-- Alert Modal -->
                        <div class="modal fade" id="alertmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-3 fw-bold text-center text-success" id="exampleModalLabel">Feedback Added Success Fully!!!</h5>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" onclick="reload();">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Alert Modal -->

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
        window.location = "index.php";
    </script>

<?php

}

?>