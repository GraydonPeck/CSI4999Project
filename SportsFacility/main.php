<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HockeyPlex</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">


</head>

<body>
 <div>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>
      <ul class="nav navbar-nav" id="login-dp" >
            <!-- Trigger Login Modal -->
              <li class="active" data-toggle="modal" data-target="#Login"> <a href="#">Login</a></li>
              <!-- End Trigger-->
              <li><a href="home.php"><span class="glyphicon glyphicon-home"></span></a></li>
       </ul>
    </nav>

  <div class="intro-section">
    <div class="container info">
      <h1><big>Hockey<strong>Plex</strong></big></h1>
      <p><a class="btn btn-lg btn-success cta" href="#submitSection" role="button">Get started today</a></p>
    </div>
  </div>

  <div id="signup-section">
    <h1 class="singuptitle">Sign Up Here</h1>
    <form id="#formSection" method="post" class="signup-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">


        <input type="text" name="User_name" id="username" placeholder="Username:">
        <input type="password" name="User_password" id="inputPassword" placeholder="Password">
        <input type="email" name="User_email" id="email-address" placeholder="Email address">
        <center>
        <input type="submit" id="submitSection" class="btn btn-primary" value="Submit">
        </center>
    </form>
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
    <script src="script.js"></script>
  </body>

</html>
