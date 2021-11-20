<?php 
  session_start();
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
                        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                            <input class="input100" name="accNum" placeholder="Receiver account number" required type="number">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i aria-hidden="true" class="fa fa-envelope"></i>
                            </span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                            <input class="input100" name="amnt" placeholder="Amount to send" required type="number">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i aria-hidden="true" class="fa fa-lock"></i>
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