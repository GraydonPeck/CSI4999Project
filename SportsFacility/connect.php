<?php // connect.php
	$host = '127.0.0.1';
	$db   = 'c9';
	$user = 'gpeck2217';
	$pass = '';



	$conn = mysqli_connect($host, $user, $pass, $db);
	if(!$conn)
	{
		die("Database Connection Failed" . mysqli_error($connection));
	}
?>