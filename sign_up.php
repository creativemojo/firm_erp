<?php 

include_once('connection.php');

$page_title = "New Employee Registration";

isset($_SESSION['user_id'])? header('location: dashboard.php') : "";

include_once("header.php"); 

if(isset($_POST['submit'])){

    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $aadhar = trim($_POST['aadhar']);
    $mobile = trim($_POST['mobile']);
    $address = trim($_POST['address']);

    if(empty($fname) || !ctype_alpha($fname)){

        $err_fname = "Please enter valid first name";

    }elseif(empty($lname) || !ctype_alpha($lname)){

        $err_lname = "Please enter valid last name";

    }elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){

        $err_email = "Please enter valid email address";

    }elseif(empty($aadhar) || !ctype_digit($aadhar) || strlen($aadhar) > 12 || strlen($aadhar) < 12){

        $err_aadhar = "Please enter 12 digit aadhar number";

    }elseif(empty($mobile) || !ctype_digit($mobile) || strlen($mobile) > 10 || strlen($mobile) < 10){

        $err_mob = "Please enter 10 digit mobile number";

    }elseif(empty($address) || strlen($address) < 10){

        $err_address = "Please enter valid address.";

    }else{

    $query = mysqli_query($connect, "insert into fm_employees(`e_fname`, `e_lname`, `e_email`, `e_aadhar`, `e_mobile`, `e_address`, `e_status`) values('$fname','$lname','$email','$aadhar','$mobile','$address',0)");

    if($query){

        $success = "Request processed successfully.";

    }else{

        $error = "Something went wrong. Please try again.";

    }

}

}

?>
        <div class="page-content--bge5" style="height: auto;">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <small class="help-block form-text" style="color:green;">
                                        <?php if(isset($success)){ echo $success; } ?>
                                    </small>
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($error)){ echo $error; } ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input class="au-input au-input--full" type="text" name="fname" placeholder="Enter First Name" value="<?php echo isset($fname)? $fname : ''; ?>">
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($err_fname)){ echo $err_fname; } ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>Last Name:</label>
                                    <input class="au-input au-input--full" type="text" name="lname" placeholder="Enter Last Name" value="<?php echo isset($lname)? $lname : ''; ?>">
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($err_lname)){ echo $err_lname; } ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>Email Address:</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Enter Email Address" value="<?php echo isset($email)? $email : ''; ?>">
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($err_email)){ echo $err_email; } ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>Aadhar No.:</label>
                                    <input class="au-input au-input--full" type="number"  name="aadhar" placeholder="Enter Aadhar number" maxlength="12" value="<?php echo isset($aadhar)? $aadhar : ''; ?>">
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($err_aadhar)){ echo $err_aadhar; } ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>Mobile No.: (+91-)</label>
                                    <input class="au-input au-input--full" type="number" name="mobile" placeholder="Enter Mobile number" maxlength="10" value="<?php echo isset($mobile)? $mobile : ''; ?>">
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($err_mob)){ echo $err_mob; } ?>
                                    </small>
                                </div>
                                <div class="form-group">
                                    <label>Address:</label>
                                    <textarea class="au-input au-input--full" name="address" placeholder="Enter Full Address"><?php echo isset($address)? $address : ''; ?></textarea>
                                    <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($err_address)){ echo $err_address; } ?>
                                    </small>
                                </div>
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit" type="submit">Register</button>
                                
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="index.php">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php

   include_once("footer_script.php");

   ?>