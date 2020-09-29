<?php 

include_once('connection.php');
include_once('auth_emp.php');

$dashboard_active = true;

$page_title = "Employee Dashboard | Firm Management System";

include_once("header.php"); 

$id = $_SESSION['emp_id'];

$query = mysqli_query($connect, "select * from fm_employees where e_id=$id");

$row = mysqli_fetch_assoc($query);

?>
        <!-- HEADER MOBILE-->
<?php

include_once("topbar.php");

include_once("emp_side_menu.php");

include_once("emp_topbar_right.php");

?>
            


            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Profile</h2>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-borderless table-striped table-earning">
                                        <tbody>
                                            <tr>
                                                <td>Full Name:</td>
                                                <td><?php echo $row['e_fname']." ".$row['e_lname']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Address:</td>
                                                <td><?php echo $row['e_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Designation:</td>
                                                <td><?php echo $row['e_designation']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Contact No:</td>
                                                <td><?php echo $row['e_mobile']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Address:</td>
                                                <td><?php echo $row['e_address']; ?></td>
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