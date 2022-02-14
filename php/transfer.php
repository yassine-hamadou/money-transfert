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
                    <form action="../php/transferlogic.php" class="validate-form" method="post">
                        <?php
                            if ((isset($_GET["send"])) && ($_GET["send"]) === "success") {
                                echo '<div class="alert alert-success">'.$_SESSION["success_msg"].'</div>';
                            }
                            elseif ((isset($_GET["error"])) && ($_GET["error"]) === "sendSelf") {
                                echo '<div class="alert alert-danger">'.$_SESSION["error_msg"].'</div>';
                            }
                            elseif ((isset($_GET["error"])) && ($_GET["error"]) === "insufficient") {
                                echo '<div class="alert alert-danger">'.$_SESSION["error_msg"].'</div>';
                            }
                            elseif ((isset($_GET["error"])) && ($_GET["error"]) === "incorrect") {
                                echo '<div class="alert alert-danger">'.$_SESSION["error_msg"].'</div>';
                            }
                        ?>
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" name="accNum" placeholder="Receiver account number" required type="number">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i aria-hidden="true" class="fa fa-envelope"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input">
                            <input class="input100" name="amnt" placeholder="Amount to send" required type="number">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i aria-hidden="true" class="fa fa-lock"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" name="cvc" placeholder="CVC" required type="number">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i aria-hidden="true" class="fa fa-envelope"></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="send">
                                Send
                            </button>
                        </div>
                    </form>
                
            </div>
        </div>
    </main>

    <?php include '../includes/script.php';?>
</body>

</html>