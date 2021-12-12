<?php
include_once '/opt/lampp/htdocs/money-transfert/includes/db.php';
include_once '/opt/lampp/htdocs/money-transfert/includes/functions.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
        
    loginAdmin($db, $email, $pwd);
}
else {
    header('Location: /money-transfert/html/adminlogin.php');
    exit();
}