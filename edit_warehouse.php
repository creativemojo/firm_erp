<?php 

include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: warehouse.php') : '';

$page_title = "Edit Warehouse | Firm Management System";

include_once("header.php");

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "select * from fm_warehouses where w_id=$id");

$row = mysqli_fetch_assoc($query); 

if(isset($_POST['submit'])){

    $w_name = trim($_POST['name']);
    $w_addr = trim($_POST['address']);

    if(empty($w_name)){

        $err_name = "Please enter valid warehouse name";

    }elseif(empty($w_addr)){

        $err_address = "Please enter valid warehouse address";

    }else{

    $query1 = mysqli_query($connect, "update fm_warehouses set `w_name`='$w_name', `w_addr`='$w_addr' where w_id=$id");

    if($query1){

        header('location: warehouse.php');

    }else{

        $error = "Something went worng. Please try again.";

    }

    }

}

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
                                        <strong>Edit</strong> Warehouse
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Warehouse Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" placeholder="Warehouse Name" class="form-control" value="<?php echo $row['w_name']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_name)){ echo $err_name; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class=" form-control-label">Full Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" id="address" name="address" placeholder="Full Address"><?php echo $row['w_addr']; ?></textarea>
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_address)){ echo $err_address; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update
                                        </button>
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