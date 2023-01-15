<?php

require "connection.php";

if (empty($_GET["search"])) {

?>

    <div class="col-12 d-none d-lg-block">
        <div class="row mb-2">

            <div class="col-2 p-1 bg-light text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Image</label>
            </div>
            <div class="col-3 bg-primary p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-white">Title</label>
            </div>
            <div class="col-2 bg-light p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Price</label>
            </div>
            <div class="col-2 p-1 bg-primary text-center">
                <label class="form-label fw-bolder fs-3 text-white">Registered Date</label>
            </div>
            <div class="col-3 p-1 bg-light text-center"></div>

        </div>
    </div>

    <?php

    $productrs = Database::search("SELECT * FROM `product`");

    for ($rows = 0; $rows < $productrs->num_rows; $rows++) {

        $product = $productrs->fetch_assoc();

    ?>

        <div class="col-12">
            <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                <div class="col-12 col-lg-2 p-2 bg-light text-center">
                    <img src="<?php echo $product["image"]; ?>" height="100px" width="100px" />
                </div>

                <div class="col-12 col-lg-3 bg-primary p-1 text-center">
                    <label class="form-label fw-bolder fs-5 text-white mt-4"><?php echo $product["title"]; ?></label>
                </div>
                <div class="col-12 col-lg-2 bg-light p-1 text-center">
                    <label class="form-label fw-bolder fs-5 text-dark mt-4">Rs. <?php echo $product["price"]; ?> .00</label>
                </div>
                <div class="col-12 col-lg-2 p-1 bg-primary text-center">
                    <?php
                    $date = $product["datetime_added"];
                    $splitdate = explode(" ", $date);
                    ?>
                    <label class="form-label fw-bolder fs-5 text-white mt-4"><?php echo $splitdate[0]; ?></label>
                </div>
                <div class="col-12 col-lg-3 p-1 bg-light text-center">
                    <a href="updateProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-success fw-bold mt-4">Update</a>
                    <button class="btn btn-danger fw-bold mt-4 ms-1" onclick="deleteProduct(<?php echo $product['id']; ?>);">Delete</button>
                    <?php
                    if ($product["status_id"] == "1") {
                    ?>
                        <button id="productStatus<?php echo $product['id']; ?>" class="btn btn-warning text-white fw-bold mt-4 ms-1" onclick="productStatus('<?php echo $product['id']; ?>');">Block</button>
                    <?php
                    } else {
                    ?>
                        <button id="productStatus<?php echo $product['id']; ?>" class="btn btn-info text-white fw-bold mt-4 ms-1" onclick="productStatus('<?php echo $product['id']; ?>');">Unblock</button>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>

    <?php

    }

    ?>


<?php

} else {

    $search = $_GET["search"];

?>

    <div class="col-12 d-none d-lg-block">
        <div class="row mb-2">

            <div class="col-2 p-1 bg-light text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Image</label>
            </div>
            <div class="col-3 bg-primary p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-white">Title</label>
            </div>
            <div class="col-2 bg-light p-1 text-center">
                <label class="form-label fw-bolder fs-3 text-dark">Price</label>
            </div>
            <div class="col-2 p-1 bg-primary text-center">
                <label class="form-label fw-bolder fs-3 text-white">Registered Date</label>
            </div>
            <div class="col-3 p-1 bg-light text-center"></div>

        </div>
    </div>

    <?php

    $productrs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%" . $search . "%'");

    if ($productrs->num_rows >= 1) {

        for ($rows = 0; $rows < $productrs->num_rows; $rows++) {

            $product = $productrs->fetch_assoc();

    ?>

            <div class="col-12">
                <div class="row border border-2 border-dark border-top-0 border-start-0 border-end-0">

                    <div class="col-12 col-lg-2 p-2 bg-light text-center">
                        <img src="<?php echo $product["image"]; ?>" height="100px" width="100px" />
                    </div>

                    <div class="col-12 col-lg-3 bg-primary p-1 text-center">
                        <label class="form-label fw-bolder fs-5 text-white mt-4"><?php echo $product["title"]; ?></label>
                    </div>
                    <div class="col-12 col-lg-2 bg-light p-1 text-center">
                        <label class="form-label fw-bolder fs-5 text-dark mt-4">Rs. <?php echo $product["price"]; ?> .00</label>
                    </div>
                    <div class="col-12 col-lg-2 p-1 bg-primary text-center">
                        <?php
                        $date = $product["datetime_added"];
                        $splitdate = explode(" ", $date);
                        ?>
                        <label class="form-label fw-bolder fs-5 text-white mt-4"><?php echo $splitdate[0]; ?></label>
                    </div>
                    <div class="col-12 col-lg-3 p-1 bg-light text-center">
                        <a href="updateProduct.php?id=<?php echo $product["id"]; ?>" class="btn btn-success fw-bold mt-4">Update</a>
                        <button class="btn btn-danger fw-bold mt-4 ms-1" onclick="deleteProduct(<?php echo $product['id']; ?>);">Delete</button>
                        <?php
                        if ($product["status_id"] == "1") {
                        ?>
                            <button id="productStatus<?php echo $product['id']; ?>" class="btn btn-warning text-white fw-bold mt-4 ms-1" onclick="productStatus('<?php echo $product['id']; ?>');">Block</button>
                        <?php
                        } else {
                        ?>
                            <button id="productStatus<?php echo $product['id']; ?>" class="btn btn-info text-white fw-bold mt-4 ms-1" onclick="productStatus('<?php echo $product['id']; ?>');">Unblock</button>
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