<!DOCTYPE html>

<html>

<head>
    <title>Kur Computers - Admin Sign In</title>

    <?php require "headLinks.php"; ?>
</head>

<body>

    <div class="container-fluid justify-content-center">

        <div class="row align-content-center">

            <div class="col-12">
                <div class="row">
                    <div class="col-12 mt-5 logo"></div>
                    <div class="col-12">
                        <h1 class="title1">Hi, Welcome to Kur Computers Admin</h1>
                    </div>
                </div>
            </div>

            <div class="col-12 p-5">
                <div class="row justify-content-center">
                    <!--<div class="col-lg-6 d-none d-lg-block background" style="height: 250px;"></div>-->
                    <div class="col-12 col-lg-6 d-block">
                        <div class="row g-3">
                            <div class="col-12">
                                <h3 class="text-center fw-bold">Sign In To Your Account.</h3>
                            </div>
                            <div class="col-12">
                                <label class="form-label fs-5 fw-bold">Email</label>
                                <input type="text" class="form-control" id="e"/>
                            </div>
                            <div class="col-12 d-grid">
                                <button class="btn btn-success" onclick="adminVerification();">Send Verification Code to Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="verificationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Admin Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label class="form-label">Enter the Verification Code you got by an Email.</label>
                            <input type="text" class="form-control" id="v"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success" onclick="adminVerify();">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--Modal-->

            <div class="col-12 d-none d-lg-block fixed-bottom">
                <p class="text-center">&copy;2021 kurcomputers.lk All Rights Reserved.</p>
            </div>

        </div>

    </div>
    
    <?php require "jsLinks.php"; ?>

</body>

</html>