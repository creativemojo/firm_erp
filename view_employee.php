<?php 

include_once('connection.php');
include_once('auth.php');

$page_title = "View Employee | Firm Management System";

include_once("header.php"); 

!isset($_REQUEST['id'])? header('location: employees.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect,"select * from fm_employees where e_id=$id");

$row = mysqli_fetch_assoc($query);

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

                        <small class="help-block form-text" style="color:red;">
                            <?php if(isset($error)){ echo $error; } ?>
                        </small>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>View</strong> Employee
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="first name" class=" form-control-label">First Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_fname']; ?></strong></p>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="last name" class=" form-control-label">Last Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_lname']; ?></strong></p>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_email']; ?></strong></p>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="aadhar" class=" form-control-label">Aadhar No.:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_aadhar']; ?></strong></p>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="mobile" class=" form-control-label">Mobile No.:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_mobile']; ?></strong></p>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class=" form-control-label">Full Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_address']; ?></strong></p>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="designation" class=" form-control-label">Designation:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <p class="form-control-static"><strong><?php echo $row['e_designation']; ?></strong></p>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="salary" class=" form-control-label">Salary (Rs.):</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <p class="form-control-static"><strong><?php echo $row['e_salary']; ?></strong></p>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <a href="edit_employee.php?id=<?php echo $row['e_id']; ?>"><button class="btn btn-warning btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit Employee
                                        </button></a>
                                        <a href="assign_task.php?id=<?php echo $row['e_id']; ?>"><button class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Assign Task
                                        </button></a>
                                    </div>
                                    </form>
                                </div>
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