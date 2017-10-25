<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
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
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ProShop</span><span class="caret"></span> <span class="glyphicon glyphicon-piggy-bank pull-left"></span></a>
        <ul class="dropdown-menu">
			       <li class="dropdown-header">Proshop</li>
			         <li><a href="proshop.php">Proshop <span class="badge pull-left"></span></a></li>
               <li><a href="servcust.php">Service Center<span class="badge pull-left"></span></a></li>
                </ul>
                </li>
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



  </div>

  <div class="col-md-6" style="padding-top:10px;">
      <div class="panel panel-primary">
          <div class="panel-heading">Ice One </div>
          <div class="panel-body">
            <div id="calendar" class="col-md-6">
              <div class="calendar" class="col-md-6">
              <div class="datepicker"></div>
              <form method="post" action="schedulepage.php">
                <p>Select a day: <input type="text" name="date1" id="datepicker"></p>

                <input type="submit" value="Load Times" name="submit"/>

              </form>
            </div>
        			</div>
        			<div id="ScheduleTimes" class="col-md-4">
        			  <table>
        			  <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date1 = $_POST['date1'];
                echo $date1;
                $sql = "SELECT * FROM rink_1_db WHERE date = '$date1'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td><span class="glyphicon glyphicon-th-list"></span><?php echo "Time: " . $row['time']. " Event: " . $row['event']. " Info: " . $row['info']; ?></td>
                </tr>
                <?php } ?>
                </table>
            </div>
          </div>
      </div>
  </div>

  <div class="col-md-6" style="padding-top:10px;">
      <div class="panel panel-primary">
          <div class="panel-heading">Ice Two </div>
          <div class="panel-body">
            <div id="calendar" class="col-md-6">
              <div class="calendar" class="col-md-6">
              <div class="datepicker"></div>
              <form method="post" action="schedulepage.php">
                <p>Select a day: <input type="text" name="date2" id="datepicker2"></p>

                <input type="submit" value="Load Times" name="submit"/>

              </form>
            </div>
        			</div>
        			<div id="ScheduleTimes" class="col-md-4">
        			  <table>
        			  <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date2 = $_POST['date2'];
                echo $date2;
                $sql = "SELECT * FROM rink_2_db WHERE date = '$date2'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td><span class="glyphicon glyphicon-th-list"></span><?php echo "Time: " . $row['time']. " Event: " . $row['event']. " Info: " . $row['info']; ?></td>
                </tr>
                <?php } ?>
                </table>
            </div>
          </div>
      </div>
  </div>

  <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">Ice Three </div>
            <div class="panel-body">
              <div class="calendar" class="col-md-6">
                <div class="datepicker"></div>
              <form method="post" action="schedulepage.php">
                <p>Select a day: <input type="text" name="date3" id="datepicker3"></p>

                <input type="submit" value="Load Times" name="submit"/>

              </form>
            </div>
        			</div>
        			<div id="ScheduleTimes" class="col-md-4">
        			  <table>
        			  <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date3 = $_POST['date3'];
                echo $date3;
                $sql = "SELECT * FROM rink_3_db WHERE date = '$date3'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td><span class="glyphicon glyphicon-th-list"></span><?php echo "Time: " . $row['time']. " Event: " . $row['event']. " Info: " . $row['info']; ?></td>
                </tr>
                <?php } ?>
                </table>
            </div>
          </div>
      </div>
  </div>


</div>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
        $( function() {
          $( "#datepicker" ).datepicker();
          $( "#datepicker2" ).datepicker();
          $( "#datepicker3" ).datepicker();
        } );
      </script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="script.js"></script>


</html>
