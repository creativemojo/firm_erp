        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="search_employees.php" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search Employee" />
                                <button class="au-btn--submit" name="submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="Your Name" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                                Admin
                                            </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="Your Name" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a><?php echo isset($_SESSION['user_fullname'])? $_SESSION['user_fullname'] : "User Name"; ?></a>
                                                    </h5>
                                                    <span class="email"><?php echo isset($_SESSION['user_email'])? $_SESSION['user_email'] : "Your Email"; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="change_admin_password.php">
                                                        <i class="zmdi zmdi-account"></i>Change Password</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->