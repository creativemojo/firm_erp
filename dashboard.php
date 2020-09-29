<?php 

include_once('connection.php');
include_once('auth.php');

$dashboard_active = true;

$page_title = "Dashboard | Firm Management System";

include_once("header.php"); 

$id = $_SESSION['user_id'];

$query = mysqli_query($connect, "select * from fm_users where u_id=$id");

$row = mysqli_fetch_assoc($query);

$q_employees = mysqli_query($connect, "select * from fm_employees");

$q_customers = mysqli_query($connect, "select * from fm_clients");

$q_suppliers = mysqli_query($connect, "select * from fm_suppliers");

$q_warehouse = mysqli_query($connect, "select * from fm_warehouses");

?>
        <!-- HEADER MOBILE-->
<?php

include_once("topbar.php");

include_once("side_menu.php");

include_once("topbar_right.php");

?>
            


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dashboard</h2>
                                    <a href="edit_profile.php"><button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Edit Profile</button></a>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-local-wc"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo mysqli_num_rows($q_employees); ?></h2>
                                                <span>No. of Employees</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-accounts"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo mysqli_num_rows($q_customers); ?></h2>
                                                <span>No. of Clients</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-flight-takeoff"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo mysqli_num_rows($q_suppliers); ?></h2>
                                                <span>No. of Suppliers</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-home"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo mysqli_num_rows($q_warehouse); ?></h2>
                                                <span>No. of Warehouses</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-borderless table-striped table-earning">
                                        <tbody>
                                            <tr>
                                                <td>Full Name:</td>
                                                <td><?php echo $row['u_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Address:</td>
                                                <td><?php echo $row['u_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Designation:</td>
                                                <td><?php echo $row['u_designation']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact No:</td>
                                                <td><?php echo $row['u_mobile']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?php echo $row['u_address']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                        <?php

                            include_once("copyright.php");

                        ?>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   <?php

   include_once("footer_script.php");

   ?>