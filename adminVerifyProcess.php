<?php

    session_start();

    require "connection.php";

    if(isset($_POST["v"])){

        $e = $_POST["e"];
        $v = $_POST["v"];

        $adminrs = Database::search("SELECT * FROM `admin` WHERE `verification_code`='".$v."' AND `email`='".$e."';");
        $an = $adminrs->num_rows;

        if($an == 1){
            $ar = $adminrs->fetch_assoc();
            $_SESSION["admin"] = $ar;
            echo "Success";
        }else{
            echo "You must enter a Valid Verification Code to Sign In.";
        }

    }else{
        echo "Please enter the Verification Code first.";
    }

?>