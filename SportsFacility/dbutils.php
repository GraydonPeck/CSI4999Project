<?php
    session_start();

    $servername = "127.0.0.1";
    $_SESSION['SERVER'] = $servername;
    $username = "gpeck2217";
    $_SESSION['USER'] = $username;
    $password = "";
    $_SESSION['PASS'] = $password;
    $dbname = "c9";
    $_SESSION['DB'] = $dbname;
    $port = "3306";
    $_SESSION['PORT'] = $port;


    $cookie_name = "password";
    $cookie_value = $password;
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname,$port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //echo "Connection Successful <br>";

	// Runs Insert, Update, or Delete Commands
    function add_user ($User_name, $User_password, $User_email, $user_type)
	{
		global $conn;

        $sql_i = "INSERT INTO login_db(user_name, user_password, user_email, user_type) VALUES " .
                "('$User_name', '$User_password', '$User_email', '$user_type')";

        run_update($sql_i);
	}
	function add_customer ($User_name)
	{
		global $conn;

        $sql_i = "INSERT INTO customer_db(user_name) VALUES " .
                "('$User_name')";

        run_update($sql_i);
	}
	function edit_customer ($customer_fname, $customer_lname, $customer_phone, $customer_email, $customer_address, $customer_city, $customer_state, $customer_country, $customer_zip, $customer_creditcard, $user_name)
	{
		global $conn;

        $sql_i = "UPDATE customer_db SET customer_fname = '$customer_fname', customer_lname = '$customer_lname', customer_phone = '$customer_phone', customer_email = '$customer_email', customer_address = '$customer_address',
        customer_city = '$customer_city', customer_state = '$customer_state', customer_country = '$customer_country', customer_zip = '$customer_zip', customer_creditcard = '$customer_creditcard' WHERE user_name = '$user_name'";

        run_update($sql_i);
	}
	function add_employee ($user_name, $employee_fname, $employee_lname, $employee_type, $employee_phone)
	{
		global $conn;


        $sql_i = "INSERT INTO employee_db(user_name, employee_fname, employee_lname, employee_type, employee_phone) VALUES " .
                "('$user_name', '$employee_fname', '$employee_lname', '$employee_type', '$employee_phone')";

        run_update($sql_i);
	}
	function edit_employee ($employee_fname, $employee_lname, $employee_type, $employee_phone, $user_name)
	{
		global $conn;


        $sql_i = "UPDATE employee_db SET employee_fname = '$employee_fname', employee_lname = '$employee_lname', employee_type = '$employee_type', employee_phone = '$employee_phone' WHERE user_name = '$user_name'";

        run_update($sql_i);
	}
	function edit_employee_email ($user_email, $user_name)
	{
		global $conn;


        $sql_i = "UPDATE login_db SET user_email = '$user_email' WHERE user_name = '$user_name'";

        run_update($sql_i);
	}
	function run_update ($sql)
	{
		global $conn;
 		if ($conn->query($sql) === TRUE) {
            //echo "Database updated successfully <br>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

	}

	// Checks login
	function check_login($user, $pass, &$msg)
	{
		global $conn;

		$msg = "Login Denied";
		$retvalue = False;

		$sql = "select user_password from login_db where user_name = '$user'";


		$result = $conn->query($sql);

    	if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$dbpass = $row["user_password"];

			if ($dbpass == $pass)
			{
				$retvalue = True;
				$msg = "Login Successful";
			}
		}
		return  $retvalue;
	}
	function check_login_type($user)
	{
		global $conn;

		$customer = False;

		$sql = "select user_type from login_db where user_name = '$user'";


		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$dbpass = $row["user_type"];

			if ($dbpass == "customer")
			{
				$customer = True;
				$msg = "Customer";
			}
		}

		return  $customer;
	}
	function check_admin($user)
	{
		global $conn;

		$admin = False;

		$sql = "select employee_type from employee_db where user_name = '$user'";


		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$dbpass = $row["employee_type"];

			if ($dbpass == "admin")
			{
				$admin = True;
				$msg = "Customer";
			}
		}

		return  $admin;
	}


?>