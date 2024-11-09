<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Home</div>
            <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Layouts
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth"
                        aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Summary</div>
            <a class="nav-link" href="/admin/inventory.php">
                <div class="sb-nav-link-icon"><i class="fas fa-boxes"></i></div>
                Inventory
            </a>
            <a class="nav-link" href="/admin/sales.php">
                <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                Sales
            </a>
            <a class="nav-link" href="/admin/suppliers.php">
                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                Suppliers
            </a>
            <a class="nav-link" href="/admin/customers.php">
                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                Customers
            </a>
            <a class="nav-link" href="/admin/reports.php">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                Reports
            </a>
            <!-- <a class="nav-link" href="/admin/tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                                Settings
                            </a> -->
            <a class="nav-link" href="/admin/reciept.php">
                <div class="sb-nav-link-icon"><i class="fas fa-receipt"></i></div>
                Receipt
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div>Logged : in as:</div>
        <?php

if (isset($_SESSION['username'])) {
    echo '<div class="">' . htmlspecialchars($_SESSION['username']) . '</div>';
} else {
    echo '<div class="small">Not logged in</div>';
}
?>
    </div>

</nav>