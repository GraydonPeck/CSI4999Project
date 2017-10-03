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
 <nav class="navbar navbar-default " >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="main.php">SportPlex</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Schedule<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Events</a></li>
            <li><a href="#">Times/Dates</a></li>
            <li><a href="#">Your Schedule</a></li>
          </ul>
        </li>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pro Shop<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="proshop.php">Pro Shop</a></li>
          <li><a href="#">Items in Cart</a></li>
          <li><a href="#">Searched Items</a></li>
        </ul>
        <li><a href="#">Video's</a></li>
       
        <li><a href="#">About</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-mail"></span></a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <!-- This addes a dropdown menu for the important icons -->
       <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><span class="caret"></span> <span class="glyphicon glyphicon-bell pull-right"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> Notification1 </a></li>
            <li class="divider"></li>
            <li><a href="#">Notification2 </a></li>
            <li class="divider"></li>
            <li><a href="#">Notification3 </a></li>
            <li class="divider"></li>
            
          </ul>
        </li>
       <!-- End of adding dropdown menu --> 
       
        <!--Dropdown for the user icon for differnt options -->
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><span class="caret"></span> <span class="glyphicon glyphicon-user pull-right"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
          <!-- End of drop down for users -->  
            
            <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li class="active" data-toggle="modal"> <a href="logout.php">Logout</a></li>
              <?php }else{ ?>
              <li class="active" data-toggle="modal" data-target="#Login"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-right"></span></a></li>
              <?php } ?>
              <!-- End Trigger-->
            
           
          </ul>
        </li>
     
      <!-- Username display. Displays the username in the upper right corner of the screen. -->
       <?php if(isset($_SESSION['loggedin'])){
          echo "<li><a>" .$_SESSION['login']."</a></li>";?>
          <?php }else{ ?>
          <li  data-toggle="modal" data-target="#Login"> <a href="main.php">Create Account</a></li>
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
<div class="container">
  <div class="panel panel-primary">
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="script.js"></script>  </body>

</html>
