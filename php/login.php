<?php
require_once ('../includes/db.php');
require_once ('../includes/functions.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
        
    loginUser($db, $email, $pwd);
}
else {
    header("Location: ../html/login.html?error=invalid");
    exit();
}
