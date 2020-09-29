<?php 

include_once('connection.php');
include_once('auth.php');

$salary_history = true;

$page_title = "Employees | Firm Management System";

include_once("header.php"); 

$query = mysqli_query($connect, "select * from fm_salary");

$m = [0,'Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];

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
                                    <h2 class="title-1">Salary History</h2>
                                    
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <th>#</th>
                                        <th>Year</th>
                                        <th>Month</th>
                                        <th>Action</th>
                                    </thead>
                                        <tbody>
                                        <?php $x=1; while($row=mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $x; $x++; ?></td>
                                                <td><?php echo $row['year']; ?></td>
                                                <td><?php echo $m[$row['month']]; ?></td>
                                                <td><a href="delete_salary.php?id=<?php echo $row['salary_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>
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