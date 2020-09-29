<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: suppliers.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "delete from fm_suppliers where s_id=$id");

if($query){

	header('location: suppliers.php');

}

?>