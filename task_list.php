<?php 

include_once('connection.php');
include_once('auth_emp.php');

$salary_history = true;

$page_title = "Task List | Firm Management System";

include_once("header.php"); 

$id = $_SESSION['emp_id'];

$query = mysqli_query($connect, "select * from fm_tasks where emp_id=$id");

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
                                    <h2 class="title-1">Task List</h2>
                                    
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <th>#</th>
                                        <th>Task</th>
                                    </thead>
                                        <tbody>
                                        <?php $x=1; while($row=mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $x; $x++; ?></td>
                                                <td><?php echo $row['t_description']; ?></td>
                                            </tr>
                                        <?php } ?>
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