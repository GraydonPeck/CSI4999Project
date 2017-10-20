<!doctype html>
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

		
		<div class="navbar navbar-inverse navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="#"> HockeyPlex</a>
					<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse navHeaderCollapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
						<li><a href="servque.php">Admin</a></li>
						<li class="active"><a href="#">Lobby</a></li>
					</ul>
				</div>
			</div>
		</div>


		<!-- END NAV BAR -->


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