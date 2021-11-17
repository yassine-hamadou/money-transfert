<?php

function create_user($db, $fn, $ln, $email, $phone, $dob, $address, $nationality, $state, $pwd) {

}

function user_exits($db, $email) {
    $query = "SELECT * FROM customer WHERE email = ?;";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query)) {
        header("Location: ../html/login.html");
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