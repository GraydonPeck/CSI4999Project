<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
       if (count($_POST))
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_user ($_POST['User_name'], $_POST['User_password'], $_POST['User_email'], $_POST['user_type']);
        edit_employee ($_POST['User_name'], $_POST['employee_fname'], $_POST['employee_lname'], $_POST['employee_type'], $_POST['employee_phone']);
        header ("Location: managerpage.php");
    }
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HockeyPlex Manager</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">


</head>

<body>
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
        <li><a href="schedulepage.php">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></a></li>
        <li><a href="proshop.php">Pro Shop<span class="glyphicon glyphicon-piggy-bank pull-left"></span></a><li>
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
            </ul>
          </li>

      <!-- End of settings dropdown -->

        <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li  data-toggle="modal"> <a href="logout.php">Logout<span class="glyphicon glyphicon-user pull-left"></span></a></li>
              <?php }else{ ?>
              <li  data-toggle="modal" data-target="#Login"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-left"></span></a></li>
              <?php } ?>
              <!-- End Trigger-->

        <!-- Username display -->
              <?php if(isset($_SESSION['loggedin'])){
              echo "<li><a>" .$_SESSION['login']."</a></li>";?>
              <?php }else{ ?>

              <?php } ?>

        <!--End of username display -->

        </ul>
    </div>
  </div>
</nav>
<div class="jumbotron">
  <h1><big>Hockey<strong>Plex</strong></big></h1>
  <h2>This is the Manger page</h2>
</div>
<!--Timesheet table -->
<div class="container" style="padding-top:10px;">
  <div class="panel panel-primary" >
            <div class="panel-heading">
                <h1 class="panel-title"><big>Timesheet</big></h1>

                <button class="btn btn-default pull-right">Submit Changes</button>
                <div class="clearfix"></div>
            </div>
            <table class="table">
              <tr>
                        <th></th>
                        <th>Monday</th>
                        <th>Tuesday</th>
                        <th>Wednesday</th>
                        <th>Thursday</th>
                        <th>Friday</th>
                        <th>Saturday</th>
                        <th>Sunday</th>
                    </tr>
                <tbody>
                    <tr>
                        <th>Concessions</th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                           while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?>
                        	</select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                          <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?>
                        	</select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                          <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?>
                        	</select>
                        </th>
                        <th><select class="form-control">
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?>
                        	</select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                         while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                         while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                    </tr>
                    <tr>
                        <th>Pro Shop</th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                         while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                           <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                            <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                            <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                            <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                    </tr>
                    <tr>
                        <th>Service Center</th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                            <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                        <th><select class="form-control">
                          <option disabled selected value>- select an employee -</option>
                             <?php
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                          $username = $_SESSION['login'];
                          $sql = "SELECT * FROM employee_db WHERE employee_type = 'employee'";
                          $result = mysqli_query($db, $sql);
                          while ($row = mysqli_fetch_array($result)){
              		        	?>
                          <option><?php echo $row['user_name']?></option>
                         	<?php
                        		}
                        	?></select>
                        </th>
                    </tr>
                </tbody>
            </table>
              <div>
                  </div>
                  </div>

    <!-- This is where the customer enters added information to their accounts. -->
    <div class = "container info">
      <center>
         <form id="#formSection" method="post" class="employeeedit-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">
      <table class = "">
        <th>Add New User</th>
          <tr>
          <td>Username:</td><td><input type="text" name="User_name"></td>
          </tr>
          <tr>
          <td>Password:</td><td><input type="password" name="User_password"></td>
          </tr>
          <input type="hidden" name="user_type" value="employee">
        <tr>
          <td>First Name</td> <td><input type="text" name="employee_fname"></td>
        </tr>
        <tr>
          <td>Last Name</td> <td><input type="text" name="employee_lname"></td>
        </tr>
         <tr>
          <td>Admin?</td>
         <td> <input type="radio" name = "employee_type" value="admin">Yes</input>
          <input type="radio" name = "employee_type" value="employee">No</input></td>
        </tr>
        <tr>
          <td>Phone Number</td> <td><input type="text" name="employee_phone"></td>
        </tr>
        <tr>
          <td>Email</td> <td><input type="email" name="User_email"></td>
        </tr>
     </center>
      </table>
     <center>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
         <input type="submit" id="submitSection" class="btn btn-primary" value="Submit">
     <center>
       </form>
    </div>

 </body>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="script.js"></script>

</html>
