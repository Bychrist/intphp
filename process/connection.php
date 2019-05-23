<?php

$localhost = "localhost";
$user = "root";
$password ="";
$db = "intphp";
$connection = mysqli_connect($localhost, $user, $password, $db);

if(!$connection)
{
	echo "Not connected";

}
