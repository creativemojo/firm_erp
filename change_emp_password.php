<?php 

include_once('connection.php');
include_once('auth_emp.php');

$page_title = "Change Password | Firm Management System";

include_once("header.php");

$id = $_SESSION['emp_id']; 

$query_old = mysqli_query($connect, "select e_pass from fm_employees where `e_id`='$id'");

$row_old = mysqli_fetch_assoc($query_old);

if(isset($_POST['submit'])){

    $old_pass = trim($_POST['old_pass']);
    $new_pass = trim(addslashes($_POST['new_pass']));
    $con_pass = trim(addslashes($_POST['conf_pass']));

    if(empty($old_pass)){

        $err_old = "Please enter old password";

    }elseif(empty($new_pass)){

        $err_new = "Please enter new password";

    }elseif(empty($con_pass)){

        $err_con = "Please confirm new password";

    }elseif($row_old['e_pass'] == $old_pass){

        if($new_pass == $con_pass){

            $query = mysqli_query($connect, "update fm_employees set `e_pass`='$new_pass' where `e_id`='$id'");

            if($query){

                header('location: logout.php');

            }else{

                $error = "Something went worng. Please try again.";

            }

        }else{

            $error = "New password do not match. Please try again";

        }

    }else{

        $error = "Wrong old password. Please try again.";

    }

    

}

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

                        <small class="help-block form-text" style="color:red;">
                            <?php if(isset($error)){ echo $error; } ?>
                        </small>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Change</strong> Password
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Old Password:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="old_pass" name="old_pass" placeholder="Old Password" class="form-control">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_old)){ echo $err_old; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">New Password:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="new_pass" name="new_pass" placeholder="New Password" class="form-control">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_new)){ echo $err_new; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Confirm Password:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="conf_pass" name="conf_pass" placeholder="Confirm Password" class="form-control">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_con)){ echo $err_con; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Update Password
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