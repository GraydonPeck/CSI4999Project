<?php // connect.php
	$host = '127.0.0.1';
	$db   = 'vv';
	$user = 'adminacc';
	$pass = 'admin';

	$conn = mysqli_connect($host, $user, $pass, $db);
	if(!$conn)
	{
		die("Database Connection Failed" . mysqli_error($connection));
	}
?>