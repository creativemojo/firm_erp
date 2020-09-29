<?php 

include_once('connection.php');
include_once('auth.php');

$our_clients = true;

$page_title = "Employees | Firm Management System";

include_once("header.php"); 

$query = mysqli_query($connect, "select * from fm_clients");

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
                                    <h2 class="title-1">Manage Clients</h2>
                                    <a href="add_client.php"><button class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Add New Client</button></a>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <th>#</th>
                                        <th>Client ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Action</th>
                                    </thead>
                                        <tbody>
                                        <?php $x=1; while($row = mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $x; $x++; ?></td>
                                                <td><?php echo $row['c_id']; ?></td>
                                                <td><?php echo $row['c_name']; ?></td>
                                                <td><?php echo $row['c_email']; ?></td>
                                                <td><?php echo $row['c_mobile']; ?></td>
                                                <td><a href="view_client.php?id=<?php echo $row['c_id']; ?>"><button type="button" class="btn btn-success btn-sm">View</button></a> <a href="delete_client.php?id=<?php echo $row['c_id']; ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>
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