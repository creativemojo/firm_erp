<?php 

include_once('connection.php');
include_once('auth.php');

$page_title = "Edit Client | Firm Management System";

!isset($_REQUEST['id'])? header('location: clients.php') : '';

include_once("header.php");

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "select * from fm_clients where c_id=$id");

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
                                        <strong>View</strong> Client
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Full Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <strong><p class="form-control-static"><?php echo $row['c_name']; ?></p></strong>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <strong><p class="form-control-static"><?php echo $row['c_email']; ?></p></strong>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="mobile" class=" form-control-label">Mobile No.:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <strong><p class="form-control-static"><?php echo $row['c_mobile']; ?></p></strong>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class=" form-control-label">Full Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <strong><p class="form-control-static"><?php echo $row['c_addr']; ?></p></strong>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <a href="edit_client.php?id=<?php echo $id; ?>"><button class="btn btn-warning btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Edit
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