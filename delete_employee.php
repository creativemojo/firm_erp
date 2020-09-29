<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: employees.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "delete from fm_employees where e_id=$id");

if($query){

	header('location: employees.php');

}

?>