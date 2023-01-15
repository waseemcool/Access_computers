<?php

session_start();

if(isset($_SESSION["user"])){

    ?>

    <script>window.location = "index.php";</script>

    <?php
    
}else{

    ?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>Kur Computers - Sign In</title>

        <?php require "headLinks.php"; ?>

    </head>

    <body class="body1">

        <div class="container-fluid">
            <div class="row">

                <!-- logo -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 logo"></div>
                        <div class="col-12">
                            <h1 class="title1">Hi, Welcome to Kur Computers</h1>
                        </div>
                    </div>
                </div>
                <!-- logo -->

                <!-- contain -->
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-12 col-sm-10 col-lg-6 mt-2 mt-lg-4">
                            <div class="row px-3">
                                <div class="col-12 div1">
                                    <div class="row p-3 g-3">
                                        <div class="col-12">
                                            <h3 class="text-primary text-center fw-bold">Sign In to your Account</h3>
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Email</label>
                                            <input class="form-control" type="email" placeholder="example@gmail.com" id="email2" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Password</label>
                                            <input class="form-control" type="password" placeholder=" * * * * * * * * * * " id="password2" />
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-success" onclick="signIn();">Sign In</button>
                                        </div>
                                        <div class="col-12 col-lg-6 d-grid">
                                            <button class="btn btn-primary" onclick="goToSignUp();">New to Kur Computers? Sign Up</button>
                                        </div>
                                        <div class="col-12 text-center mt-4 mb-1">
                                            <a class="link-primary fs-5 link1" onclick="forgotPassword();">Forgot Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- contain -->

                <!-- Forgot Password Modal -->
                <div class="modal fade" tabindex="-1" id="ForgotPasswordModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Password Reset</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" type="text" id="np" />
                                            <button class="btn btn-outline-primary" type="button" id="npd" onclick="showPassword1();">Show</button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label class="form-label">Re-type Password</label>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" type="text" id="rnp" />
                                            <button class="btn btn-outline-primary" type="button" id="rnpd" onclick="showPassword2();">Show</button>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Verification Code</label>
                                        <input class="form-control" type="text" id="fvc" />
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" onclick="resetPassword();">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Forgot Password Modal -->

                <!-- footer -->
                <div class="col-12 fixed-bottom">
                    <p class="text-center">&copy; 2021 kurcomputers.lk All Rights Reserved</p>
                </div>
                <!-- footer -->

            </div>
        </div>

        <?php require "jsLinks.php"; ?>

    </body>

    </html>

    <?php

}

?>