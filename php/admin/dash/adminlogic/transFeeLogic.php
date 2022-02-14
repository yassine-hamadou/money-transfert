<?php
include '/opt/lampp/htdocs/money-transfert/includes/db.php';
include '/opt/lampp/htdocs/money-transfert/includes/functions.php';

if (isset($_POST['fee'])) {
    $setFee = $_POST['setFee'];
    $conFee = $_POST['conFee'];

    if ($setFee === $conFee) {
        //change transaction fee
        $query = "UPDATE admins SET trans_fee = '$setFee' WHERE admin_id = 1;";
        $result = mysqli_query($db, $query);
        $affected_row = mysqli_affected_rows($db);
        if ($affected_row > 0) {
            header("Location: ../transFee.php?trans=changed");
        } 
        else {
            header("Location: ../transFee.php?trans=notChanged");
        }
    }
    else {
        header("Location: ../transFee.php?trans=notMatched");
    }
}
else {
    header("Location: ../transFee.php?trans=error");
}