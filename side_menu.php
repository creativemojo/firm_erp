<nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="employees.php">
                                <i class="fas fa-users"></i>Our Employees</a>
                        </li>
                        <li>
                            <a href="employee_req.php">
                                <i class="fas fa-download"></i>Approve Registrations</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="far fa-check-square"></i>Release Salary</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Salary history</a>
                        </li>
                        <li>
                            <a href="clients.php">
                                <i class="fas fa-user"></i>Our Clients</a>
                        </li>
                        <li>
                            <a href="suppliers.php">
                                <i class="fas fa-rocket"></i>Our Suppliers</a>
                        </li>
                        <li>
                            <a href="warehouse.php">
                                <i class="fas fa-home"></i>Our Warehouses</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                       
                       <li class="<?php echo isset($dashboard_active)? 'active' : '' ?>">
                            <a href="dashboard.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php echo isset($employee_active)? 'active' : '' ?>">
                            <a href="employees.php">
                                <i class="fas fa-users"></i>Our Employees</a>
                        </li>
                        <li class="<?php echo isset($app_reg_active)? 'active' : '' ?>">
                            <a href="employee_req.php">
                                <i class="fas fa-download"></i>Approve Registrations</a>
                        </li>
                        <li class="<?php echo isset($release_salary)? 'active' : '' ?>">
                            <a href="release_salary.php">
                                <i class="far fa-check-square"></i>Release Salary</a>
                        </li>
                        <li class="<?php echo isset($salary_history)? 'active' : '' ?>">
                            <a href="salary_history.php">
                                <i class="fas fa-calendar-alt"></i>Salary history</a>
                        </li>
                        <li class="<?php echo isset($our_clients)? 'active' : '' ?>">
                            <a href="clients.php">
                                <i class="fas fa-user"></i>Our Clients</a>
                        </li>
                        <li class="<?php echo isset($our_suppliers)? 'active' : '' ?>">
                            <a href="suppliers.php">
                                <i class="fas fa-rocket"></i>Our Suppliers</a>
                        </li>
                        <li class="<?php echo isset($our_warehouses)? 'active' : '' ?>">
                            <a href="warehouse.php">
                                <i class="fas fa-home"></i>Our Warehouses</a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>