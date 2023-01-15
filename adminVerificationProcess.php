<?php

    require "connection.php";

    if(isset($_POST["e"])){

        $email = $_POST["e"];

        if(empty($email)){
            echo "Please enter the E-mail address.";
        }else{

            $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='".$email."';");
            $admin_nr = $adminrs->num_rows;

            if($admin_nr == 1){
                echo "Success";
            }else{
                echo "Invalid E-mail address.";
            }

        }

    }else{
        echo "Invalid request.";
    }

?>