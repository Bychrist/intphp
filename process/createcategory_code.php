<?php

require_once ('connection.php');
session_start();
$email =  $_SESSION['email'];
if(!isset($email))
{
    header("Location: ../index.php");
}

if(!$_POST['name'])
{
	header("Location: ../createcategory.php");
}


$name= $_POST['name'];


$sql = "INSERT INTO category(name) VALUES('$name') ";
$result = mysqli_query($connection,$sql);
if($result)
{
	echo "animal category was created";
}
else
{
	return "animal category failed";
}

?>