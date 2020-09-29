<?php 

include_once('connection.php');
include_once('auth.php');

$page_title = "Edit Client | Firm Management System";

include_once("header.php"); 

if(isset($_POST['submit'])){

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);

    if(empty($name)){

        $err_name = "Please enter valid name";

    }elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){

        $err_email = "Please enter valid email";

    }elseif(empty($mobile) || !ctype_digit($mobile) || strlen($mobile) < 10 || strlen($mobile) > 10){

        $err_mobile = "Please enter valid mobile";

    }elseif(empty($address) || strlen($address) < 5){

        $err_address = "Please enter valid address";

    }else{

        $query = mysqli_query($connect, "insert into fm_clients(`c_name`, `c_email`, `c_mobile`, `c_addr`) values('$name', '$email', '$mobile', '$address')");

    if($query){

        header('location: clients.php');

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
                                        <strong>Add New</strong> Client
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="name" class=" form-control-label">Full Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="name" name="name" placeholder="Full Name" class="form-control" value="<?php echo isset($name)? $name : ''; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_name)){ echo $err_name; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email" name="email" placeholder="Email Address" class="form-control" value="<?php echo isset($email)? $email : ''; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_email)){ echo $err_email; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="mobile" class=" form-control-label">Mobile No.: (+91-)</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="mobile" name="mobile" placeholder="Mobile No." maxlength="10" class="form-control" value="<?php echo isset($mobile)? $mobile : ''; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_mobile)){ echo $err_mobile; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class=" form-control-label">Full Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" id="address" name="address" placeholder="Full Address"><?php echo isset($address)? $address : ''; ?></textarea>
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_address)){ echo $err_address; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
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