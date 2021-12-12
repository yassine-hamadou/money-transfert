<!DOCTYPE html>

<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <!--===============================================================================================-->
    <link href="../assets/login/images/icons/favicon.ico" rel="icon" type="image/png" />
    <!--=========.======================================================================================-->
    <link href="../assets/login/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--=========.======================================================================================-->
    <link href="../assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--=========.======================================================================================-->
    <link href="../assets/login/vendor/animate/animate.css" rel="stylesheet" type="text/css">
    <!--=========.======================================================================================-->
    <link href="../assets/login/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css">
    <!--=========.======================================================================================-->
    <link href="../assets/login/vendor/select2/select2.min.css" rel="stylesheet" type="text/css">
    <!--=========.======================================================================================-->
    <link href="../assets/login/css/util.css" rel="stylesheet" type="text/css">
    <link href="../assets/login/css/main.css" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->
</head>

<body>
    <div class="limiter">
        <div class="container-login100 center-div">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt style="margin-top: 1.5rem;">
                    <img alt="IMG" src="../assets/images/login.svg">
                    <!--       https://avatars.dicebear.com/api/bottts/as.svg?background=%230000ff         -->
                </div>

                <form action="../php/admin/admin.php" class="login100-form validate-form" method="post">
                    <span class="login100-form-title">
						Admin Login
					</span>
                    <?php
                    if ((isset($_GET["error"])) && ($_GET["error"]) === "invalidUsermail") {
                        echo '<div class="alert alert-danger">Invalid Usermail</div>';
                    }
                    elseif ((isset($_GET["error"])) && ($_GET["error"]) === "invalidPassword") {
                        echo '<div class="alert alert-danger">Invalid Password</div>';
                    }
                    ?>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" name="email" placeholder="Email" required type="text">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i aria-hidden="true" class="fa fa-envelope"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" name="pwd" placeholder="Password" required type="password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
							<i aria-hidden="true" class="fa fa-lock"></i>
						</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" name="login">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="../assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--==========.=====================================================================================-->
    <script src="../assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="../assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--==========.=====================================================================================-->
    <script src="../assets/login/vendor/select2/select2.min.js"></script>
    <!--==========.=====================================================================================-->
    <script src="../assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="../assets/login/js/main.js"></script>

</body>

</html>