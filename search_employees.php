<?php 

include_once('connection.php');
include_once('auth.php');

$employee_active = true;

$page_title = "Search Results | Firm Management System";

include_once("header.php"); 

$str = trim(addslashes($_POST['search']));

!isset($_POST['search'])? header('location: dashboard.php') : '';

$query = mysqli_query($connect, "select * from fm_employees where e_fname LIKE '%$str%' || e_lname LIKE '%$str%' || e_id LIKE '%$str%' && e_status=1");

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
                                    <h2 class="title-1">Search Results : <strong><?php echo isset($_POST['search'])? $_POST['search'] : ''; ?></strong></h2>
                                    <a href="add_employee.php"><button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Add New Employee</button></a>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <th>#</th>
                                        <th>Emp. ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </thead>
                                        <tbody>
                                        <?php if(mysqli_num_rows($query) == 0){ ?>
                                            <tr>
                                                <td colspan="6" align="center"><strong>No Records Found</strong></td>
                                            </tr>

                                        <?php }else{ ?>
                                        <?php $x=1; while($row = mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $x; $x++; ?></td>
                                                <td><?php echo $row['e_id']; ?></td>
                                                <td><?php echo $row['e_fname']." ".$row['e_lname']; ?></td>
                                                <td><?php echo $row['e_email']; ?></td>
                                                <td><?php echo $row['e_mobile']; ?></td>
                                                <td><a href="view_employee.php?id=<?php echo $row['e_id'] ?>"><button type="button" class="btn btn-success btn-sm">View</button></a> <a href="delete_employee.php?id=<?php echo $row['e_id'] ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>
                                            </tr>
                                        <?php }} ?>
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