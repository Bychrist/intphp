<?php

require_once ('connection.php');
session_start();
$email =  $_SESSION['email'];
if(!isset($email))
{
    header("Location: ../index.php");
}

if(isset($_POST['specie']))
{

	$id = $_POST['id'];
	$specie = $_POST['specie'];
	$weight = $_POST['weight'];
	$category_id = $_POST['category_id'];
	$sql = "UPDATE  specie  SET specie='$specie',weight='$weight',category_id='$category_id' WHERE id='$id'";
	$query = mysqli_query($connection,$sql);
	if($query)
	{
		echo "success";
	}
	else
	{
		return "failed";
	}
}



?>