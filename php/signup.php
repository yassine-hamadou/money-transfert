<?php
include ("../"); // include database connection   
include './includes/functions.php';  // include functions 


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

    //generating cvc code
    try {
        $cvc = random_int(100000, 100000000);
    } catch (Exception $e) {
        echo "error";
        exit();
    }

    //making sure user does not register twice
    if (usr_exists($db, $email)) {
        header("Location ../html/login.html?error=emailExists");
        exit();
    }
    create_user($db, $fn, $ln, $email, $phone, $dob, $address, $nationality, $state, $hash_pwd, $accBal, $cvc);
}

else {
    header("Location: ../html/signup.html");
    exit();
}
