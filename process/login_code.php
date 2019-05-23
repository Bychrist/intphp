<?php

require_once ('connection.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM users WHERE email= '$email' AND password ='$password'";
$result = mysqli_query($connection,$sql);
if( mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_assoc($result)) {
		$id =  $row['id'];
		$email = $row["email"];
		session_start();
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;

	}

	header("Location: ../createcategory.php");
}
else
{
	header("Location:../index.php");
}

?>