<?php

if (isset($_SESSION["user"])) {

?>
    <header>
        <div class="row">
            <div class="col-12 px-3 py-2 text-white" style="background-color: rgb(120, 221, 120);">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-start">

                        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">

                            <li>
                                <a href="index.php" class="nav-link text-white h iat1" id="iat1">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="userProfile.php" class="nav-link text-white h iat1">
                                    My Profile
                                </a>
                            </li>

                            <li>
                                <a href="purchasedHistory.php" class="nav-link text-white h iat1">
                                    Purchased History
                                </a>
                            </li>

                            <li>
                                <a href="watchList.php" class="nav-link text-white h iat1">
                                    Watch List
                                </a>
                            </li>

                            <li>
                                <a href="cart.php" class="nav-link text-white h iat1">
                                    <i class="bi bi-cart"></i>
                                </a>
                            </li>

                            <li>
                                <a onclick="signOut();" class="nav-link text-white h iat1" style="cursor: pointer;">
                                    Sign Out
                                </a>
                            </li>

                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </header>
    
<?php

} else {

?>

    <header>
        <div class="row">
            <div class="col-12 px-3 py-2 text-white" style="background-color: rgb(120, 221, 120);">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                        <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">

                            <li>
                                <a href="index.php" class="nav-link text-white h iat1" id="iat1">
                                    Home
                                </a>
                            </li>

                            <li>
                                <a href="signUp.php" class="nav-link text-white h iat1">
                                    Sign Up
                                </a>
                            </li>

                            <li>
                                <a href="signIn.php" class="nav-link text-white h iat1">
                                    Sign In
                                </a>
                            </li>
                            
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </header>

<?php

}

?>