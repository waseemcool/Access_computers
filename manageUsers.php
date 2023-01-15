<?php

session_start();

require "connection.php";

if (isset($_SESSION["admin"])) {

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers - Manage Users</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body onload="searchUsers();">

        <div class="container-fluid">
            <div class="row">

                <!-- header -->
                <?php require "adminHeader.php"; ?>
                <!-- header -->

                <div class="col-12">
                    <div class="row justify-content-center">

                        <div class="col-12 mt-3 text-center">
                            <h1 class="fw-bolder" style="color: rgb(120, 221, 120);">Manage Customers</h1>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-10 col-sm-8 col-md-6 col-lg-4 mt-2">
                                    <div class="row">
                                        <div class="col-12">
                                            <input type="text" class="form-control" placeholder="Search Users By E-mail . . . . . . ." id="search" onkeyup="searchUsers();" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12">
                    <div class="row mt-3" id="users">

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