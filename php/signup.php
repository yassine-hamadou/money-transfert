<?php
include '../includes/db.php'; // include db connection
include '../includes/functions.php';  // include functions 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


session_start();

if (isset($_POST["signup"])) {
    $fn = $_POST["fname"];
    $ln = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $nationality = $_POST["nationality"];
    $state = $_POST["state"];
    $pwd = $_POST["pwd"];
    $accBal = 0;

    //making sure user does not register twice
    if (usr_exists($db, $email)) {
        $_SESSION["error_msg"] = "User Exits!";
        header("Location: ../html/signupa.php?error=user_exists");
        exit();
    }
    
    //generating cvc code
    try {
        $cvc = random_int(100000, 100000000);
    } catch (Exception $e) {
        echo "error";
        exit();
    }
    
    $mailObj = new PHPMailer;  
    $to = $email; 
    $subject = "Your CVC Code"; 
    $msg = "Hello $fn, Your account was created successfully. This is your ".$cvc." You will need to enter your CVC code during transactions. Please make sure you do not loose it and keep it secret. Thank you!"; 
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
        $_SESSION["error_msg"] = "Account not created, CVC!";
        header("Location: ../html/signupa.php?error=notcreated");
        exit();
    } 
    else 
    {
        create_user($db, $fn, $ln, $email, $phone, $dob, $address, $nationality, $state, $pwd, $accBal, $cvc);
    }
}

else {
    header("Location: ../html/signupa.php");
    exit();
}
