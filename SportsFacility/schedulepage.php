<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
  if ($_SESSION['event'])
 {
   echo "<script> alert('Thank you for booking an event! We will contact you shortly to confirm.');</script>";
   $_SESSION['event'] = False;
 }
 if ($_POST['hidden']==1)
{

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_event1 ($_POST['date'], $_POST['time'], $_POST['event'], $_POST['info'], $_POST['username']);
        header ("Location: schedulepage.php");
    }
    if ($_POST['hidden2']==2)
{
	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_event2 ($_POST['date'], $_POST['time'], $_POST['event'], $_POST['info'], $_POST['username']);
        header ("Location: schedulepage.php");
    }
    if ($_POST['hidden3']==3)
{
	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_event3 ($_POST['date'], $_POST['time'], $_POST['event'], $_POST['info'], $_POST['username']);
        header ("Location: schedulepage.php");
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
  <!-- Button used for going to the top of the page -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!-- End of Button -->

  <div class="col-md-6" style="padding-top:10px;">
      <div class="panel panel-primary">
          <div class="panel-heading">Ice One </div>
          <div class="panel-body">
                  <div class="datepicker"></div>
                  <form method="post" action="schedulepage.php">
                    <p>Select a day: <input type="text" id="datepicker" name="date1"></p>
                     <input type="hidden" value="1" name="hidden1"/>
                    <input type="submit" value="Load Times" name="submit"/>
                  </form>
                </div>
        			  <div class="TableWrap">
        			  <table class = "table">
        			  <?php
        			  if  ($_POST['hidden1']==1){
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date1 = $_POST['date1'];
                echo "<center><h3> ". $date1 . "</h3></center>";
                $sql = "SELECT * FROM rink_1_db WHERE date = '$date1'";
                $result = mysqli_query($db, $sql);
                if (mysqli_fetch_array($result)!=0)
                {
                 ?>
                  <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php }
                  ?><a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Event1" href="#">Schedule an event</a>
                <?php } else{
                ?>
                <center>
                <p>We do not have this far planned out yet please check again later</p>
                </center>
                <?php }}else
                {
                  $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date1 = "12/01/2017";
                echo "<center><h3> ". $date1 . "</h3></center>";
                $sql = "SELECT * FROM rink_1_db WHERE date = '$date1'";
                $result = mysqli_query($db, $sql);
                if (mysqli_fetch_array($result)!=0)
                {
                 ?>
                  <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php }
                  ?><a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Event1" href="#">Schedule an event</a>
                <?php }}?>
                </table>
          </div>
          </div>
      </div>
  </div>

  <div class="col-md-6" style="padding-top:10px;">
      <div class="panel panel-primary">
          <div class="panel-heading">Ice Two </div>
          <div class="panel-body">
                  <div class="datepicker"></div>
                  <form method="post" action="schedulepage.php">
                    <p>Select a day: <input type="text" id="datepicker" name="date1"></p>
                     <input type="hidden" value="1" name="hidden1"/>
                    <input type="submit" value="Load Times" name="submit"/>
                  </form>
                </div>
        			  <div class="TableWrap">
        			  <table class = "table">
        			  <?php
        			  if  ($_POST['hidden1']==2){
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date2 = $_POST['date2'];
                echo "<center><h3> ". $date2 . "</h3></center>";
                $sql = "SELECT * FROM rink_2_db WHERE date = '$date2'";
                $result = mysqli_query($db, $sql);
                if (mysqli_fetch_array($result)!=0)
                {
                 ?>
                  <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php }
                  ?><a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Event2" href="#">Schedule an event</a>
                <?php } else{
                ?>
                <center>
                <p>We do not have this far planned out yet please check again later</p>
                </center>
                <?php }}else
                {
                  $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date2 = "12/01/2017";
                echo "<center><h3> ". $date2 . "</h3></center>";
                $sql = "SELECT * FROM rink_2_db WHERE date = '$date2'";
                $result = mysqli_query($db, $sql);
                if (mysqli_fetch_array($result)!=0)
                {
                 ?>
                  <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php }
                  ?><a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Event2" href="#">Schedule an event</a>
                <?php }}?>
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
                <input type="hidden" value="3" name="hidden1"/>
                <input type="submit" value="Load Times" name="submit"/>

              </form>
        			  <div class="TableWrap">
        			  <table class = "table">
        			  <?php
        			  if ($_POST['hidden1']==3){
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date3 = $_POST['date3'];
                echo "<center><h3> ". $date3 . "</h3></center>";
                $sql = "SELECT * FROM rink_3_db WHERE date = '$date3'";
                $result = mysqli_query($db, $sql);
                if (mysqli_fetch_array($result)!=0)
                {
                ?>
                <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
              while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php }
                  ?><a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Event3" href="#">Schedule an event</a>
                <?php  } else{
                ?>
                <center>
                <p>We do not have this far planned out yet please check again later</p>
                </center>
                <?php }} else{
                  $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $date3 = "12/01/2017";
                echo "<center><h3> ". $date3 . "</h3></center>";
                $sql = "SELECT * FROM rink_3_db WHERE date = '$date3'";
                $result = mysqli_query($db, $sql);
                if (mysqli_fetch_array($result)!=0)
                {
                ?>
                <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
              while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:12px;font-weight:bold;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php }
                  ?><a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Event3" href="#">Schedule an event</a>
                <?php  }}
                ?>
                </table>
          </div>
</div>
        </div>


      </div>







      <!--Event Modal1-->
      <div class="modal fade" id="Event1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="Defaultmodal-container">
  					<h1>Schedule an event</h1>
              <center>
              <form action ="schedulepage.php" method="post">
              <table>
                 <tr><th>Date:</th>
                <td><input type= "text" name="date" value="<?php echo $date1 ?>"></td></tr>
              <tr><th>Time:</th>
                          <td><label class="custom-select"><select name ="time" class="form-control">
                            <option disabled selected value>- select a time -</option>
                               <?php
                            $db = mysqli_connect("localhost","gpeck2217","","c9");
                            $username = $_SESSION['login'];
                             $customer = check_login_type($username);
                             if ($customer)
                            {
                            $sql = "SELECT * FROM rink_1_db WHERE date = '$date1' AND event = 'available'";
                            }
                            else
                            {
                            $sql = "SELECT * FROM rink_1_db WHERE date = '$date1'";
                            }
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result)){
                		        	?>
                            <option value = "<?php echo $row['time']?>"><?php echo $row['time']?></option>
                           	<?php
                          		}
                          	?></select></label></td></tr>
                          	<tr><th>Event:</th>
                          	<td><input type= "text" name="event" value="<?php echo $row['event']?>"></td></tr>
                          	<tr><th>Extra Info:</th>
                          	<td><input type= "text" name="info" value="<?php echo $row['info']?>"></td></tr>
                          	<input type="hidden" name="hidden" value ="1">
                          	<input type="hidden" name="username" value = "<?php echo $_SESSION['login']?>">
                      </table>
                      </center>
                    <input type="submit" class="login loginmodal-submit" value="Submit">
                    </div>
                    </div>
                  </div>
      </form>


      <!--End of event modal1-->
      <div class="modal fade" id="Event2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="Defaultmodal-container">
  					<h1>Schedule an event</h1>
              <center>
              <form action ="schedulepage.php" method="post">
              <table>
                 <tr><th>Date:</th>
                <td><input type= "text" name="date" value="<?php echo $date2 ?>"></td></tr>
              <tr><th>Time:</th>
                          <td><label class="custom-select"><select name ="time" class="form-control">
                            <option disabled selected value>- select a time -</option>
                               <?php
                            $db = mysqli_connect("localhost","gpeck2217","","c9");
                            $username = $_SESSION['login'];
                             $customer = check_login_type($username);
                             if ($customer)
                            {
                            $sql = "SELECT * FROM rink_2_db WHERE date = '$date2' AND event = 'available'";
                            }
                            else
                            {
                            $sql = "SELECT * FROM rink_2_db WHERE date = '$date2'";
                            }
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result)){
                		        	?>
                            <option value = "<?php echo $row['time']?>"><?php echo $row['time']?></option>
                           	<?php
                          		}
                          	?></select></label></td></tr>
                          	<tr><th>Event:</th>
                          	<td><input type= "text" name="event" value="<?php echo $row['event']?>"></td></tr>
                          	<tr><th>Extra Info:</th>
                          	<td><input type= "text" name="info" value="<?php echo $row['info']?>"></td></tr>
                          	<input type="hidden" name="hidden2" value ="2">
                          	<input type="hidden" name="username" value = "<?php echo $_SESSION['login']?>">
                      </table>
                    <input type="submit" class="login loginmodal-submit" value="Submit">
                      </form>
                    </div>
                  </div>
                </div>


      <!--End of event modal2-->
      <div class="modal fade" id="Event3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="Defaultmodal-container">
  					<h1>Schedule an event</h1>
              <center>
              <form action ="schedulepage.php" method="post">
              <table>
                 <tr><th>Date:</th>
                <td><input type= "text" name="date" value="<?php echo $date3 ?>"></td></tr>
              <tr><th>Time:</th>
                          <td><label class="custom-select"><select name ="time" class="form-control">
                            <option disabled selected value>- select a time -</option>
                               <?php
                            $db = mysqli_connect("localhost","gpeck2217","","c9");
                            $username = $_SESSION['login'];
                            $customer = check_login_type($username);
                             if ($customer)
                            {
                            $sql = "SELECT * FROM rink_3_db WHERE date = '$date3' AND event = 'available'";
                            }
                            else
                            {
                            $sql = "SELECT * FROM rink_3_db WHERE date = '$date3'";
                            }
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result)){
                		        	?>
                            <option value = "<?php echo $row['time']?>"><?php echo $row['time']?></option>
                           	<?php
                          		}
                          	?></select></label></td></tr>
                          	<tr><th>Event:</th>
                          	<td><input type= "text" name="event" value="<?php echo $row['event']?>"></td></tr>
                          	<tr><th>Extra Info:</th>
                          	<td><input type= "text" name="info" value="<?php echo $row['info']?>"></td></tr>
                          	<input type="hidden" name="hidden3" value ="3">
                          	<input type="hidden" name="username" value = "<?php echo $_SESSION['login']?>">
                      </table>
                      </center>
                      <input type="submit" class="login loginmodal-submit" value="Submit">
                    </div>
                  </div>
                </div>
      </form>
      <!--End of event modal3-->

<div id="wrapper" style="width:100%;">
		<div id="header">

		  <h2>Contact Information</h2>

		  <hr class="style-seven">
		</div>
		<div id="content">



    <div class="container">
      <center>
  <button onclick="location.href = 'aboutpage.php#comment1';" id="myButton" class="button button1" >Message Us</button>  </div>
  </center>
		</div>

		<div id="footer">
		  <center>

		    <p class="sansserif"><strong>Address:</strong> <i>318 Meadow Brook Rd, Rochester MI 48309</i></p>
        <p class="sansserif"><strong>Phone Number:</strong><i> (248) 370-2100</i></p>
        <p class="sansserif"><strong>Email: </strong><i>mpdegraeve@oakland.edu</i></p>
      </center>
    </div>
  </div>
</div>
  </div>
</div>


<script>
     // When the user scrolls down 700px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 700 || document.documentElement.scrollTop > 700) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
      <script>
        $( function() {
          $( "#datepicker" ).datepicker();
          $( "#datepicker2" ).datepicker();
          $( "#datepicker3" ).datepicker();
        } );

      </script>
    <!-- <script src="../../dist/js/bootstrap.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
    <script src="script.js"></script>


</html>
