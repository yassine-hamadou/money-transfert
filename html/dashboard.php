<?php 
  session_start();
  if ($_SESSION['Logged'] !== true) {
    header("Location: ../html/loginpage.php");
  }
?>

<!doctype html>
<html lang="en">

<?php include '../includes/dashead.php';?>

<body>
    <?php include '../includes/dasheader.php';?>
    <div class="container-fluid">
        <div class="row">
            <?php 
              include '../includes/dashnav.php';
              //fecth data from database
              include '../includes/db.php';
              $sql = "SELECT * FROM customer WHERE id = '".$_SESSION['id']."'";
              $result = mysqli_query($db, $sql);
              $row = mysqli_fetch_assoc($result);
              $_SESSION['id'] = $row['id'];
              $_SESSION['fn'] = $row['fn'];
              $_SESSION['ln'] = $row['ln'];
              $_SESSION['eml'] = $row['eml'];
              $_SESSION['ph'] = $row['ph'];
              $_SESSION['dob'] = $row['dob'];
              $_SESSION['adr'] = $row['adr'];
              $_SESSION['nat'] = $row['nat'];
              $_SESSION['stt'] = $row['stt'];
              $_SESSION['pwd'] = $row['pwd'];
              $_SESSION['accBal'] = $row['accBal'];
              $_SESSION['cvc'] = $row['cvc'];
            ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <?php
                    if (isset($_SESSION['id'])) {
                      echo "<h1 class='h2'>Welcome, ".$_SESSION['fn']." ".$_SESSION['ln']."</h1>";
                    }
                  ?>
                </div>
                <div class="limiter">
                    <div class="container-login100-form-btn">
                        <?php
                      if (isset($_SESSION['id'])) {
                        echo "<div class='login10-form'>Account Number: ".$_SESSION['id']."</div>";
                      }
                    ?>
                    </div>
                    <div class="container-login100-form-btn">
                        <?php
                      if (isset($_SESSION['accBal'])) {
                        echo "<div class='login10-form'>Account Balance: ".$_SESSION['accBal']." Fcfa</div>";
                      }
                    ?>
                    </div>
                    <div class="container-login100-form-btn">
                        <?php
                      if (isset($_SESSION['cvc'])) {
                        echo "<div class='login10-form'>CVC: ".$_SESSION['cvc']."</div>";
                      }
                    ?>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <?php include '../includes/script.php';?>
</body>

</html>