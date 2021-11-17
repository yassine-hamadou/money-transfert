<?php
function create_user($db, $fn, $ln, $email, $phone, $dob, $address, $nationality, $state, $pwd, $accBal, $cvc) {
    $query = "INSERT INTO customer (fn, ln, eml, ph, dob, adr, nat, stt, pwd, accBal, cvc) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../html/signup.html?error=stmtfailed1");
        exit();
    }

    $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);


    mysqli_stmt_bind_param($stmt, 'ssssssssssi', $fn, $ln, $email, $phone, $dob, $address, $nationality, $state, $hash_pwd, $accBal, $cvc);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("Location: ../html/login.html?error=none");
    exit();
}

function usr_exists($db, $email) {
    $query = "SELECT * FROM customer WHERE eml = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../html/signup.html?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result_data = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result_data)) {
        return $row;
    }
    else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function loginUser($db, $email, $pwd) {
    $usr_exists = usr_exists($db, $email);

    if ($usr_exists === false) {
        header("Location: ../html/login.html?error=invalidUsername");
        exit();
    }
    else {
        $pwd_check = password_verify($pwd, $usr_exists['pwd']);
        if ($pwd_check == false) {
            header("Location: ../html/login.html?error=invalidPassword");
            exit();
        }
        else {
            session_start();
            $_SESSION['id'] = $usr_exists['id'];
            $_SESSION['fn'] = $usr_exists['fn'];
            $_SESSION['ln'] = $usr_exists['ln'];
            $_SESSION['eml'] = $usr_exists['eml'];
            $_SESSION['ph'] = $usr_exists['ph'];
            $_SESSION['dob'] = $usr_exists['dob'];
            $_SESSION['adr'] = $usr_exists['adr'];
            $_SESSION['nat'] = $usr_exists['nat'];
            $_SESSION['stt'] = $usr_exists['stt'];
            $_SESSION['pwd'] = $usr_exists['pwd'];
            $_SESSION['accBal'] = $usr_exists['accBal'];
            $_SESSION['cvc'] = $usr_exists['cvc'];
            header("Location: ../html/dashboard.html?login=success");
            exit();
        }    
    }   
}
    


function checkLogin($id)
{
    if(!isset($id))
    {
        $msg = "Your session has expired";
        header("location:adminlogin.php?msg=$msg");
    }
}

function delete($table, $field)
{
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = $_GET['id'];
        $q = "DELETE FROM $table WHERE $field = {$id}";
        $r = mysql_query($q) or die(mysql_error());
        echo "Operation completed";
    }
}