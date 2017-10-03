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

  <title>HockeyPlex Home</title>
  
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
         
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><span class="caret"></span> <span class="glyphicon glyphicon-user pull-right"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            
            
            <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li class="active" data-toggle="modal"> <a href="logout.php">Logout</a></li>
              <?php }else{ ?>
              <li class="active" data-toggle="modal" data-target="#Login"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-right"></span></a></li>
              <?php } ?>
              <!-- End Trigger-->
            
           
          </ul>
        </li>
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
          <li  data-toggle="modal" data-target=""> <a href="main.php">Create Account</a></li>
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
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                  </div>
                  <div class="item">
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Vipers Vs<br> Tropics</div>
                            </div>
                      </div>
                      <div class="col-xs-2 subcard">
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
      <img src="img/floorplan.jpg" alt="Floor Plan" class="center-block img-rounded"  style="width: 50%; height: 50%">
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
          </form>

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

  <!-- End Invalid Password Modal -->


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
