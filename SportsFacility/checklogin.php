<?php
    include "dbutils.php";
    session_start();
    $_SESSION['loggedin'] = False;

	$username = $_POST['username'];
	$passwd = $_POST['passwd'];
	$number = $_POST['User_number'];

    $retstatus = check_login ($username, $passwd, $msg);
    echo $username . "<br>";
    echo $passwd . "<br>";
    echo $msg . "<br>";
    echo "Return Status = " . $retstatus . "<br>";
    if ($retstatus)
    {
	echo "Success " . "<br>";
	$_SESSION['login'] = $username;
	$_SESSION['user_number'] = $number;
	$_SESSION['loggedin'] = True;
	$customer = check_login_type($username);
	if ($customer)
	{
	$goto = "Location: customerpage.php";
	} else{
	$admin = check_admin($username);
	if ($admin)
	{
	$goto= "Location: managerpage.php";
	}else {
	$goto= "Location: employeepage.php";
	}
    }} else {
        echo "Failure " . "<br>";
    	$ref = getenv("HTTP_REFERER");
        $_SESSION['login'] = '';
        $_SESSION['loggedin'] = NULL;
        //echo "<script language='javascript'> alert('Incorrect Password'); </script>";
    	$goto = "Location: index.php#invalidPassword";
    }
	header($goto);

?>