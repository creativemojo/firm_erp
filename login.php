<?php 

include_once('connection.php');

$page_title = "Login | Firm Management System";

//auth admin login
isset($_SESSION['user_id'])? header('location: dashboard.php') : "";

//auth employee login
isset($_SESSION['emp_id'])? header('location: emp_dashboard.php') : "";

if(isset($_POST['submit'])){

   $username = trim(addslashes($_POST['username']));
    $password = trim(addslashes($_POST['password']));

    $query = mysqli_query($connect, "select * from fm_users where u_username='$username' AND u_password='$password'");
    $query_e = mysqli_query($connect, "Select * from fm_employees where e_email='$username' AND e_pass='$password'");

    $row = mysqli_fetch_assoc($query);

    $row_e = mysqli_fetch_assoc($query_e);

    if(mysqli_num_rows($query) == 1){

        $_SESSION['user_id'] = $row['u_id'];
        $_SESSION['username'] = $row['u_username'];
        $_SESSION['user_fullname'] = $row['u_name'];
        $_SESSION['user_email'] = $row['u_email'];

        header('location: dashboard.php');

    }elseif(mysqli_num_rows($query_e) == 1){

        $_SESSION['emp_id'] = $row_e['e_id'];
        $_SESSION['username'] = $row_e['email'];
        $_SESSION['user_fullname'] = $row_e['e_fname']." ".$row['e_lname'];
        $_SESSION['user_email'] = $row_e['e_email'];

        header('location: emp_dashboard.php');

    }else{

        $error = "Wrong Username/Password";

    }

}

include_once("header.php"); 

?>
        <div class="page-content--bge5">
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
                                    <label>Username:</label>
                                    <input class="au-input au-input--full" type="text" name="username" placeholder="Enter Username" required="">
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Enter Password" required="">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit" type="submit">sign in</button>
                                <small class="help-block form-text" style="color:red;">
                                        <?php if(isset($error)){ echo $error; } ?>
                                    </small>
                            </form>
                            <div class="register-link">
                                <p>
                                    New Employee Registration?
                                    <a href="sign_up.php">Sign Up Here</a>
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