<?php

    require "connection.php";

    if(isset($_POST["ke"])){

        $kemail = $_POST["ke"];

        $kuserrs = Database::search("SELECT * FROM user WHERE `email`='".$kemail."';");
        $knum = $kuserrs->num_rows;

        if($knum == 1){

            $krow = $kuserrs->fetch_assoc();
            $kus = $krow["status_id"];

            if($kus == "1"){

                Database::iud("UPDATE user SET `status_id`='2' WHERE `email`='".$kemail."';");
                echo "Success1";

            }else{

                Database::iud("UPDATE user SET `status_id`='1' WHERE `email`='".$kemail."';");
                echo "Success2";

            }

        }

    }

?>