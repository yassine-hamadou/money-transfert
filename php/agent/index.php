<?php
  session_start();
  if ($_SESSION['agentLogged'] !== true) {
    header("Location: /money-transfert/html/agentlogin.php?error=loginfirst");
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
    <title>Agent Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/money-transfert/php/admin/dash/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="/money-transfert/php/admin/dash/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
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
            <a href="/money-transfert/index.html" class="brand-link">
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
                                <li class="breadcrumb-item active"><a href="/money-transfert/php/logout.php">Logout</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small Box (Stat card) -->
                    <h5 class="mb-2 mt-4">Operations</h5>
                    <div class="row">
                        <div class="col-lg-3 col-12">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>Fcfa</h3>

                                    <p>Fund user account</p>
                                </div>
                                <div class="icon">
                                    <i class="far fa-money-bill-alt"></i>
                                </div>
                                <a href="fund.php" class="small-box-footer">
                                    Deposit <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-6 col-12">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <?php
                                      //get number of agents
                                      $sql = "SELECT * FROM withdrawals";
                                      $result = mysqli_query($db, $sql);
                                      $resultCheck = mysqli_num_rows($result);
                                      echo '<h3>'.$resultCheck.'</h3>';
                                    ?>

                                    <p>Withdrawal requests</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                                <a href="wRequest.php" class="small-box-footer">
                                    Withdraw <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <!-- ./col -->
                        <div class="col-lg-3 col-12">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <?php
                                      //get number of agents
                                      $sql = "SELECT * FROM transactions";
                                      $result = mysqli_query($db, $sql);
                                      $resultCheck = mysqli_num_rows($result);
                                      echo '<h3>'.$resultCheck.'</h3>';
                                    ?>

                                    <p>Total transactions</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="#transactions" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title">Customers</h3>
                                    <div class="card-tools">
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-download"></i>
                                        </a>
                                        <a href="#" class="btn btn-tool btn-sm">
                                            <i class="fas fa-bars"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Customer ID</th>
                                                <th>Fisrt name</th>
                                                <th>Second name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Birth date</th>
                                                <th>Address</th>
                                                <th>Nationality</th>
                                                <th>State</th>
                                                <th>Account Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //get all customers
                                            $sql = "SELECT * FROM customer";
                                            $result = mysqli_query($db, $sql);
                                            $resultCheck = mysqli_num_rows($result);
                                            if ($resultCheck > 0) {
                                              while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>
                                                  <td>".$row['id']."</td>
                                                  <td>".$row['ln']."</td>
                                                  <td>".$row['fn']."</td>
                                                  <td>".$row['eml']."</td>
                                                  <td>".$row['ph']."</td>
                                                  <td>".$row['dob']."</td>
                                                  <td>".$row['adr']."</td>
                                                  <td>".$row['nat']."</td>
                                                  <td>".$row['stt']."</td>
                                                  <td>".$row['accBal']." Fcfa</td>
                                                </tr>";
                                              }
                                            }
                                          ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
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
            <strong>2021 <a href="/index.html">BornaSend</a>.</strong>
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