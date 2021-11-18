<nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" id="sidebarMenu">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">

        <?php
            // Get the current page name and use it to set the active class 
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
        ?>
        
            <li class="nav-item">
                <a aria-current="page" class="nav-link <?= ($activePage == 'dashboard') ? 'active':'';?>" href="../html/dashboard.php">
                    <span data-feather="home"></span> Dashboard
                </a>
            </li>
            <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Transaction</span>
            </h1>
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'transfer') ? 'active':'';?>" href="../php/transfer.php">
                    <span data-feather="users"></span> Transfer Funds
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'transactions') ? 'active':'';?>" href="../php/transactions.php">
                    <span data-feather="file"></span> View Transactions
                </a>
            </li>
            <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Withdrawal</span>
            </h1>
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'withdraw') ? 'active':'';?>" href="../php/withdraw.php">
                    <span data-feather="shopping-cart"></span> Withdrawal Application
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'approval') ? 'active':'';?>" href="../php/approval.php">
                    <span data-feather="file-text"></span> Approval Status
                </a>
            </li>
            <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                <span>Profile</span>
            </h1>
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'edit') ? 'active':'';?>" href="../php/edit.php">
                    <span data-feather="bar-chart-2"></span> Edit Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($activePage == 'password') ? 'active':'';?>" href="../php/password.php">
                    <span data-feather="layers"></span> Change Password
                </a>
            </li>
        </ul>

    </div>
</nav>