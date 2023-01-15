<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

    if (isset($_GET["id"])) {

        $id  = $_GET["id"];

        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");

        if ($productrs->num_rows == 1) {

            $product = $productrs->fetch_assoc();

?>

            <!DOCTYPE html>

            <html>

            <head>

                <title>Kur Computers - Update Product</title>

                <?php require "headLinks.php"; ?>

            </head>

            <body>

                <div class="container-fluid">
                    <div class="row">

                        <!-- header -->
                        <?php require "adminHeader.php"; ?>
                        <!-- header -->

                        <!-- title -->
                        <div class="col-12">
                            <div class="row mt-3">

                                <div class="col-12">
                                    <h1 class="text-center fw-bolder" style="color: rgb(120, 221, 120)">Update Product</h1>
                                </div>

                            </div>
                        </div>
                        <!-- title -->

                        <!-- main part -->
                        <div class="col-12">
                            <div class="row my-1 gy-3">

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Product Brand</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $barnd_rs = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $product["brand_id"] . "'");
                                                $barnd_d = $barnd_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $barnd_d["id"]; ?>"><?php echo $barnd_d["name"]; ?></option>
                                            </select>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Add a Product Title</label>
                                            <input type="text" class="form-control" placeholder="Enter Title here . . . . ." value="<?php echo $product["title"]; ?>" disabled />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">
                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Product Condition</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $product["condition_id"] . "'");
                                                $condition_d = $condition_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $condition_d["id"]; ?>"><?php echo $condition_d["name"]; ?></option>
                                            </select>
                                        </div>
                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Select Product Colour</label>
                                            <select class="form-select" disabled>
                                                <?php
                                                $colour_rs = Database::search("SELECT * FROM `colour` WHERE `id`='".$product["colour_id"]."'");
                                                $colour_d = $colour_rs->fetch_assoc();
                                                ?>
                                                <option value="<?php echo $colour_d["id"]; ?>"><?php echo $colour_d["name"]; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Cost per Item</label>
                                            <input type="text" class="form-control" placeholder="Enter Price here . . . . ." value="<?php echo $product["price"]; ?>" id="price" />
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Add Product Quantity</label>
                                            <input type="number" class="form-control" value="<?php echo $product["qty"]; ?>" id="qty" />
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center gy-2">

                                        <div class="col-12 text-center">
                                            <label class="form-label fw-bold fs-4">Delivery Costs</label>
                                        </div>

                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <div class="row">
                                                <div class=" col-12 col-lg-3">
                                                    <label class="form-label">Delivery cost within Kandy</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group ">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" value="<?php echo $product["delivery_fee_kandy"]; ?>" id="dwk">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-8 col-md-6 col-lg-4">
                                            <div class="row">
                                                <div class=" col-12 col-lg-3">
                                                    <label class="form-label">Delivery cost out of Kandy</label>
                                                </div>
                                                <div class="col-12 col-lg-8">
                                                    <div class="input-group ">
                                                        <span class="input-group-text">Rs.</span>
                                                        <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" value="<?php echo $product["delivery_fee_other"]; ?>" id="dok">
                                                        <span class="input-group-text">.00</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center">

                                        <div class="col-12 col-sm-10 col-md-8 col-lg-4">
                                            <label class="form-label fw-bold fs-4">Product Description</label>
                                            <textarea class="form-control border border-3 border-success" style="background-color: honeydew;" rows="10" id="des"><?php echo $product["description"]; ?></textarea>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="row justify-content-center g-2">

                                        <div class="col-8 col-sm-8 col-md-6 col-lg-3 border border-3 border-success rounded">
                                            <img src="<?php echo $product["image"]; ?>" class="col-12" height="300px" />
                                        </div>
                                            
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- main part -->

                        <div class="col-12">
                            <hr class="border border-2 border-dark" />
                        </div>

                        <!-- update product -->
                        <div class="col-12">
                            <div class="row mt-1 mb-5">
                                <div class="offset-sm-2 offset-md-3 offset-lg-4 col-12 col-sm-8 col-md-6 col-lg-4 d-grid">
                                    <button class="btn btn-success kbtn1 kbtn2 fw-bolder fs-4" onclick="updateProduct(<?php echo $product['id']; ?>);">UPDATE PRODUCT</button>
                                </div>
                            </div>
                        </div>
                        <!-- update product -->

                    </div>
                </div>

                <?php require "jsLinks.php"; ?>

            </body>

            </html>

        <?php

        } else {

        ?>
            <script>

                window.location = "adminHome.php";

            </script>

        <?php

        }

    } else {

        ?>

        <script>

            window.location = "adminHome.php";

        </script>

    <?php

    }

} else {

    ?>

    <script>

        window.location = "adminSignIn.php";

    </script>

<?php

}

?>