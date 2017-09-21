<!DOCTYPE html>

<html lang="en">
<?php
 include("dbutils.php");
 session_start();
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HockeyPlex Customer</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">


</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
      </button>
    </div>
    <ul class="nav navbar-nav" id="login-dp" >
            <!-- Trigger Login Modal -->
              <li class="active" data-toggle="modal" data-target="#Login"> <a href="logout.php">Logout</a></li>
              <!-- End Trigger-->
              <li><a href="home.php"><span class="glyphicon glyphicon-home"></span></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
          <!-- Username display -->
          <?php 
          echo "<li><a>" .$_SESSION['login']."</a></li>"
          ;?>
      </ul>
    </div>
</nav>

  <div class="EMP-section">
    <div class="container info">
      <h1><big>Hockey<strong>Plex</strong></big></h1>
      <h2>This is customer page</h2>
    </div>
  </div>
  
   <div class = "container info">
      <center>
      <table class = "">
        
        <tr>
          <td>First Name</td> <td><input type="text" name="fname"></td>
        </tr>
        <tr>
          <td>Last Name</td> <td><input type="text" name="lname"></td>
        </tr>
        <tr>
          <td>Phone Number</td> <td><input type="text" name="phonenumber"></td>
        </tr>
        <tr>
          <td>Email</td> <td><input type="email" name="email"></td>
        </tr>
        <tr>
          <td>Address</td> <td><input type="text" name="address"></td>
        </tr>
        <tr>
          <td>City</td> <td><input type="text" name="city"></td>
        </tr>
        <tr>
          <td>State</td> <td><input type="text" name"state"></td>
        </tr>
        <tr>
          <td>Country</td> <td><input type="text" name="country"</td>
        </tr>
        <tr>
          <td>Zip</td> <td><input type="text" name="zip"></td>
        </tr>
        <tr>
          <td>Credit Card</td> <td><input type="text" name="creditcard"></td>
        </tr>
        
     </center>  
      </table>

  


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