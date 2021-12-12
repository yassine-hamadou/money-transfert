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
    header("Location: ../html/loginpage.php?error=none");
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
    $row = mysqli_fetch_assoc($result_data);
    if ($row) {
        return $row;
    }
    else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function adm_exists($db, $email) {
    $query = "SELECT * FROM admins WHERE email = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../html/signup.html?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result_data = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result_data);
    if ($row) {
        return $row;
    }
    else {
        return false;
    }
    mysqli_stmt_close($stmt);
}

function agent_exists($db, $email) {
    $query = "SELECT * FROM agent WHERE email = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../html/signup.html?error=stmtfailed2");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result_data = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result_data);
    if ($row) {
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
        header("Location: ../html/loginpage.php?error=invalidUsermail");
        exit();
    }
    else {
        $pwd_check = password_verify($pwd, $usr_exists["pwd"]);
        if ($pwd_check === false) {
            header("Location: ../html/loginpage.php?error=invalidPassword");
            exit();
        }
        else if ($pwd_check === true) {
            session_start();
            $_SESSION['Logged'] = true;
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
            header("Location: ../html/dashboard.php?login=success");
            exit();
        }
    }   
}

function loginAdmin($db, $email, $pwd) {
    $adm_exists = adm_exists($db, $email);

    if ($adm_exists === false) {
        header("Location: /money-transfert/html/adminlogin.php?error=invalidUsermail");
        exit();
    }
    else {
        if ($pwd !== $adm_exists["pwd"]) {
            header("Location: /money-transfert/html/adminlogin.php?error=invalidPassword");
            exit();
        }
        else if ($pwd === $adm_exists["pwd"]) {
            session_start();
            $_SESSION['adminLogged'] = true;
            $_SESSION['id'] = $adm_exists['admin_id'];
            $_SESSION['fn'] = $adm_exists['f_name'];
            $_SESSION['ln'] = $adm_exists['l_name'];
            $_SESSION['eml'] = $adm_exists['email'];
            header("Location: /money-transfert/php/admin/dash/index.php?adminlogin=success");
            exit();     
        }
    }   
}

function loginAgent($db, $email, $pwd) {
    $agent_exists = agent_exists($db, $email);

    if ($agent_exists === false) {
        header("Location: /money-transfert/html/agentlogin.php?error=invalidUsermail");
        exit();
    }
    else {
        if ($pwd !== $agent_exists["pwd"]) {
            header("Location: /money-transfert/html/agentlogin.php?error=invalidPassword");
            exit();
        }
        else if ($pwd === $agent_exists["pwd"]) {
            session_start();
            $_SESSION['agentLogged'] = true;
            $_SESSION['id'] = $agent_exists['Cashier_id'];
            $_SESSION['fn'] = $agent_exists['f_name'];
            $_SESSION['ln'] = $agent_exists['l_name'];
            $_SESSION['eml'] = $agent_exists['email'];
            $_SESSION['psp'] = $agent_exists['passNum'];
            header("Location: /money-transfert/php/agent/index.php?agentlogin=success");
            exit();     
        }
    }   
}