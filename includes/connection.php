<?php 

	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'housing';

	$con = mysqli_connect($hostname, $username, $password, $database);
	if(!$con) {
		echo "Not Connected";
	}

 ?>