<?php 

include_once('connection.php');
include_once('auth.php');


$page_title = "Manage Inventory | Firm Management System";

include_once("header.php");

!isset($_REQUEST['id'])? header('location: warehouse.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "select * from fm_inventory where w_id=$id");

if(isset($_POST['submit'])){

    $item = trim($_POST['item']);
    $qty = trim($_POST['qty']);

    if(empty($item)){

        $err_item = "Please enter item name";

    }elseif(empty($qty) || !ctype_digit($qty)){

        $err_qty = "Please enter valid quantity";

    }else{

    $query1 = mysqli_query($connect, "insert into fm_inventory(`i_item`, `i_qty`, `w_id`) values('$item', '$qty', $id)");

    if($query1){

        $success = "Item added successfully";

        header('refresh: 1');

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

                        <small class="help-block form-text" style="color:green;">
                            <?php if(isset($success)){ echo $success; } ?>
                        </small>

                        <div class="row">
                            <div class="col-lg-12" style="overflow-x:auto">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Manage</strong> Inventory
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="item" class=" form-control-label">Item Name:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="item" name="item" placeholder="Item Name" class="form-control" value="<?php echo isset($item)? $item : ''; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_item)){ echo $err_item; } ?>
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="item" class=" form-control-label">Item Qty.:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="number" id="qty" name="qty" placeholder="Item Qty." class="form-control" value="<?php echo isset($qty)? $qty : ''; ?>">
                                                    <small class="help-block form-text" style="color:red;">
                                                        <?php if(isset($err_qty)){ echo $err_qty; } ?>
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
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Action</th>
                                    </thead>
                                        <tbody>
                                        <?php if(mysqli_num_rows($query) == 0){ ?>
                                            <tr>
                                                <td colspan="4" align="center"><strong>No Records Found</strong></td>
                                            </tr>
                                        <?php }else{ ?>
                                        <?php $x=1; while($row = mysqli_fetch_assoc($query)){ ?>
                                            <tr>
                                                <td><?php echo $x; $x++; ?></td>
                                                <td><?php echo $row['i_item']; ?></td>
                                                <td><?php echo $row['i_qty']; ?></td>
                                               
                                                <td>
                                                    <form method="post" action="delete_item.php">
                                                        <input type="hidden" name="page_id" value="<?php echo $id; ?>">
                                                        <input type="hidden" name="item_id" value="<?php echo $row['i_id']; ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
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