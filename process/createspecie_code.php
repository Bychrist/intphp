<?php

require_once ('connection.php');
session_start();
$email =  $_SESSION['email'];
if(!isset($email))
{
    header("Location: ../index.php");
}

if(!$_POST['specie'])
{
	header("Location: ../createcategory.php");
}


$specie= $_POST['specie'];
$category_id= $_POST['category_id'];
$weight= $_POST['weight'];


$sql = "INSERT INTO specie(specie, category_id, weight) VALUES('$specie','$category_id','$weight') ";
$result = mysqli_query($connection,$sql);
if($result)
{
	return "specie was added";
}
else
{
	return "animal category failed";
}

?>