<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: release_salary.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "delete from fm_salary where salary_id=$id");

if($query){

	header('location: salary_history.php');

}

?>