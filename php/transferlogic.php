<?php
session_start();
// set the default timezone to use.
date_default_timezone_set('UTC');

require_once ('../includes/db.php');
require_once ('../includes/functions.php');

//if send button is clicked
if (isset($_POST["send"])) {
    $receiver_acc = $_POST["accNum"];
    $amount_sending = $_POST["amnt"];
    $cvcgiven = $_POST["cvc"];
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

    //fecthing transaction fees
    $transaction_query = "SELECT trans_fee FROM admins WHERE admin_id = 1";
    $feeResult = mysqli_fetch_assoc(mysqli_query($db, $transaction_query));
    $trans_fee_percentage = $feeResult['trans_fee'];
    $trans_fee = $amount_sending * ($trans_fee_percentage / 100);

    if ($cvcgiven !== $cvc) {
        $_SESSION["error_msg"] = "Sorry the CVC is incorrect!";
        header("Location: ../php/transfer.php?error=incorrect");
        exit();
    }
    else{
        if ($sender_bal < $amount_sending) {
            $_SESSION["error_msg"] = "You don't have enough money in your account to send this amount";
            header("Location: ../php/transfer.php?error=insufficient");
            exit();
        } 
        else {
            //Making sure user is not sending to himself
            if ($receiver_acc === $sender_acc) {
                $_SESSION["error_msg"] = "You cannot send money to yourself";
                header("Location: ../php/transfer.php?error=sendSelf");
                exit();
            } 
            else {

                mysqli_autocommit($db, FALSE);
                //updating sender account
                $sender_bal = $sender_bal - ($amount_sending + $trans_fee);
                //Avoiding sending balance to become negative
                if ($sender_bal >= 0) {
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

                    // inserting into transaction table
                    $date_sent = date("Y-m-d H:i:s");
                    $sql = "INSERT INTO transactions (Sender, Receiver, Amount, Dayd) VALUES ('$sender_acc', '$receiver_acc', '$amount_sending', '$date_sent')";
                    $result = mysqli_query($db, $sql);
                    if (!$result) {
                        mysqli_rollback($db);
                    }
                    mysqli_commit($db);

                    $_SESSION["accBal"] = $sender_bal;
                    $_SESSION["success_msg"] = "You have successfully sent $amount_sending Fcfa to $receiverFn $receiverLn";
                    mysqli_close($db);
                    header("Location: ../php/transfer.php?send=success");
                    exit();
                }
                else {
                    $_SESSION["error_msg"] = "You don't have enough money in your account to send this amount";
                    header("Location: ../php/transfer.php?error=insufficient");
                    exit();
                }
            }
        }
    }
} 
else {
    header("Location: ../php/transfer.php");
    exit();
}

