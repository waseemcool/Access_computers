<?php

require "connection.php";

if (empty($_GET["search"])) {

    $producttitle = Database::search("SELECT DISTINCT(`brand`.`id`) FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id`");
    $num = $producttitle->num_rows;
    for ($i = 0; $i < $num; $i++) {
        $row = $producttitle->fetch_assoc();

        $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $row["id"] . "'");
        $brand_row = $brand->fetch_assoc();
    ?>
        <div class="col-12">
            <a href="allProductView.php?id=<?php echo $brand_row["id"]; ?>" class="ms-lg-3 link-dark fs-2 brands"><?php echo $brand_row["name"]; ?></a>
            <a href="allProductView.php?id=<?php echo $brand_row["id"]; ?>" class="ms-3 link-dark see_all">See All &rightarrow;</a>
        </div>
        <?php
        $productinfo = Database::search("SELECT * FROM `product` WHERE `brand_id` = '" . $row["id"] . "' ORDER BY `datetime_added` DESC LIMIT 4 OFFSET 0");
        $nr = $productinfo->num_rows;
        for ($x = 0; $x < $nr; $x++) {
            $pd = $productinfo->fetch_assoc();
        ?>
            <div class="col-7 col-sm-5 col-md-4 col-lg-2 mt-3 mb-3 ms-2 card cardhover" onclick="goToViewProduct(<?php echo $pd['id']; ?>);">
                <img src="<?php echo $pd["image"]; ?>" class="card-img-top img-hgt img-fluid mt-1" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title fw-bold"><?php echo $pd["title"]; ?> <!--<span class="badge bg-info">New</span>--></h5>
                        </div>
                        <div class="col-12">
                            <h5><span class="badge bg-info">New</span></h5>
                        </div>
                        <div class="col-12">
                            <span class="card-text fw-bold" style="color: rgb(120, 221, 120);">Rs. <?php echo $pd["price"]; ?> .00</span>
                        </div>
                        <!--<div class="col-12 d-grid mt-2">
                            <a href="viewProduct.php?id=<?php //echo $pd["idproducts"]; ?>" class="btn btn-success">View Product</a>
                        </div>-->
                    </div>
                </div>
            </div>

        <?php

        }

    }

} else {

    $search = $_GET["search"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%' AND `status_id` = '1'");

    if ($productrs->num_rows >= 1) {

        for ($i = 0; $i < $productrs->num_rows; $i++) {

            $pd = $productrs->fetch_assoc();

        ?>

            <div class="col-6 col-sm-5 col-md-3 col-lg-2 mt-3 mb-3 ms-2 card cardhover" onclick="goToViewProduct(<?php echo $pd['id']; ?>);">
                <img src="<?php echo $pd["image"]; ?>" class="card-img-top img-hgt img-fluid mt-1" />
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="card-title fw-bold"><?php echo $pd["title"]; ?> <!--<span class="badge bg-info">New</span>--></h5>
                        </div>
                        <div class="col-12">
                            <h5><span class="badge bg-info">New</span></h5>
                        </div>
                        <div class="col-12">
                            <span class="card-text fw-bold" style="color: rgb(120, 221, 120);">Rs. <?php echo $pd["price"]; ?> .00</span>
                        </div>
                        <!--<div class="col-12 d-grid mt-2">
                            <a href="viewProduct.php?id=<?php //echo $pd["idproducts"]; ?>" class="btn btn-success">View Product</a>
                        </div>-->
                    </div>
                </div>
            </div>

        <?php

        }

    } else {

        ?>

        <div class="col-12">
            <div class="row">
                <div class="col-12 text-center">
                    <label class="fs-1 fw-bolder">No Exact Matches Found</label>
                </div>
            </div>
        </div>

<?php

    }

}

?>