<?php 

include_once('connection.php');
include_once('auth.php');

$page_title = "View Warehouse | Firm Management System";

!isset($_REQUEST['id'])? header('location: warehouse.php') : '';

include_once("header.php"); 

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "select * from fm_warehouses where w_id=$id");

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
                                        <strong>View</strong> Warehouse
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Warehouse Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <strong><p class="form-control-static"><?php echo $row['w_name']; ?></p></strong>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class=" form-control-label">Full Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <strong><p class="form-control-static"><?php echo $row['w_addr']; ?></p></strong>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <a href="edit_warehouse.php?id=<?php echo $id; ?>"><button class="btn btn-warning btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit
                                        </button></a>
                                        <a href="manage_inventory.php?id=<?php echo $id; ?>"><button class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Manage Inventory
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