<?php
session_start();
require_once ('../includes/db.php');
require_once ('../includes/functions.php');

//if send button is clicked
if (isset($_POST["send"])) {
    $receiver_acc = $_POST["accNum"];
    $amount_sending = $_POST["amnt"];

    $senderFn = $_SESSION["fn"];
    $senderLn = $_SESSION["ln"];
    $sender_acc = $_SESSION["id"];
    $sender_bal = $_SESSION["accBal"];
    $cvc = $_SESSION["cvc"];

    //send money from sender to receiver
    $sql = "SELECT * FROM customer WHERE id = '$receiver_acc'";
    $result = mysqli_query($db, $sql);

    //fetching receiver account details
    $row = mysqli_fetch_assoc($result);
    $receiverFn = $row["fn"];
    $receiverLn = $row["ln"];
    $receiver_id = $row["id"];
    $receiver_cvc = $row["cvc"];
    $receiver_bal = $row["accBal"];


    if ($sender_bal < $amount_sending) {
        $_SESSION["error_msg"] = "You don't have enough money in your account to send this amount";
        header("Location: ../php/transfer.php?error=insufficient");
        exit();
    } 
    else {
        //checking if account exists
        if ($receiver_acc === $sender_acc) {
            $_SESSION["error_msg"] = "You cannot send money to yourself";
            header("Location: ../php/transfer.php?error=sendSelf");
            exit();
        } 
        else {
            mysqli_autocommit($db, FALSE);
            //updating sender account
            $sender_bal = $sender_bal - $amount_sending;
            $sql = "UPDATE customer SET accBal = '$sender_bal' WHERE id = '$sender_acc'";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                mysqli_rollback($db);
            }

            //updating receiver account
            $receiver_bal = $receiver_bal + $amount_sending;
            $sql = "UPDATE customer SET accBal = '$receiver_bal' WHERE id = '$receiver_acc'";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                mysqli_rollback($db);
            }
            mysqli_commit($db);

            // inserting into transaction table
            $sql = "INSERT INTO transaction (sender_id, receiver_id, amount) VALUES ('$sender_acc', '$receiver_id', '$amount_sending')";
            $result = mysqli_query($db, $sql);
            if (!$result) {
                mysqli_rollback($db);
            }


            $_SESSION["accBal"] = $sender_bal;
            $_SESSION["success_msg"] = "You have successfully sent $amount_sending to $receiverFn $receiverLn";
            mysqli_close($db);
            header("Location: ../php/transfer.php?send=success");
            exit();
        }
    }
} 
else {
    header("Location: ../php/transfer.php");
    exit();
}

