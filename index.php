<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>

    <title>Kur Computers</title>

    <?php require "headLinks.php"; ?>

</head>

<body onload="search(); homeActive();">

    <div class="container-fluid">
        <div class="row">

            <!-- header -->
            <?php require "header.php"; ?>
            <!-- header -->

            <!-- <div class="col-12 mt-3"> -->
                <!--<hr class="mt-3 border border-2 border-dark" />-->
            <!-- </div> -->

            <!-- search,logo -->
            <div class="col-12">
                <div class="row ">
                    <div class="col-12 col-lg-3 mt-2 mt-lg-1">
                        <h1 class="fw-bold text-center" style="color: rgb(120, 221, 120); font-family: 'Honey Script'; font-size: 60px;">Kur Computers</h1>
                    </div>
                    <div class="offset-2 offset-lg-0 col-8 col-lg-6 mt-2 mt-lg-3 search">
                        <div class="input-group">
                            <input type="text" class="col-9 form-control fs-5" style="height: 43px;" placeholder="Search in Kur Computers. . . . . . ." aria-label="Search" aria-describedby="button-addon2" id="search">
                            <button type="button" class="col-3 btn kbtn1 fs-5 fw-bold" style="height: 43px;" id="button-addon2" onclick="search();"><i class="bi bi-search"></i> &nbsp;&nbsp;Search</button>
                        </div>
                    </div>
                    <div class="col-2 col-lg-3 mt-3 mt-lg-4">
                        <a href="#" class="link-secondary link">Advanced</a>
                    </div>
                </div>
            </div>
            <!-- search,logo -->

            <!-- <div class="col-12 mb-0 mb-lg-4"> -->
                <hr class="mb-0 mb-lg-4 mt-3 mt-lg-1 border border-2 border-dark" />
            <!-- </div> -->

            <!-- Brands Select and slider -->
            <div class="col-12 d-none d-lg-block">
                <div class="row">

                    <div class="offset-1 col-lg-2" style="margin-top: 90px;">

                        <label class="form-label fs-4 fw-bold text-secondary">All Brands</label>

                        <?php
                            $producttitle = Database::search("SELECT DISTINCT(`brand`.`id`) FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id`");
                            $num = $producttitle->num_rows;
                            for ($i = 0; $i < $num; $i++) {
                                $row = $producttitle->fetch_assoc();
                        
                                $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $row["id"] . "'");
                                $brand_row = $brand->fetch_assoc();
                        ?>
                        <div class="form-check mt-3">
                            <input type="checkbox" class="form-check-input fs-5" id="flexCheckDefault" onclick="goToAllProduct('<?php echo $brand_row['id']; ?>');">
                            <label class="form-check-label fs-5" for="flexCheckDefault">
                                <?php echo $brand_row["name"]; ?>
                            </label>
                        </div>
                        <?php
                            }
                        ?>

                    </div>

                    <div id="carouselExampleIndicators" class="col-lg-6 carousel slide" data-bs-ride="carousel">
                        <!-- <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div> -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="resources/slider_images/computer_shop3.jpg" class="d-block w-100 s_show"   />
                                <!--<div class="carousel-caption d-none d-md-block kpostercaption">
                                    <h5 class="kpostertitle">Welcome To Access Computers</h5>
                                    <p class="kpostertxt">The World's Best Online Store By One Click.</p>
                                </div>-->
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider_images/computer_shop5.jpg" class="d-block w-100 s_show" />
                            </div>
                            <div class="carousel-item">
                                <img src="resources/slider_images/computer_shop4.jpg" class="d-block w-100 s_show" />
                                <div class="carousel-caption d-none d-md-block kpostercaption1">
                                    <h5 class="kpostertitle kpostertitle1">Open 24 Hours</h5>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>
            </div>

            <div class="col-12 d-block d-lg-none">
                <div class="row">

                    <div class="col-12 mt-3 text-center">
                        <label class="form-label fs-4 fw-bold text-secondary" >All Brands</label>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="row justify-content-center">
                            <?php
                                $producttitle = Database::search("SELECT DISTINCT(`brand`.`id`) FROM `product` INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`id`");
                                $num = $producttitle->num_rows;
                                for ($i = 0; $i < $num; $i++) {
                                    $row = $producttitle->fetch_assoc();
                            
                                    $brand = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $row["id"] . "'");
                                    $brand_row = $brand->fetch_assoc();
                            ?>
                            <div class="col-2 ms-4">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input fs-5" id="flexCheckDefault" onclick="goToAllProduct('<?php echo $brand_row['id']; ?>');">
                                    <label class="form-check-label fs-5" for="flexCheckDefault">
                                        <?php echo $brand_row["name"]; ?>
                                    </label>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    
                </div>                
            </div>
            <!-- Brands Select and slider -->

            <!-- product view -->
            <div class="col-12 mt-3 mt-lg-5 mb-5">
                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-center" id="product">
                            
                        </div>
                    </div>

                </div>
            </div>
            <!-- product view -->

            <!-- footer -->
            <?php require "footer.php"; ?>
            <!-- footer -->

        </div>
    </div>

    <?php require "jsLinks.php"; ?>

</body>

</html>