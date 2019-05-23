<?php

require_once ('connection.php');
session_start();
$email =  $_SESSION['email'];
if(!isset($email))
{
    header("Location: ../index.php");
}

if(isset($_POST['name']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$sql = "UPDATE  category  SET name='$name' WHERE id='$id'";
	$query = mysqli_query($connection,$sql);
	if($query)
	{
		return "success";
	}
	else
	{
		return "failed";
	}
}



?>