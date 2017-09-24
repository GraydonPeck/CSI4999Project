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

  <title>HockeyPlex Home</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">


</head>

<body>
 <div>
  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>
      <ul class="nav navbar-nav" id="login-dp" >
            <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li class="active" data-toggle="modal"> <a href="logout.php">Logout</a></li>
              <?php }else{ ?>
              <li class="active" data-toggle="modal" data-target="#Login"> <a href="#">Login</a></li>
              <?php } ?>
              <!-- End Trigger-->
              <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
          <!-- Username display -->
          <?php if(isset($_SESSION['loggedin'])){
          echo "<li><a>" .$_SESSION['login']."</a></li>";?>
          <?php }else{ ?>
          <li class="active" data-toggle="modal" data-target="#Login"> <a href="main.php">Create Account</a></li>
           <?php } ?>
      </ul>
       </div>
    </nav>

  <div class="home-section">
    <div class="jumbotron">
      <h1><center><big>Hockey<strong>Plex</strong></big></center></h1>
    </div>
    <!-- Schedule Carousel -->
    <div id="myCarousel" class="carousel fdi-Carousel slide">
          <div class="carousel fdi-Carousel slide" id="eventCarousel" data-interval="0">
              <div class="carousel-inner onebyone-carosel">
                  <div class="item active">
                      <div class="col-xs-3 subcard">
                            <div class="panel panel-info">
                              <div class="panel-heading">Ice 3 9:30</div>
                              <div class="panel-body">Panel Content</div>
                            </div>
                      </div>
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">2</div>
                      </div>
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">3</div>
                      </div>
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">4</div>
                      </div>
                  </div>
                  <div class="item">
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">5</div>
                      </div>
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">6</div>
                      </div>
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">7</div>
                      </div>
                      <div class="col-xs-3">
                          <a href="#"><img src="http://placehold.it/250x250" class="img-responsive center-block"></a>
                          <div class="text-center">8</div>
                      </div>
                  </div>

              </div>
              <a class="left carousel-control" href="#eventCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#eventCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
          <!--/carousel-inner-->
      </div><!--/schedulecarousel-->
      
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
