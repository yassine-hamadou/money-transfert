<?php
session_start();

include '/opt/lampp/htdocs/money-transfert/includes/db.php';
include '/opt/lampp/htdocs/money-transfert/includes/functions.php';

if (isset($_POST['withdraw'])) {
    $given_token = $_POST['token'];
    $givenAccNum = $_POST['accNum'];

    $query = "SELECT * FROM withdrawals WHERE acc_num = '$givenAccNum' AND wstatus = 'Pending' ORDER BY date_withdrawn DESC LIMIT 1";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    $token = $row['token'];
    $wAmount = $row['w_amount'];
    if ($given_token == $token) 
    {
        $getBalance = "SELECT * FROM customer WHERE id = '$givenAccNum'";
        $getBalResult = mysqli_query($db, $getBalance);
        $getBalRow = mysqli_fetch_assoc($getBalResult);
        $wBalance = $getBalRow['accBal'];

        if ($wBalance < $wAmount) 
        {
            echo "<script>alert('Insufficient balance!')</script>";
            echo "<script>window.open('./wRequest.php', '_self')</script>";
            exit();
        } 
        else 
        {
            //withdrawing amount and updating balance
            $wBalance = $wBalance - $wAmount;
            $sql = "UPDATE customer SET accBal = '$wBalance' WHERE id = '$givenAccNum'";
            $result = mysqli_query($db, $sql);

            // inserting into transaction table
            $date_sent = date("Y-m-d H:i:s");
            $agent_id = "agent".$_SESSION['id']."";
            $sql = "INSERT INTO transactions (Sender, Receiver, Amount, Dayd) VALUES ('$agent_id', '$givenAccNum', '$wAmount', '$date_sent')";
            $result = mysqli_query($db, $sql);

            $query = "UPDATE withdrawals SET wstatus = 'approved' WHERE acc_num = '$givenAccNum' AND wstatus = 'Pending'";
            $result = mysqli_query($db, $query);
            if ($result !== true) 
            {
                echo "<script>alert('Withdrawal failed, please try again!')</script>";
                echo "<script>window.open('./wRequest.php', '_self')</script>";
                exit();
            } 
            
            echo "<script>alert('Withdrawal request approved successfully')</script>";
            echo "<script>window.open('./wRequest.php', '_self')</script>";
        
        } 
    } 
    else 
    {
        echo "<script>alert('Invalid token, please try again!')</script>";
        echo "<script>window.open('./wRequest.php', '_self')</script>";
    }
}
else {
    header("Location: ./wRequest.php");
}
