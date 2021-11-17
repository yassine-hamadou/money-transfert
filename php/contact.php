<?php
session_start();
require ('./includes/db.php');

if(isset($_POST['contactus'])) {
    $msg = [];
    if (empty($_POST['name'])) {
        $msg[] = '<p class=fail>Please Enter Your Name</p>';
    } else {
        $name = $_POST['name'];
    }
    if (empty($_POST['email'])) {
        $msg[] = '<p class=fail> Please Input Your Email</p>';
    } else {
        $email = $_POST['email'];
    }
    if (empty($_POST['message'])) {
        $msg[] = '<p class=fail>Enter your message</p>';

    } else {
        $message = mysqli_real_escape_string($db, $_POST['message']);
    }

    if (empty($msg)) {
        $query = mysqli_query($db, "INSERT INTO contact_us (name, email, message) VALUES ('{$name}', '{$email}', '{$message}')");
        echo "Your message has been sent. Thank you!";
    } else {
        foreach ($msg as $err) {
            # code...
            echo $err . '<br>';
        }
    }
}
