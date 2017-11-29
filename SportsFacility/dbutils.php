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

	function edit_customer ($customer_fname, $customer_lname, $customer_phone, $customer_email, $customer_address, $customer_city, $customer_state, $customer_country, $customer_zip, $user_name)
	{
		global $conn;

        $sql_i = "UPDATE customer_db SET customer_fname = '$customer_fname', customer_lname = '$customer_lname', customer_phone = '$customer_phone', customer_email = '$customer_email', customer_address = '$customer_address',
        customer_city = '$customer_city', customer_state = '$customer_state', customer_country = '$customer_country', customer_zip = '$customer_zip' WHERE user_name = '$user_name'";

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
	function add_calendar ($day, $job, $username)
	{
		global $conn;
		$_SESSION['available']= True;
		$sql = "Select blocked FROM work_schedule WHERE day = '$day' and job = '$job'";
		$result = $conn->query($sql);
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
			$dbpass = $row["blocked"];

			if ($dbpass != $username)
			{
				$sql_i = "UPDATE work_schedule SET user_name = '$username' WHERE day = '$day' AND job = '$job'";
        		run_update($sql_i);
			}else{
				$_SESSION['available']= False;
			}
		}
	}
	function check_calendar ($day, $job, $username)
	{
        global $conn;
        $_SESSION['available'] = True;
        $sql = "SELECT user_name FROM work_schedule where day = '$day' AND job = '$job' AND user_name = '$username'";
        $result = mysqli_query($conn, $sql);
        if (empty($result))
        {
    	$_SESSION['available'] = False;
        }
	}
	function add_event1 ($date, $time, $event, $info, $username)
	{
		global $conn;
		$sql_i = "UPDATE rink_1_db SET event = '$event', info = '$info', user_name = '$username' WHERE date ='$date' AND time = '$time'";
		run_update($sql_i);
		$_SESSION['event'] = True;
	}
	function add_event2 ($date, $time, $event, $info, $username)
	{
		global $conn;
		$sql_i = "UPDATE rink_2_db SET event = '$event', info = '$info' , user_name = '$username' WHERE date ='$date' AND time = '$time'";
		run_update($sql_i);
		$_SESSION['event'] = True;
	}
	function add_event3 ($date, $time, $event, $info, $username)
	{
		global $conn;
		$sql_i = "UPDATE rink_3_db SET event = '$event', info = '$info', user_name = '$username' WHERE date ='$date' AND time = '$time'";
		run_update($sql_i);
		$_SESSION['event'] = True;
	}
	function delete_event ($id, $ice)
	{
		if($ice=="1")
		{
		global $conn;
		$sql_i = "UPDATE rink_1_db SET event = 'Available', info = 'N/A', user_name = 'NULL' WHERE id ='$id'";
		run_update($sql_i);
		}else if($ice=="2")
		{
		global $conn;
		$sql_i = "UPDATE rink_2_db SET event = 'Available', info = 'N/A', user_name = 'NULL' WHERE id ='$id'";
		run_update($sql_i);
		}else if($ice=="3")
		{
		global $conn;
		$sql_i = "UPDATE rink_3_db SET event = 'Available', info = 'N/A', user_name = 'NULL' WHERE id ='$id'";
		run_update($sql_i);
		}
	}
	function request_day ($day, $username)
	{
		global $conn;
        $sql_i = "UPDATE work_schedule SET blocked = '$username' WHERE day = '$day'";
        run_update($sql_i);
	}
	function add_comment($name, $comment)
	{
		global $conn;
		$sql_i = "INSERT INTO forum(name,comment) VALUES('$name','$comment')";
		run_update($sql_i);
	}
	function do_alert($msg)
{
  echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
}
?>