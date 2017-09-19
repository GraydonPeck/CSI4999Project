<?php
    include "dbutils.php";
    session_start();
 
	$username = $_POST['username'];
	$passwd = $_POST['passwd'];

    $retstatus = check_login ($username, $passwd, $msg);
    echo $username . "<br>";
    echo $passwd . "<br>";
    echo $msg . "<br>";
    echo "Return Status = " . $retstatus . "<br>";
    if ($retstatus)
    {
	echo "Success " . "<br>";
	$_SESSION['login'] = $username;
	$goto = "Location: home.php";
    } else {
        echo "Failure " . "<br>";
    	$ref = getenv("HTTP_REFERER");
        $_SESSION['login'] = '';
        //echo "<script language='javascript'> alert('Incorrect Password'); </script>";
    	$goto = "Location: " . $ref;
    }	
	header($goto);

?>