<?php 
  session_start();
  if ($_SESSION['Logged'] !== true) {
    header("Location: ../html/loginpage.php");
  }
?>

<!doctype html>
<html lang="en">

<?php include '../includes/dashead.php';?>

<body style="height: 100%;">

    <?php include '../includes/dasheader.php';?>
    <?php include '../includes/dashnav.php';?>

    <main class="col-md-9 ms-sm-auto col-lg-10">
        <div class="limiter">
            <div class="container-login100">
                <form action="./withdrawlogic.php" class="validate-form" method="post">
                <?php
                    if ((isset($_GET["wrequest"])) && ($_GET["wrequest"]) === "notsent") {
                        echo '<div class="alert alert-danger">Withdrawal request unsuccessful</div>';
                    }
                    elseif ((isset($_GET["wrequest"])) && ($_GET["wrequest"]) === "insufficientFunds") {
                        echo '<div class="alert alert-danger">Insufficient Balance!</div>';
                    }
                    elseif ((isset($_GET["wrequest"])) && ($_GET["wrequest"]) === "cvcincorrect") {
                        echo '<div class="alert alert-danger">Incorrect CVC!</div>';
                    }
                    elseif ((isset($_GET["wrequest"])) && ($_GET["wrequest"]) === "success") {
                        echo '<div class="alert alert-success">Withdrawal request sent successfully!</div>';
                    }
                ?>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" name="w_amnt" placeholder="Amount to withdraw" required type="number">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input class="input100" name="cvc" placeholder="CVC code" required type="number">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="withdraw">
                            withdraw
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include '../includes/script.php';?>
</body>

</html>