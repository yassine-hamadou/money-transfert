<?php
  session_start();
  if ($_SESSION['agentLogged'] !== true) {
    header("Location: /money-transfert/html/adminlogin.php?error=loginfirst");
    exit();
  }
  include '/opt/lampp/htdocs/money-transfert/includes/db.php';
  include '/opt/lampp/htdocs/money-transfert/includes/functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Funding</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/money-transfert/php/admin/dash/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/money-transfert/php/admin/dash/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/money-transfert/php/admin/dash/dist/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <h1>BornaSend</h1>
            <img class="animation__wobble" src="/money-transfert/php/admin/dash/dist/img/bootstrap-logo.svg"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/index.html" class="brand-link">
                <img src="/money-transfert/php/admin/dash/dist/img/bootstrap-logo.svg" alt="Bornasend Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-bold">BornaSend</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/money-transfert/php/admin/dash/dist/img/user2-160x160.png"
                            class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Borna Hamadou</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->

                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">BornaSend v1</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">BornaSend v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="container" style="max-width: 400px;">
                        <h3 class="wrapper">Agent sign up form</h3>
                        <?php
                            if ((isset($_GET["deposit"])) && ($_GET["deposit"]) === "accnumnotcorrect") {
                                echo '<div class="alert alert-danger">Account number does not match</div>';
                            }
                            elseif ((isset($_GET["deposit"])) && ($_GET["deposit"]) === "amntnotcorrect") {
                                echo '<div class="alert alert-danger">Please recheck deposit amount</div>';
                            }
                            elseif ((isset($_GET["deposit"])) && ($_GET["deposit"]) === "accnotfound") {
                                echo '<div class="alert alert-danger">Error... Account not found!</div>';
                            }
                            elseif ((isset($_GET["deposit"])) && ($_GET["deposit"]) === "dberror") {
                                echo '<div class="alert alert-danger">Connection error!</div>';
                            }
                            elseif ((isset($_GET["deposit"])) && ($_GET["deposit"]) === "notcommitted") {
                                echo '<div class="alert alert-danger">Deposit not completed!</div>';
                            }
                            elseif ((isset($_GET["deposit"])) && ($_GET["deposit"]) === "committed") {
                                echo '<div class="alert alert-success">Deposit of '.$_GET['amount'].' Fcfa to Account number '.$_GET['accNum'].' completed!</div>';
                            }
                        ?>

                        <form action="./fundlogic.php" method="post">
                            <div class="mb-3">
                                <label class="form-label" for="accNum">Account number</label>
                                <input class="form-control" id="accNum" name="accNum" required type="number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="accNum2">Confirm Account number</label>
                                <input class="form-control" id="accNum2" name="accNum2" required type="number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="amnt">Amount to deposit</label>
                                <input class="form-control" id="amnt" name="amnt" required type="number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="amnt2">Confirm Amount to deposit</label>
                                <input class="form-control" id="amnt2" name="amnt2" required type="number">
                            </div>

                            <button class="btn btn-primary blue mb-5" name="deposit" type="submit" value="Submit">Deposit amount</button>
                        </form>
                    </div>
                </div>
                <!--/. container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="/index.html">BornaSend</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="/money-transfert/php/admin/dash/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/money-transfert/php/admin/dash/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/money-transfert/php/admin/dash/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/money-transfert/php/admin/dash/dist/js/adminlte.js"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="/money-transfert/php/admin/dash/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
    <script src="/money-transfert/php/admin/dash/plugins/raphael/raphael.min.js"></script>
    <script src="/money-transfert/php/admin/dash/plugins/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="/money-transfert/php/admin/dash/plugins/jquery-mapael/maps/usa_states.min.js"></script>
    <!-- ChartJS -->
    <script src="/money-transfert/php/admin/dash/plugins/chart.js/Chart.min.js"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="/money-transfert/php/admin/dash/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/money-transfert/php/admin/dash/dist/js/pages/dashboard2.js"></script>
</body>

</html>