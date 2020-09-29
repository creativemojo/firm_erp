<?php 

include_once('connection.php');
include_once('auth.php');

$employee_active = true;

$page_title = "Assign Task | Firm Management System";

include_once("header.php");

$id = $_REQUEST['id']; 

$query = mysqli_query($connect, "select * from fm_tasks where emp_id=$id");

$query_emp = mysqli_query($connect, "select * from fm_employees where e_id=$id");
$row_emp = mysqli_fetch_assoc($query_emp);

if(isset($_POST['submit'])){

    $task = trim($_POST['task']);

    if(empty($task)){

        $err_task = "Please enter task";

    }else{

    $query1 = mysqli_query($connect, "insert into fm_tasks(`t_description`, `emp_id`) values('$task', '$id')");

    if($query1){

        $success = "Task added successfully";

        header("refresh: 1");

    }else{

        $error = "Something went wrong. Please try again";

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

                        <small class="help-block form-text" style="color:green;">
                            <?php if(isset($success)){ echo $success; } ?>
                        </small>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <div class="card">
                                    <div class="card-header">
                                        Assign Task : <strong><?php echo $row_emp['e_fname']." ".$row_emp['e_lname']; ?></strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="task" class=" form-control-label">Task Details:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea class="form-control" id="task" name="task" placeholder="Task Details"><?php echo isset($task)? $task : ''; ?></textarea>
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_task)){ echo $err_task; } ?>
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


                            <div class="col-lg-12" style="overflow-x:auto">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <th>#</th>
                                        <th>Task</th>
                                        <th>Action</th>
                                    </thead>
                                        <tbody>
                                        <?php if(mysqli_num_rows($query) == 0){ ?>
                                            <tr>
                                                <td colspan="3" align="center"><strong>No Records Found</strong></td>
                                            </tr>
                                        <?php }else{ ?>
                                        <?php $x=1; while($row = mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $x; $x++; ?></td>
                                                <td><?php echo $row['t_description']; ?></td>
                                                <td><a href="delete_task.php?id=<?php echo $row['t_id'] ?>"><button type="button" class="btn btn-danger btn-sm">Delete</button></a></td>
                                            </tr>
                                        <?php }} ?>    
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