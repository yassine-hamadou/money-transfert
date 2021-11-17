<?php
session_start();
require ('../includes/db.php');

if (isset($_POST['login'])) {
    $log_mail = $_POST['email'];
    $log_pwd = $_POST['pass'];

    $user_details = mysqli_query($db, "SELECT pwd FROM customer WHERE email='{$log_mail}'");
    header('location: ../html/dashboard.html');
}
