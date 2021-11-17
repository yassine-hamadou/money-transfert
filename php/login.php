<?php
session_start();
require_once ('../includes/db.php');
require_once ('../includes/functions.php');

if (isset($_POST['login'])) {
    $log_mail = $_POST['email'];
    $log_pwd = $_POST['pwd'];
    
    loginUser($db, $log_mail, $log_pwd);
}
else {
    header("Location: ../html/login.html?error=invalid");
    exit();
}
