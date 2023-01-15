<?php

    session_start();

    require "connection.php";

    require 'Exception.php';
    require 'PHPMailer.php';
    require 'SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;

    if(isset($_POST["e"])){

        $e = $_POST["e"];

        $code = uniqid();

        Database::iud("UPDATE `admin` SET `verification_code`='".$code."' WHERE `email`='".$e."';");

        //email code
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abdullahzufar414@gmail.com';
        $mail->Password = 'Abdullah2004';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('abdullahzufar414@gmail.com', 'Kur Computers');
        $mail->addReplyTo('abdullahzufar414@gmail.com', 'Kur Computers');
        $mail->addAddress($e);
        $mail->isHTML(true);
        $mail->Subject = 'Kur Computers Admin Login Verification Code';
        $bodyContent = '<h1 style="color: green;">Your Verification Code : ' . $code . '</h1>';
        $mail->Body    = $bodyContent;

        if (!$mail->send()) {
            echo "Verification Code sending fail.";
        } else {
            echo 'Success';
        }
        //email code

    }else{
        echo "Please enter the E-mail address.";
    }

?>