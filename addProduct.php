<?php

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Kur Computers - Add Product</title>

    <?php require "headLinks.php"; ?>

</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php require "adminHeader.php"; ?>

            <!-- title -->
            <div class="col-12">
                <div class="row mt-3">

                    <div class="col-12">
                        <h1 class="text-center fw-bolder" style="color: rgb(120, 221, 120)">Add Product</h1>
                    </div>

                </div>
            </div>
            <!-- title -->

            <!-- content -->
            <div class="col-12">
                <div class="row my-1 gy-2">

                    <div class="col-12">
                        <div class="row justify-content-center gy-2">
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <label class="form-label fw-bold fs-4">Select Product Brand</label>
                                <select class="form-select" id="brand">
                                    <option value="0">Select Brand</option>
                                    <?php
                                    $brand_rs = Database::search("SELECT * FROM `brand`");
                                    $brand_n = $brand_rs->num_rows;
                                    for ($i = 0; $i < $brand_n; $i++) {
                                        $brand_d = $brand_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $brand_d["id"]; ?>"><?php echo $brand_d["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <label class="form-label fw-bold fs-4">Add a Title</label>
                                <input type="text" class="form-control " placeholder="Enter the Product Title here . . . . ." id="title" />
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center gy-2">
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <label class="form-label fw-bold fs-4">Select Product Condition</label>
                                <select class="form-select" id="condition">
                                    <option value="0">Select Condition</option>
                                    <?php
                                    $condition_rs = Database::search("SELECT * FROM `condition`");
                                    $condition_n = $condition_rs->num_rows;
                                    for ($i = 0; $i < $condition_n; $i++) {
                                        $condition_d = $condition_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $condition_d["id"]; ?>"><?php echo $condition_d["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <label class="form-label fw-bold fs-4">Select Product Colour</label>
                                <select class="form-select" id="colour">
                                    <option value="0">Select Colour</option>
                                    <?php
                                    $colour_rs = Database::search("SELECT * FROM `colour`");
                                    $colour_n = $colour_rs->num_rows;
                                    for ($i = 0; $i < $colour_n; $i++) {
                                        $colour_d = $colour_rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo $colour_d["id"]; ?>"><?php echo $colour_d["name"]; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center gy-2">

                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <label class="form-label fw-bold fs-4">Cost Per Item</label>
                                <div class="input-group ">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="price">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>

                            <div class="col-sm-8 col-md-6 col-lg-4">
                                <label class="form-label fw-bold fs-4">Add Product Quantity</label>
                                <input type="number" value="1" class="form-control " id="qty" />
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
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dwk">
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
                                            <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="dok">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    

                    <div class="col-12">
                        <div class="row justify-content-center">

                            <div class="col-12 col-lg-4">
                                <label class="form-label fw-bold fs-4">Product Description</label>
                                <textarea class="form-control border border-3 border-success" style="background-color: honeydew;" rows="10" id="description"></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center g-2">

                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-8 col-sm-8 col-md-6 col-lg-3 border border-3 border-success rounded mt-3">
                                    
                                        <img src="resources/addproductimg.svg" class="col-12" height="300px" id="prev" />
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <div class="col-8 col-sm-8 col-md-6 col-lg-3 mt-2 d-grid">
                                        
                                        <input type="file" class="d-none" accept="img/*" id="img" />
                                        <label for="img" class="btn btn-primary fs-5 fw-bold" onclick="changeImg();">Add Product Image</label>
                                        
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- content -->

            <div class="col-12">
                <hr class="border border-2 border-dark" />
            </div>

            <!-- add product button -->
            <div class="col-12">
                <div class="row mt-1 mb-5">
                    <div class="offset-sm-2 offset-md-3 offset-lg-4 col-12 col-sm-8 col-md-6 col-lg-4 d-grid">
                        <button class="btn btn-success kbtn1 kbtn2 fw-bolder fs-4" onclick="addProduct();">ADD PRODUCT</button>
                    </div>
                </div>
            </div>
            <!-- add product button -->

        </div>
    </div>

    <?php require "jsLinks.php"; ?>

</body>

</html>