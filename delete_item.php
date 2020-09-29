<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: warehouse.php') : '';

$id = $_POST['item_id'];
$pid = $_POST['page_id'];

$query = mysqli_query($connect, "delete from fm_inventory where i_id=$id");

if($query){

	header("location: manage_inventory.php?id=$pid");

}else{

	echo "Something went wrong";

}

?>