<?php

    session_start();

    require "connection.php";

    if(isset($_SESSION["admin"])){
        
?>

<!DOCTYPE html>

<html>

<head>
    <title>Kur Computers - Admin Home</title>

    <?php require "headLinks.php"; ?>
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <!--<div class="col-12 col-lg-2">
                <div class="row">
                    <div class="col-12 align-items-start bg-dark text-center">
                        <div class="row g-1">

                            <div class="col-12 mt-3">
                                <h4 class="text-white"><?php //echo $_SESSION["admin"]["fname"]."".$_SESSION["admin"]["lname"]; ?></h4>
                                <hr class="border border-1 border-white"/>
                            </div>
                            
                            <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                                <nav class="nav flex-column">
                                    <a class="nav-link active fs-5" aria-current="page" href="#">Dashboard</a>
                                    <a class="nav-link fs-5" href="manageUsers.php">Manage Users</a>
                                    <a class="nav-link fs-5" href="#">Manage Products</a>
                                    
                                </nav>
                            </div>

                            <div class="col-12 mt-3">
                                <hr class="border border-1 border-white"/>

                                    <h4 class="text-white">Selling History</h4>

                                <hr class="border border-1 border-white"/>
                            </div>

                            <div class="col-12 mt-3 d-grid">
                                <label class="form-label text-white fs-6 fw-bold">From Date</label>
                                <input type="date" class="form-control" id="kfromdate">
                                <label class="form-label text-white mt-2 fs-6 fw-bold">To Date</label>
                                <input type="date" class="form-control" id="ktodate">
                                <button class="btn btn-primary mt-2" onclick="kdailysellings();">View Sellings</button>
                                <hr class="border border-1 border-white"/>
                                <hr class="border border-1 border-white"/>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>-->

            <div class="col-12">
                <div class="row">

                    <div class="col-12 mt-2 mb-1 text-center" style="color: rgb(120, 221, 120);">
                        <h1 class="form-label fw-bold">Admin Home</h1>
                    </div>

                    <?php require "adminHeader.php"; ?>

                    <div class="col-12 mt-2 mb-3">
                        <hr class="hrbreak"/>
                    </div>

                    <div class="col-12">
                        <div class="row justify-content-center g-1">
                            
                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 text-white text-center rounded" style="background-color: rgb(120, 221, 120); height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Today Earnings</span>
                                        <br/>
                                        <?php
                                        
                                            $today = date("Y-m-d");
                                            $thismonth = date("m");
                                            $thisyear = date("Y");

                                            $a = "0";
                                            $b = "0";
                                            $c = "0";
                                            $e = "0";
                                            $f = "0";
                                            $g = "0";

                                            $invoicers = Database::search("SELECT * FROM invoice;");
                                            $in = $invoicers->num_rows;

                                            for($k1=0; $k1<$in; $k1++){

                                                $ir = $invoicers->fetch_assoc();
                                                
                                                $f = $f + $ir["qty"];
                                                $g = $g + $ir["total"];

                                                $d = $ir["datetime_added"];
                                                $splitdate = explode(" ",$d);
                                                $pdate = $splitdate[0];
                                                
                                                if($pdate == $today){
                                                    $a = $a + $ir["total"];
                                                    $c = $c + $ir["qty"];
                                                }

                                                $splitmonth = explode("-",$pdate);
                                                $pyear = $splitmonth[0];
                                                $pmonth = $splitmonth[1];

                                                if($pyear == $thisyear){
                                                    if($pmonth == $thismonth){
                                                        $b = $b + $ir["total"];
                                                        $e = $e + $ir["qty"];
                                                    }
                                                }

                                            }
                                        
                                        ?>
                                        <span class="fs-4 fw-bold">Rs. <?php echo $a; ?> .00</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-primary text-white text-center rounded" style="height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Monthly Earnings</span>
                                        <br/>
                                        <span class="fs-4 fw-bold">Rs. <?php echo $b; ?> .00</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 text-white text-center rounded" style="background-color: rgb(120, 221, 120); height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Total Earnings</span>
                                        <br/>
                                        <span class="fs-4 fw-bold">Rs. <?php echo $g; ?> .00</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-secondary text-white text-center rounded" style="height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Today Sellings</span>
                                        <br/>
                                        <span class="fs-4 fw-bold"><?php echo $c; ?> Items</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-danger text-white text-center rounded" style="height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Monthly Sellings</span>
                                        <br/>
                                        <span class="fs-4 fw-bold"><?php echo $e; ?> Items</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-4 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-warning text-white text-center rounded" style="height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Total Sellings</span>
                                        <br/>
                                        <span class="fs-4 fw-bold"><?php echo $f; ?> Items</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-lg-6 px-1">
                                <div class="row g-1">

                                    <div class="col-12 bg-success text-white text-center rounded" style="height: 120px;">
                                        <br/>
                                        <span class="fs-4 fw-bold">Total Engagements</span>
                                        <br/>
                                        <?php
                                        
                                            $userrs = Database::search("SELECT * FROM user;");
                                            $un = $userrs->num_rows;
                                        
                                        ?>
                                        <span class="fs-4 fw-bold"><?php echo $un; ?> Members</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3 mb-3">
                        <hr class="hrbreak"/>
                    </div>

                    <div class="col-12 bg-info mb-5">
                        <div class="row">

                            <div class="col-12 col-lg-6 text-center mt-3 mb-3">
                                <label class="form-label fs-4 fw-bold text-white">Total Active Time</label>
                            </div>

                            <?php
                            
                                $startdate = new DateTime("1993-03-07 00:00:00");

                                $tdate = new DateTime();
                                $tz = new DateTimeZone("Asia/Colombo");
                                $tdate->setTimezone($tz);
                                $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

                                $difference = $endDate->diff($startdate);
                            
                            ?>

                            <div class="col-12 col-lg-6 text-center mt-3 mb-3">
                                <label class="form-label fs-4 fw-bold text-success">
                                    <?php
                                    
                                        echo $difference->format('%Y')." "."Years"." ".$difference->format('%m')." "."Months"." ".
                                        $difference->format('%d')." "."Days"." ".$difference->format('%H')." "."Hours"." ".
                                        $difference->format('%i')." "."Minutes"." ".$difference->format('%s')." "."Seconds";
                                    
                                    ?>
                                </label>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

            <?php
            
                require "footer.php";
            
            ?>

        </div>

    </div>

    <?php require "jsLinks.php"; ?>

</body>

</html>

<?php

    }else{
        ?>

        <script>window.location = "adminSignIn.php";</script>

        <?php
    }

?>