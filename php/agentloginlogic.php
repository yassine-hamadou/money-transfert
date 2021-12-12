<?php
include '/opt/lampp/htdocs/money-transfert/includes/db.php';
include '/opt/lampp/htdocs/money-transfert/includes/functions.php';

if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['pwd'];

    loginAgent($db, $email, $password);
}
else 
{
    header("Location: ../html/agentlogin.php?error=error");
}