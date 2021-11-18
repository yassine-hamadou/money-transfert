<?php 
  session_start();
?>

<!doctype html>
<html lang="en">

<?php include '../includes/dashead.php';?>

<body>

    <?php include '../includes/dasheader.php';?>

    <div class="container-fluid">
        <div class="row">
            <?php include '../includes/dashnav.php';?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
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
                        echo "<div class='login10-form'>Account Balance: ".$_SESSION['accBal']."</div>";
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