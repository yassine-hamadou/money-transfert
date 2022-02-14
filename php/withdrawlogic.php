<?php
session_start();
require_once('../includes/db.php');
require_once('../includes/functions.php');

if (isset($_POST['withdraw'])) {
    $w_amnt = $_POST['w_amnt'];
    $cvc_sent = $_POST['cvc'];
    $acc_num = $_SESSION['id'];
    $fn = $_SESSION['fn'];
    $ln = $_SESSION['ln'];
    $email = $_SESSION['eml'];  
    $cvc_session = $_SESSION['cvc'];
    $userBalance = $_SESSION['accBal'];

    if ($w_amnt > $userBalance) {
        header("Location: ./withdraw.php?wrequest=insufficientFunds");
        exit();
    }
    else
    {
        if ($cvc_sent !== $cvc_session) {
            header("Location: ./withdraw.php?wrequest=cvcincorrect");
            exit();
        }
        else
        {
            generateTokenAndSendEmail($db, $email, $fn, $ln, $cvc_sent, $cvc_session, $acc_num, $w_amnt);
        }
    }
    
}
else {
    header("Location: ./withdraw.php");
}