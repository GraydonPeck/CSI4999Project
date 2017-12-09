<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
  if ($_SESSION['bad'])
 {
   echo "<script> alert('Username or Password incorrect please try again.');</script>";
   $_SESSION['bad'] = False;
 }
     if (count($_POST))
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_user ($_POST['User_name'], $_POST['User_password'], $_POST['User_email'], $_POST['user_type']);
        add_customer($_POST['User_name']);
        header ("Location: main.php");
    }
if ($_SESSION['redirect'])
{
    echo "<script> alert('Please sign in to view this content.');</script>";
    $_SESSION['redirect'] = False;
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

  <title>HockeyPlex</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script type = "text/javascript" src = "chk.js"></script>
  <script type = "text/javascript" src="script.js"></script>
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


	    <!-- This is a dropdown menu that contains the settings for our site. Add additional information here later -->
        <ul class="nav navbar-nav navbar-right">


         <ul class="nav navbar-nav navbar-right">



              <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li  data-toggle="modal"> <a href="logout.php">Logout<span class="glyphicon glyphicon-user pull-left"></span></a></li>
              <?php }else{ ?>
              <li  data-toggle="modal" data-target="#login-modal"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-left"></span></a></li>
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

<!-- Button used for going to the top of the page -->
    <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
    <!-- End of Button -->

  <div class="intro-section">
    <div class="container info">
      <h1><big>Hockey<strong>Plex</strong></big></h1>
      <p><a class="button cta" href="#submitSection" role="button">Get started today</a></p>
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
        <input type="submit" id="submitSection" class="login loginmodal-submit" value="Submit">
        </center>
    </form>
  </div>

  <!--Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      	  <div class="modal-dialog">
  				<div class="loginmodal-container">
  					<h1>Login to Your Account</h1><br>
  				  <form action = "checklogin.php" method="post">
  				    <input type="hidden" name="User_number">
  					<input type="text" name="username" placeholder="Username">
  					<input type="password" name="passwd" placeholder="Password">
  					<input type="submit" name="login" class="login loginmodal-submit" value="Login">
  				  </form>
  				</div>
  			</div>
  		  </div>


  <!-- End Login Modal -->
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


</body>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
