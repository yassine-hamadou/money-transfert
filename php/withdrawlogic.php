<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('UTC');
session_start();
//Import PHPMailer classes into the global namespace
require '../lib/PHPMailer/src/Exception.php';
require '../lib/PHPMailer/src/PHPMailer.php';
require '../lib/PHPMailer/src/SMTP.php';
require_once('../includes/db.php');

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
            //Geneating token
            try {
                $token = random_int(100000, 100000000);
            } catch (Exception $e) {
                echo "error";
                exit();
            }

            $mailObj = new PHPMailer;  
            $to = $email; 
            $subject = "Your withdrawal token"; 
            $msg = "Hello " .$fn. ", You have recently requested for a ".$w_amnt."Fcfa withdrawal and this is your token to allow the procedure: ".$token." You can kindly ignore this mail if you haven't requested a withdrawal. Thank you!"; 
            $mailObj->AddAddress($to, $fn);
            $mailObj->SetFrom('yassinehamadou@gmail.com', 'BORNASEND');
            $mailObj->Subject = $subject;
            $mailObj->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
            $mailObj->MsgHTML($msg);

            // SMTP Settings
            $mailObj->isSMTP();                                      // Set mailer to use SMTP
            $mailObj->Host = 'smtp.gmail.com;smtp.gmail.com';  // Specify main and backup SMTP servers
            $mailObj->SMTPAuth = true;                               // Enable SMTP authentication
            $mailObj->Username = 'yassinehamadou1@gmail.com';                 // SMTP username
            $mailObj->Password = 'Yassine134666';                           // SMTP password
            $mailObj->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mailObj->Port = 587;

            if(!$mailObj->Send()) 
            {
                header("Location: ./withdraw.php?wrequest=notsent");
            } 
            else 
            {
                //get date and time
                $date = date("Y-m-d H:i:s"); 
                $status = "Pending";
                $sql = "INSERT INTO withdrawals (w_amount, cvc_sent, cvc_session, acc_num, fn, ln, withdrawer_email, token, date_withdrawn, wstatus) VALUES ('$w_amnt', '$cvc_sent', '$cvc_session', '$acc_num', '$fn', '$ln', '$email', '$token', '$date', '$status')";
                mysqli_query($db, $sql);
                header("Location: ./withdraw.php?wrequest=success");
            }
        }
    }
    
}
else {
    header("Location: ./withdraw.php");
}
    