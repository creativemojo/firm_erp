<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: warehouse.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "delete from fm_warehouses where w_id=$id");

if($query){

	header('location: warehouse.php');

}

?>