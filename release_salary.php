<?php 

include_once('connection.php');
include_once('auth.php');

$page_title = "Release Salary | Firm Management System";

include_once("header.php"); 

$m = ['Jan','Feb','Mar','Apr','May','June','July','Aug','Sept','Oct','Nov','Dec'];

if(isset($_POST['submit'])){

    $year = $_POST['year'];
    $month = $_POST['month'];

    if($year == 0){

        $err_year = "Please select valid year";

    }elseif($month == 0){

        $err_month = "Please select valid month";

    }else{

    $query_salary = mysqli_query($connect, "select * from fm_salary where year=$year && month=$month");

    if(mysqli_num_rows($query_salary) >= 1){

        $error = "Salary already released for this month.";

    }else{

    $query = mysqli_query($connect, "insert into fm_salary(`year`, `month`) values('$year', '$month')");

    if($query){

        header('location: salary_history.php');

    }else{

        $error = "Something went worng. Please try again.";

    }

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
                                        <strong>Release</strong> Salary
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="year" class=" form-control-label">Select Year:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="year" id="year" name="year" class="form-control">
                                                        <option value="0">--Please select--</option>
                                                        <?php for($x=date('Y'); $x<2100; $x++){ ?>
                                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_year)){ echo $err_year; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="month" class=" form-control-label">Select Month:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <select name="month" id="month" name="month" class="form-control">
                                                        <option value="0">--Please select--</option>
                                                        <?php for($x=0; $x<12; $x++){ ?>
                                                        <option value="<?php echo $x+1; ?>"><?php echo $m[$x]; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_month)){ echo $err_month; } ?>
                                                    </small>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-success btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Release Salary
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