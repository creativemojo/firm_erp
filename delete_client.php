<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: clients.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "delete from fm_clients where c_id=$id");

if($query){

	header('location: clients.php');

}

?>