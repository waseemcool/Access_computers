<?php

session_start();

require "connection.php";

if (isset($_GET["id"])) {

    $brandid = $_GET["id"];

    $pageno;

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body>

        <div class="container-fluid">
            <div class="row">

                <?php require "header.php"; ?>

                <div class="col-12 text-center mt-3">
                    <?php
                    $brandrs = Database::search("SELECT * FROM brand WHERE `id`='".$brandid."';");
                    $brandrow = $brandrs->fetch_assoc();
                    ?>
                    <h1 style="color: rgb(120, 221, 120);" class="fs-1 fw-bold"><?php echo $brandrow["name"]; ?></h1>
                </div>

                <div class="col-12 mt-3 mb-4">
                    <div class="row justify-content-center">

                        <?php

                        if (isset($_GET["page"])) {
                            $pageno = $_GET["page"];
                        } else {
                            $pageno = 1;
                        }

                        $products = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $brandid . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC");
                        $d = $products->num_rows;
                        $row = $products->fetch_assoc();

                        $results_per_page = 7;

                        $number_of_pages = ceil($d / $results_per_page);

                        $page_first_result = ((int)$pageno - 1) * $results_per_page;

                        $selectedrs = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $brandid . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC 
                        LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                        $srn = $selectedrs->num_rows;

                        while ($product = $selectedrs->fetch_assoc()) {

                            // $productrs = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $brandid . "' AND `status_id` = '1' ORDER BY `datetime_added` DESC");

                            // for ($p = 0; $p < $productrs->num_rows; $p++) {

                            // $product = $productrs->fetch_assoc();

                        ?>

                            <div class="col-7 col-sm-5 col-md-4 col-lg-2 mt-3 ms-2 card cardhover" onclick="goToViewProduct(<?php echo $product['id']; ?>);">
                                <img src="<?php echo $product["image"]; ?>" class="card-img-top img-hgt img-fluid mt-1" />
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5 class="card-title fw-bold"><?php echo $product["title"]; ?></h5>
                                    </div>
                                    <div class="col-12">
                                        <span class="card-text fw-bold" style="color: rgb(120, 221, 120);">Rs. <?php echo $product["price"]; ?> .00</span>
                                    </div>
                                    <!-- <div class="col-12 d-grid">
                                        <a href="ViewProduct.php?id=<?php //echo $product["id"]; ?>" class="btn btn-dark">View Product</a>
                                    </div> -->
                                </div>
                            </div>

                        <?php

                        }

                        ?>

                    </div>
                </div>

                <!-- pagination -->
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="offset-3 col-6 d-flex justify-content-center">
                            <div class="pagination">
                                <a href="<?php
                                            if ($pageno <= 1) {
                                                echo "#";
                                            } else {
                                                echo "?id=" . $brandid . "&page=" . ($pageno - 1);
                                            }
                                            ?>">&laquo;</a>
                                <?php

                                for ($page = 1; $page <= $number_of_pages; $page++) {
                                    if ($page == $pageno) {
                                ?>
                                        <a href="<?php echo "?id=" . $brandid . "&page=" . ($page); ?>" class="ms-1 active"><?php echo $page; ?></a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="<?php echo "?id=" . $brandid . "&page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>
                                    <?php
                                    }
                                    ?>

                                <?php
                                }

                                ?>

                                <a href="<?php

                                if ($pageno >= $number_of_pages) {
                                    echo "#";
                                } else {
                                    echo "?id=" . $brandid . "&page=" . ($pageno + 1);
                                }

                                ?>">&raquo;</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pagination -->

                <!--all brands-->
                <!-- <div class="col-12 col-lg-3 mb-3 ms-3">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="fw-bold">All Brands</h3>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12">
                                    <input type="checkbox" name="ch1" value="1" style="width: 16px; height: 16px;"/>
                                    <span class="text-primary fs-4 fw-bold">Acer</span>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="ch2" value="2" style="width: 16px; height: 16px;"/>
                                    <span class="text-primary fs-4 fw-bold">Lenovo</span>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="ch3" value="3" style="width: 16px; height: 16px;"/>
                                    <span class="text-primary fs-4 fw-bold">ASUS</span>
                                </div>
                                <div class="col-12">
                                    <input type="checkbox" name="ch4" value="4" style="width: 16px; height: 16px;"/>
                                    <span class="text-primary fs-4 fw-bold">MSI</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!--all brands-->

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