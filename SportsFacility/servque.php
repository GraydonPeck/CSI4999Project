<?php
# insert session verify
?>

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
						<li class="active"><a href="#">Admin</a></li>
						<li><a href="servlobby.php">Lobby</a></li>
					</ul>
				</div>
			</div>
		</div>
	
		<div class="container">
			<div class="row">
				
				<!-- Trigger New Guest Modal -->

				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#NewUserModal"> New Guest </button>

				<!-- New Guest Modal -->

				<div class="modal fade" id="NewUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<h4 class="modal-title" id="myModalLabel">New Guest</h4>
							</div>
							<div class="modal-body">
								<?php
									echo <<<_END
								<center>
									<form action"servque.php" method="post">
										<input type="hidden" name="serv_ID">
										<table>
											<tr>
												<td>First Name:</td>
												<td><input type="text" name="cust_fname"></td>
											</tr>
											<tr>
												<td>Last Name:</td>
												<td><input type="text" name="cust_lname"></td>
											</tr>
											<tr>
												<td>Skate:</td>
												<td><input type="text" name="skate"></td>
											</tr>
											<tr>
												<td>Service:</td>
												<td>
													<select name="service">
														<option value="eyelets">eyelets</option>
														<option value="7/16">7/16</option>
														<option value="1/2">1/2</option>
														<option value="9/16">9/16</option>
													</select>
												</td>
											</tr>
										</table>
										<input type="hidden" name="serv_progress" value="Waiting">
								</center>
							</div>
							<div class="modal-footer">
								<center>
									<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-primary" value="Submit">Submit</button>
								</center>
									</form>
_END;
								?>
							</div>
						</div>
					</div>
				</div>
				<a href="logout.php"><button class="btn btn-primary" style="float: right;"> Log Out </button></a>
			</div>
			<br>

			<!-- Service Booth table -->

			<div class="row">
				<?php
					require_once 'conn.php';
					$conn = new mysqli($hn, $un, $pw, $db);
					if ($conn->connect_error) die ($conn->connect_error);

					if (isset($_POST['serv_ID'])    &&
						isset($_POST['cust_fname']) &&
						isset($_POST['cust_lname']) &&
						isset($_POST['skate'])      &&
						isset($_POST['service'])    &&
						isset($_POST['serv_progress']))
					{
						$serv_ID       = get_post($conn, 'serv_ID');
						$cust_fname    = get_post($conn, 'cust_fname');
						$cust_lname    = get_post($conn, 'cust_lname');
						$skate         = get_post($conn, 'skate');
						$service       = get_post($conn, 'service');
						$serv_progress = get_post($conn, 'serv_progress');

						$query    = "INSERT INTO serv_que (cust_fname, cust_lname, skate, service, serv_progress) VALUES" . "('$cust_fname', '$cust_lname', '$skate', '$service', '$serv_progress')";

						$result   = $conn->query($query);
						if (!$result) echo "INSERT failed: $query <br>" . $conn->error . "<br><br>";
					}

					if (isset($_POST['delete'])    &&
						isset($_POST['serv_ID']))
					{
						$serv_ID     = get_post($conn, 'serv_ID');
						$query   = "DELETE FROM serv_que WHERE serv_ID='$serv_ID'";
						$result = $conn->query($query);
						if (!$result) echo "DELETE faild: $query<br>" . $conn->error . "<br><br>";
					}

					if (isset($_POST['update'])    &&
						isset($_POST['serv_ID']))
					{
						$serv_ID     = get_post($conn, 'serv_ID');
						$serv_progress    = get_post($conn, 'serv_progress');

						$query = "UPDATE serv_que SET serv_progress='$serv_progress' WHERE serv_ID='$serv_ID'";
						$result = $conn->query($query);
						if (!$result) echo "UPDATE failed: $query<br>" . $conn->error . "<br><br>";
					}

					$query = "SELECT * FROM serv_que ORDER BY FIELD(serv_progress, 'Completed', 'In Progress', 'Waiting')";
					$result = $conn->query($query);
					if (!$result) die($conn->error);

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
							<th><center>Update</center></th>
							<th><center>Remove</center></th>
						</tr>

_END;
				
						for ($j = 0; $j < $rows; ++$j)
						{
							$result->data_seek($j);
							$row = $result->fetch_array(MYSQLI_NUM);
							
					echo <<<_END

						<tr>
							<td>$row[0]</td>
							<td>$row[1]</td>
							<td>$row[2]</td>
							<td>$row[3]</td>
							<td>$row[4]</td>
							<td>$row[5]</td>
							<td>
								<!-- Trigger Update Modal -->

								<center>
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{$row[0]}"> <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
									</button>
								</center>
							
								<!-- UPDATE MODAL -->

								<div class="modal fade" id="UpdateModal{$row[0]}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<h4 class="modal-title" id="myModalLabel">Update Record</h4>
											</div>
											<div class="modal-body">
												<center>
												<form action="servque.php" method="post">
													<br>

													<select name="serv_progress">
														<option value=""> </option>
														<option value="In Progress">In Progress</option>
														<option value="Completed">Completed</option>
													</select>

													<input type="hidden" name="update" value="$row[0]">
													<input type="hidden" name="serv_ID" value="$row[0]">

													<br><br>
													<input type="submit" value="UPDATE">
													<br><br>
												</form>
												</center>
								      		</div>
										</div>
									</div>
								</div>

								<!-- /.UPDATE MODAL -->
							</td>

							<td>
								<form action="servque.php" method="post">
							<input type="hidden" name="delete" value="yes">
							<input type="hidden" name="serv_ID" value="$row[0]">
							<center><button class="btn btn-primary" type="submit" value="REMOVE"><span class="glyphicon glyphicon-remove"></span></button></center></form>
							</td>
						</tr>

_END;
						}

							$result->close();
							$conn->close();

							function get_post($conn, $var)
							{
								return $conn->real_escape_string($_POST[$var]);
							}
						?>
					</table>
				</div>	

		</div>
		
		<script type='text/javascript' src="js/jquery.js"></script>
		<script type='text/javascript' src="js/bootstrap.js"></script>		

	</body>
</html>