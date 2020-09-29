<?php 

include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: employees.php') : '';

$page_title = "Add Employee | Firm Management System";

include_once("header.php"); 

$id = $_REQUEST['id'];

$query = mysqli_query($connect,"select * from fm_employees where e_id=$id");

$row = mysqli_fetch_assoc($query);

if(isset($_POST['submit'])){

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $aadhar = trim($_POST['aadhar']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);
    $designation = trim($_POST['designation']);
    $salary = trim($_POST['salary']);

    if(empty($fname)){

        $err_fname = "Please enter valid first name";

    }elseif(empty($lname) || !ctype_alpha($lname)){

        $err_lname = "Please enter valid last name";

    }elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){

        $err_email = "Please enter valid email address";

    }elseif(empty($password) || strlen($password) < 5){

        $err_password = "Please enter valid password. (Min 5 characters.)";

    }elseif(empty($aadhar) || !ctype_digit($aadhar) || strlen($aadhar) > 12 || strlen($aadhar) < 12){

        $err_aadhar = "Please enter 12 digit aadhar number";

    }elseif(empty($mobile) || !ctype_digit($mobile) || strlen($mobile) > 10 || strlen($mobile) < 10){

        $err_mob = "Please enter 10 digit mobile number";

    }elseif(empty($address) || strlen($address) < 10){

        $err_address = "Please enter valid address.";

    }elseif(empty($designation)){

        $err_designation = "Please enter valid designation";

    }elseif(empty($salary) || !ctype_digit($salary)){

        $err_salary = "Please enter valid salary";

    }else{
    
    $query1 = mysqli_query($connect, "update fm_employees set `e_fname`='$fname', `e_lname`='$lname', `e_email`='$email', `e_pass`='$password', `e_aadhar`='$aadhar', `e_mobile`='$mobile', `e_address`='$address', `e_designation`='$designation', `e_salary`='$salary' where e_id=$id");

    if($query1){

        header('location: employees.php');

    }else{

        $error = "Something went wrong. Please try again.";

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
                                        <strong>Edit</strong> Employee
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="first name" class=" form-control-label">First Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="fname" name="fname" placeholder="First Name" class="form-control" required="" value="<?php echo $row['e_fname']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_fname)){ echo $err_fname; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="last name" class=" form-control-label">Last Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control" required="" value="<?php echo $row['e_lname']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_lname)){ echo $err_lname; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="email" class=" form-control-label">Email Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="email" name="email" placeholder="Email Address" class="form-control" required="" value="<?php echo $row['e_email']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_email)){ echo $err_email; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="password" class=" form-control-label">Password:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="password" id="password" name="password" placeholder="Create Password" class="form-control" required="" value="<?php echo $row['e_pass']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_password)){ echo $err_password; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="aadhar" class=" form-control-label">Aadhar No.:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="aadhar" name="aadhar" placeholder="Aadhar No." maxlength="12" class="form-control" value="<?php echo $row['e_aadhar']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_aadhar)){ echo $err_aadhar; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="mobile" class=" form-control-label">Mobile No.:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="mobile" name="mobile" placeholder="Mobile No." maxlength="10" class="form-control" required="" value="<?php echo $row['e_mobile']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_mob)){ echo $err_mob; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="address" class=" form-control-label">Full Address:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" id="address" name="address" placeholder="Full Address" required=""><?php echo $row['e_address']; ?></textarea>
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_address)){ echo $err_address; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="designation" class=" form-control-label">Designation:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="designation" name="designation" placeholder="Designation" class="form-control" required="" value="<?php echo $row['e_designation']; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_designation)){ echo $err_designation; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="salary" class=" form-control-label">Salary (Rs.):</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                   <input type="number" id="salary" name="salary" placeholder="Salary" class="form-control" required="" value="<?php echo $row['e_salary']; ?>">
                                                   <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_salary)){ echo $err_salary; } ?>
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