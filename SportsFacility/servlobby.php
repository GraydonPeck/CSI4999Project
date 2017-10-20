<!doctype html>
<?php
 include("dbutils.php");
 session_start();
 $username = $_POST['username'];
?>
<html>
	<head>

		<title>Service Booth | HockeyPlex</title>
		<meta name="viewport" contect="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  		<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

  		<script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  		<script type = "text/javascript" src = "chk.js"></script>

  		<link rel="stylesheet" type="text/css" href="main.css">

	</head>

	<body>

		<!-- BEGIN NAV BAR -->
		<nav class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="197">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">HockeyPlex</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home<span class="glyphicon glyphicon-home pull-left"></span></button></a></li>
         <?php if(isset($_SESSION['loggedin'])){ ?>
        <li><a href="schedulepage.php">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></a></li>
         <?php }else{ ?>
         <li><a href="main.php">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></a></li>
         <?php }
         if(isset($_SESSION['loggedin'])){ ?>
          <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ProShop</span><span class="caret"></span> <span class="glyphicon glyphicon-piggy-bank pull-left"></span></a>
        <ul class="dropdown-menu">
			       <li class="dropdown-header">Proshop</li>
			         <li><a href="proshop.php">Proshop <span class="badge pull-left"></span></a></li>
               <li><a href="servlobby.php">Service Center<span class="badge pull-left"></span></a></li>
                </ul>
                </li>
        <?php }else{ ?>
         <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ProShop</span><span class="caret"></span> <span class="glyphicon glyphicon-piggy-bank pull-left"></span></a>
        <ul class="dropdown-menu">
			       <li class="dropdown-header">Proshop</li>
			         <li><a href="main.php">Proshop <span class="badge pull-left"></span></a></li>
               <li><a href="servlobby.php">Service Center<span class="glyphicon glyphicon-stats pull-left"></span></a></li>
                </ul>
                </li>
         <?php } ?>
        <li><a href="videopage.php">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></a></li>
        <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>
      </ul>


	    <!-- This is a dropdown menu that contains the settings for our site. Add additional information here later -->
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings</span><span class="caret"></span> <span class="glyphicon glyphicon-cog pull-left"></span></a>
           <ul class="dropdown-menu">
			       <li class="dropdown-header">Options</li>
			         <li><a href="#">Messages <span class="badge pull-left"> 42 </span></a></li>
               <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-left"></span></a></li>
               <li><a href="#"> Help <span class="glyphicon glyphicon-flag pull-left"></span></a></li>
               <li class="divider"></li>
               <li class="dropdown-header">Navigation</li>
               <li><a href="#">Profile<span class="glyphicon glyphicon-user pull-left"></span></a></li>

      <!-- End of settings dropdown -->



          </ul>
      </li>
    <!--End of setting dropdown menu -->

         <ul class="nav navbar-nav navbar-right">



            <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li  data-toggle="modal"> <a href="logout.php">Logout<span class="glyphicon glyphicon-user pull-left"></span></a></li>
              <?php }else{ ?>
              <li  data-toggle="modal" data-target="#Login"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-left"></span></a></li>
              <?php } ?>
            <!-- End Trigger-->

           <!-- Username display -->
       <?php
       $username= $_SESSION['login'];
      $customer = check_login_type($username);
      $admin = check_admin($username);
       if(isset($_SESSION['loggedin'])){
          if ($customer)
          {
          echo "<li><a href='customerpage.php'>" .$_SESSION['login']. "</a> </li>";
          } else {
            if($admin)
            {
          echo "<li><a href='managerpage.php'>" .$_SESSION['login']. "</a> </li>";
           } else {
          echo "<li><a href='employeepage.php'>" .$_SESSION['login']. "</a> </li>";
           }
           } }else{ ?>
          <li  data-toggle="modal" data-target=""> <a href="main.php">Create Account<span class="glyphicon glyphicon-book pull-left"></span></a></li>
           <?php } ?>

      <!--End of username display -->

      </ul>
    </div>
  </div>
</nav>		<!-- END NAV BAR -->
<br>
<br>
<br>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<center>
						<?php
							header('refresh: 5');
							require_once 'conn.php';
							$conn = new mysqli($hn, $un, $pw, $db);
							if ($conn->connect_error) die ($conn->connect_error);

							$query = "SELECT * FROM serv_que ORDER BY FIELD(serv_progress, 'Completed', 'In Progress', 'Waiting')";
							$result = $conn->query($query);
							if (!$result) die ("Database access failed: " . $conn->error);

							$rows = $result->num_rows;

							echo <<<_END
								<table class="table table-striped">
									<tr>
										<th>Service #</th>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Skate</th>
										<th>Service</th>
										<th>Progress</th>
									</tr>
_END;

							for ($j = 0; $j < $rows; ++$j)
							{
								$result->data_seek($j);
								$row = $result->fetch_array(MYSQLI_NUM);

								echo "<tr>";

								echo <<<_END
									<td>$row[0]</td>
									<td>$row[1]</td>
									<td>$row[2]</td>
									<td>$row[3]</td>
									<td>$row[4]</td>
									<td>$row[5]</td>
_END;

								echo "</tr>";
							}

							echo "</table>";

							$result->close();
							$conn->close();

							function get_post($conn, $var)
							{
								return $conn->real_escape_string($_POST[$var]);
							}
						?>
					</center>
				</div>
			</div>
		</div>

		<script type='text/javascript' src="js/jquery.js"></script>
		<script type='text/javascript' src="js/bootstrap.js"></script>

	</body>
</html>