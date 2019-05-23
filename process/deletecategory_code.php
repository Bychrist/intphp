<?php

require_once ('connection.php');
session_start();
$email =  $_SESSION['email'];
if(!isset($email))
{
    header("Location: ../index.php");
}

if(isset($_GET['delete']))
{
	$id = $_GET['delete'];
	$sql = "DELETE FROM category WHERE id='$id'";
	$query = mysqli_query($connection,$sql);
	return "category was deleted";
}



?>