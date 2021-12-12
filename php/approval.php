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
                        <th scope="col">#</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Date withdrawn</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    $withdrawer = $_SESSION["id"];
                    $sql = "SELECT * FROM withdrawals WHERE acc_num = '$withdrawer' ORDER BY date_withdrawn DESC";
                    $result = mysqli_query($db, $sql);

                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<tr>";
                      echo "<td>".$row['withdrawal_id']."</td>";
                      echo "<td>".$row['w_amount']." Fcfa</td>";
                      echo "<td>".$row['wstatus']."</td>";
                      echo "<td>".$row['date_withdrawn']."</td>";       
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