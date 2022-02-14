<?php 
  session_start();
  if ($_SESSION['Logged'] !== true) {
    header("Location: ../html/loginpage.php");
  }
  require_once '../includes/db.php';
?>

<!doctype html>
<html lang="en">

<?php include '../includes/dashead.php';?>

<body>

    <?php include '../includes/dasheader.php';?>
    <?php include '../includes/dashnav.php';?>
    <main class="col-md-9 ms-sm-auto col-lg-10">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">TransactionID</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Receiver</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $sender = $_SESSION["id"];
                    $sql = "SELECT * FROM transactions WHERE Sender = '$sender' OR Receiver = '$sender'";
                    $sql2 = "SELECT CONCAT(`prefix`, `#`) AS 'transactionId' FROM transactions WHERE Sender = '$sender' OR Receiver = '$sender';";
                    $result = mysqli_query($db, $sql);
                    $result2 = mysqli_query($db, $sql2);

                    while(($row = mysqli_fetch_assoc($result)) && ($transactionId = mysqli_fetch_assoc($result2))) {
                      //replacing account number to display my account 
                      if ($row['Sender'] === $sender) {
                        $row['Sender'] = 'My account';
                      }
                      if ($row['Receiver'] === $sender) {
                        $row['Receiver'] = 'My account';
                      }
                      echo "<tr>";
                      //Making the transaction IDs more elaborate with alphanumeric characters
                      echo "<td>".$transactionId['transactionId']."</td>";
                      echo "<td>".$row['Sender']."</td>";
                      echo "<td>".$row['Receiver']."</td>";
                      echo "<td>".$row['Amount']."</td>";
                      echo "<td>".$row['Dayd']."</td>";
                      echo "</tr>";
                    }
                  ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include '../includes/script.php';?>
</body>

</html>