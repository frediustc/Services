<!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo">
            <h1><a href="admin_dash.php">Easy <span>Admin</span></a></h1>
        </div>
        <div class="logo-icon text-center">
            <a href="index.php"><i class="lnr lnr-home"></i> </a>
        </div>

        <!--logo and iconic logo end-->
        <div class="left-side-inner">

            <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked custom-nav">
                    <li><a href="account.php"><i class="fa fa-user-circle-o"></i><span>Account</span></a></li>
                    <?php if ($_SESSION['u'] == "Administrator"): ?>
                        <!-- <li><a href="admin_dash.php"><i class="fa fa-area-chart"></i><span>Dashboard</span></a></li> -->
                        <li class="menu-list">
                            <a href="#"><i class="fa fa-users"></i>
                            <span>Employees</span></a>
                            <ul class="sub-menu-list">
                                <li><a href="addEmp.php">Add</a> </li>
                                <li><a href="viewEmp.php">View</a></li>
                            </ul>
                        </li>
                        <li><a href="customers.php"><i class="fa fa-user"></i> <span>Customer</span></a></li>
                    <?php endif; ?>
                    <?php if ($_SESSION['u'] != "Employee"): ?>
                        <li><a href="orders.php"><i class="fa fa-envelope"></i> <span>Bookings</span></a></li>
                    <?php endif; ?>
                    <li><a href="services.php"><i class="fa fa-envelope-open"></i> <span>Services</span></a></li>
                </ul>
            <!--sidebar nav end-->
        </div>
    </div>
    <!-- left side end-->
