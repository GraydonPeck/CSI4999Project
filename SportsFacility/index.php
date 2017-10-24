<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
 $username = $_POST['username'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
    <script src="script.js"></script>

  <title>HockeyPlex Home</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->
  <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
  <script type = "text/javascript" src = "chk.js"></script>
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
               <li><a href="servcust.php">Service Center<span class="badge pull-left"></span></a></li>
                </ul>
                </li>
        <?php }else{ ?>
         <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ProShop</span><span class="caret"></span> <span class="glyphicon glyphicon-piggy-bank pull-left"></span></a>
        <ul class="dropdown-menu">
			       <li class="dropdown-header">Proshop</li>
			         <li><a href="main.php">Proshop <span class="badge pull-left"></span></a></li>
               <li><a href="servcust.php">Service Center<span class="glyphicon glyphicon-stats pull-left"></span></a></li>
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
</nav>

  <div>
    <div class="jumbotron">
      <h1><center><big>Hockey<strong>Plex</strong></big></center></h1>
    </div>
    <!-- Schedule Carousel -->
    <div id="myCarousel" class="carousel fdi-Carousel slide">
          <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
              <div class="carousel-inner onebyone-carosel">
                  <div class="item active">
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30 </div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2  subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                  </div>
                  <div class="item">
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2  subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-md-2 col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                  </div>

              </div>
              <a class="left carousel-control" href="#eventCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#eventCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
          <!--/carousel-inner-->
      </div><!--/schedulecarousel-->

    </div>
    <!--/Floorplan-->
    <div class="col-md-12" style="padding-top:15px">
      <img src="img/floorplan.jpg" alt="Floor Plan" class="center-block img-rounded map" hidefocus="true" usemap="#FloorMap">
      <map name="FloorMap" id="Map">
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal" shape="poly" coords="381,36,378,323,563,323,565,35" />
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal" shape="poly" coords="270,178,270,46,33,46,33,146,42,154,45,180" />
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal" shape="poly" coords="45,183,273,183,270,315,34,314,31,215" />
      </map>
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
        </form>
      </div>
    </div>
  </div>


  <!-- End Login Modal -->


  <!-- Invalid Password Modal -->
  <div class="modal fade" id="invalidPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <center><h4 class="modal-title" id="myModalLabel">Invalid Password</h4></center>
          </div>
          <div class="modal-body">
            <center>
            <b> Invalid Password, Please try again.</b>
            </center>
          </div>
          <div class="modal-footer">
            <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Okay</button>
            </center>
          </div>
            </form>

    </div>
    </div>
    </div>

  <!-- End Invalid Password Modal -->
 <!--Floor Plan Modal -->
   <div class="modal fade" id="ScheduleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Schedule</h4>
        </div>
        <div class="modal-body">

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
  <!-- End Login Modal -->
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


</html>
