<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers - Manage Products</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body onload="searchProducts();">

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminHeader.php"; ?>
                <!-- header -->

                <div class="col-12">
                    <div class="row mt-2 justify-content-center">

                        <div class="col-12 text-center">
                            <span class="fw-bolder fs-1" style="color: rgb(120, 221, 120);">Manage Products</span>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-8 col-md-6 col-lg-4 mt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Search Products By Title . . . . ." id="search" onkeyup="searchProducts();" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row mt-3" id="products">

                    </div>
                </div>

            </div>
        </div>

        <?php require "jsLinks.php"; ?>
    </body>

    </html>

<?php

} else {

?>

    <script>
        window.location = "adminSignIn.php";
    </script>

<?php

}

?>