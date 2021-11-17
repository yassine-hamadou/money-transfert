<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="" name="description">
    <meta content="Mark Otto, Jacob Thornton, and Bootstrap contributors" name="author">
    <meta content="Hugo 0.88.1" name="generator">
    <title>Dashboard Template · Bootstrap v5.1</title>
    <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" rel="stylesheet">
    <link href="../assets/dashboard/dashboard.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.1/examples/dashboard/" rel="canonical">
    <!--=========.======================================================================================-->
    <!--=========.======================================================================================-->
    <link href="../assets/login/css/util.css" rel="stylesheet" type="text/css">
    <link href="../assets/login/css/main.css" rel="stylesheet" type="text/css">
    <!--===============================================================================================-->


    <!-- Bootstrap core CSS -->

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->

</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
            <img alt="" class="d-inline-block align-text-top" height="24" src="../bootstrap-logo.svg" width="30">
            BornaSend
        </a>
        <button aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler position-absolute d-md-none collapsed" data-bs-target="#sidebarMenu"
            data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input aria-label="Search" class="form-control form-control-dark w-100" placeholder="Search" type="text">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a aria-current="page" class="nav-link active" href="#">
                                <span data-feather="home"></span> Dashboard
                            </a>
                        </li>
                        <h1
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Transaction</span>
                        </h1>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span> Transfer Funds
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file"></span> View Transactions
                            </a>
                        </li>
                        <h1
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Withdrawal</span>
                        </h1>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="shopping-cart"></span> Withdrawal Application
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="file-text"></span> Approval Status
                            </a>
                        </li>
                        <h1
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>Profile</span>
                        </h1>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="bar-chart-2"></span> Edit Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="layers"></span> Change Password
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Yassine Hamadou</h1>
                </div>
                <div class="limiter">
                    <div class="container-login100-form-btn">
                        <div class="login10-form">
                            Account Number: 10155412
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="login10-form">
                            Account Balance: 0
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="login10-form">
                            CVC: 4565118
                        </div>
                    </div>
                </div>
                <!--<div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
              <th scope="col">Header</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,002</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,003</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,004</td>
              <td>text</td>
              <td>random</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,005</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>placeholder</td>
            </tr>
            <tr>
              <td>1,006</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,007</td>
              <td>placeholder</td>
              <td>tabular</td>
              <td>information</td>
              <td>irrelevant</td>
            </tr>
            <tr>
              <td>1,008</td>
              <td>random</td>
              <td>data</td>
              <td>placeholder</td>
              <td>text</td>
            </tr>
            <tr>
              <td>1,009</td>
              <td>placeholder</td>
              <td>irrelevant</td>
              <td>visual</td>
              <td>layout</td>
            </tr>
            <tr>
              <td>1,010</td>
              <td>data</td>
              <td>rich</td>
              <td>dashboard</td>
              <td>tabular</td>
            </tr>
            <tr>
              <td>1,011</td>
              <td>information</td>
              <td>placeholder</td>
              <td>illustrative</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,012</td>
              <td>text</td>
              <td>placeholder</td>
              <td>layout</td>
              <td>dashboard</td>
            </tr>
            <tr>
              <td>1,013</td>
              <td>dashboard</td>
              <td>irrelevant</td>
              <td>text</td>
              <td>visual</td>
            </tr>
            <tr>
              <td>1,014</td>
              <td>dashboard</td>
              <td>illustrative</td>
              <td>rich</td>
              <td>data</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>random</td>
              <td>tabular</td>
              <td>information</td>
              <td>text</td>
            </tr>
          </tbody>
        </table>
      </div>-->
            </main>
        </div>
    </div>



    <script crossorigin="anonymous" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"></script>
    <script crossorigin="anonymous" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <script src="../assets/dashboard/dashboard.js"></script>

</body>

</html>