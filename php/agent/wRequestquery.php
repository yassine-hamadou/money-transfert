<?php
include '/opt/lampp/htdocs/money-transfert/includes/db.php';
include '/opt/lampp/htdocs/money-transfert/includes/functions.php';


//get all pending withdrawal requests
// $sql = "SELECT d1.acc_num, d1.w_amount, d1.fn, d1.ln, d1.wstatus, d1.date_withdrawn FROM withdrawals d1 WHERE d1.date_withdrawn = (SELECT max(d2.date_withdrawn) FROM withdrawals d2 WHERE d1.acc_num = d2.acc_num AND wstatus = 'Pending') ORDER BY date_withdrawn DESC;";
$sql ="SELECT d1.acc_num, d1.w_amount, d1.fn, d1.ln, d1.wstatus, d1.date_withdrawn FROM withdrawals d1 WHERE wstatus = 'Pending' ORDER BY date_withdrawn DESC;";
$result = mysqli_query($db, $sql);
$resultCheck = mysqli_num_rows($result);
if ($resultCheck > 0) 
{
    while ($row = mysqli_fetch_assoc($result)) 
    {
        echo "<tr>
            <td>".$row['w_amount']." Fcfa</td>
            <td>".$row['acc_num']."</td>
            <td>".$row['fn']."</td>
            <td>".$row['ln']."</td>
            <td>".$row['wstatus']." 
                <button type='button' class='btn btn-success ml-5' data-toggle='modal' data-target='#modal".$row['acc_num']."'>Confirm withdrawal</button>
            </td>
            
        </tr>";
    }       
}
else
{
    echo "No pending withdrawal requests";
}
?>