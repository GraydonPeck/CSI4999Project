<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
     if (count($_POST))
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_user ($_POST['User_name'], $_POST['User_password'], $_POST['User_email'], $_POST['user_type']);
        header ("Location: main.php");
    }
?>

<!-- Test -->
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
<!-- This is the creation of the navbar on the page for signing up or loging in -->
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
      <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>
</ul>


	    <ul class="nav navbar-nav navbar-right">
	      <ul class="nav navbar-nav">
    <!--Styled the navbar drop down so it has different sections. Settings drop down -->
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Settings <span class="caret"></span><span class="glyphicon glyphicon-cog pull-left"></span></a>
        <ul class="dropdown-menu">
			<li class="dropdown-header">Settings</li>
            <li><a href="#"> Help <span class="glyphicon glyphicon-search"></span></a></li>
            <li class="divider"></li>
             <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>

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
       <?php if(isset($_SESSION['loggedin'])){
          echo "<li><a>" .$_SESSION['login']."</a></li>";?>
          <?php }else{ ?>
          <li data-toggle="modal" data-target="#Login"><a href="main.php"></a></li>
           <?php } ?>

      <!--End of username display -->
      </ul>
    </div>
  </div>
</nav>
<!--end of the creation of the nav bar element -->
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
                  <input type="hidden" name="user_type" value="customer">
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
                                <input type="hidden" name="user_number">
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
