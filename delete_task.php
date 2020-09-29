<?php


include_once('connection.php');
include_once('auth.php');

!isset($_REQUEST['id'])? header('location: assign_task.php') : '';

$id = $_REQUEST['id'];

$query = mysqli_query($connect, "delete from fm_tasks where t_id=$id");

if($query){

	header('location: view_employee.php');

}

?>