<?php
session_start();
include '/opt/lampp/htdocs/money-transfert/includes/db.php';
include '/opt/lampp/htdocs/money-transfert/includes/functions.php';

if (isset($_POST['deposit'])) {
    $accNum = $_POST['accNum'];
    $accNum2 = $_POST['accNum2'];
    $amnt = $_POST['amnt'];
    $amnt2 = $_POST['amnt2'];

    if ($accNum !== $accNum2) {
        # code...
        header("Location: ./fund.php?deposit=accnumnotcorrect");
        exit();
    }
    elseif ($amnt !== $amnt2) {
        # code...
        header("Location: ./fund.php?deposit=amntnotcorrect");
        exit();
    }

    $query = "SELECT * FROM customer WHERE id = '$accNum'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    if (!$row) 
    {
        # code...
        header("Location: ./fund.php?deposit=accnotfound");
        exit();
    }
    else 
    {
        mysqli_autocommit($db, FALSE);
        $balance = $row['accBal'];
        $balance = $balance + $amnt;
        $query = "UPDATE customer SET accBal = '$balance' WHERE id = '$accNum'";
        $result = mysqli_query($db, $query);
        if (!$result) {
            # code...
            mysqli_rollback($db);
            header("Location: ./fund.php?deposit=notcommitted");
            exit();
        }
        else {
            # code...
            mysqli_commit($db);
            mysqli_close($db);
            header("Location: ./fund.php?amount=$amnt&accNum=$accNum&deposit=committed");
            exit();
        }
        
    }
}
else {
    header("Location: /money-transfert/html/agentlogin.php?error=loginfirst");
    exit();
}