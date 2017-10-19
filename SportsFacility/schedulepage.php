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
        header ("Location: employeepage.php");
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

  <title>HockeyPlex Employee</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <!-- referencing an external style sheet. -->
  <link rel="stylesheet" type="text/css" href="main.css">
</head>

<body>

<!-- This allows the navbar to stay positioned at the top of the screen on scroll -->
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
</nav>


  <div class="jumbotron">
    <center><h1><big>Hockey<strong>Plex</strong></big></h1></center>
   <center> <h2>This is the schedule page</h2></center>
    <center><p>This is where user will have the ability to schedule events</p></center>


  </div>

  <div class="col-md-6" style="padding-top:10px;">
      <div class="panel panel-primary">
          <div class="panel-heading">Ice One </div>
          <div class="panel-body">
            <div id="calendar" class="col-md-6">
              <table>
      						<tr class="header-days">
      							<td class="header-day">S</td>
      							<td class="header-day">M</td>
      							<td class="header-day">T</td>
      							<td class="header-day">W</td>
      							<td class="header-day">T</td>
      							<td class="header-day">F</td>
      							<td class="header-day">S</td>
          				</tr>
          				<tbody>
      				    	<tr>
      					    	<td class="day">
      					    		<div class="day-contents">01</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">02</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">03</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">04</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">05</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">06</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">07</div>
      					    	</td>
      				    	</tr>
      				    	<tr>
      					    	<td class="day">
      					    		<div class="day-contents">08</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">09</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">10</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">11</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">12</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">13</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">14</div>
      					    	</td>
      				    	</tr>
      				    	<tr>
      					    	<td class="day">
      					    		<div class="day-contents">15</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">16</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">17</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">18</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">19</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">20</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">21</div>
      					    	</td>
      				    	</tr>
      				    	<tr>
      					    	<td class="day">
      					    		<div class="day-contents">22</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">23</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents active">24</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">25</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">26</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">27</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">28</div>
      					    	</td>
      				    	</tr>
      				    	<tr>
      					    	<td class="day">
      					    		<div class="day-contents">29</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">30</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">01</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">02</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">03</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">04</div>
      					    	</td>
      					    	<td class="day">
      					    		<div class="day-contents">05</div>
      					    	</td>
      				    	</tr>
          				</tbody>
        			</table>
        			</div>
        			<div id="ScheduleTimes" class="col-md-4">
                <table>
                  <tr>
                    <td><span class="glyphicon glyphicon-th-list"></span> 8:30 Vipers Vs Tropics</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-th-list"></span> 9:30 Vipers Vs Tropics</td>
                  </tr>
                  <tr>
                    <td><span class="glyphicon glyphicon-th-list"></span> 10:30 Vipers Vs Tropics</td>
                  </tr>
                </table>
            </div>

          </div>
      </div>
  </div>




<!--Login Modal -->

  <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Login</h4>
        </div>
        <div class="modal-body">

          <center>
          <form action = "checklogin.php" method="post">
                                <input type="hidden" name="User_number">
          <table>
          <tr>
          <td>Username:</td>     <td><input type="text" name="username"></td>
          </tr>
          <tr>
          <td>Password:</td>     <td><input type="password" name="passwd"></td>
          </tr>
          </table>

          </center>
        </div>
        <div class="modal-footer">
          <center>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" value="ADD RECORD">Submit</button>
          </center>
        </div>
      </div>
    </div>
  </div>

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
    <script src="script.js"></script>


</html>
