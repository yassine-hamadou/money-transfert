<?php
include '/opt/lampp/htdocs/money-transfert/includes/db.php';
include '/opt/lampp/htdocs/money-transfert/includes/functions.php';

if (isset($_POST['submit'])) {
    $agentFname = $_POST['fname'];
    $agentLname = $_POST['lname'];
    $agentEmail = $_POST['email'];
    $pwd = $_POST['pwd'];
    $psp = $_POST['psp'];

    $query = "INSERT INTO agent (f_name, l_name, email, pwd, passNum) VALUES ('$agentFname', '$agentLname', '$agentEmail', '$pwd', '$psp')";
    $result = mysqli_query($db, $query);
    if ($result) {
        header("Location: ../addagent.php?agent=added");
    } 
    else {
        header("Location: ../addagent.php?agent=notadded");
    }
}
else {
    header("Location: ../addagent.php?agent=notadsdded");
}