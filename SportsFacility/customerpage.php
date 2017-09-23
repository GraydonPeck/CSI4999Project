<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
      if (count($_POST)) 
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        edit_customer ($_POST['user_number'], $_POST['customer_fname'], $_POST['customer_lname'], $_POST['customer_phone'], $_POST['customer_email'],  $_POST['customer_address'], $_POST['customer_city'],  $_POST['customer_state'],  $_POST['customer_country'],  $_POST['customer_zip'],  $_POST['customer_creditcard']);
        header ("Location: customerpage.php");
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

  <title>HockeyPlex Customer</title>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" src="main.css">

  <style>
    body{
     background-color:#cae4db; 
    }
     .navbar-default {
    background-color: #dcae1d;
    border-color: #030033;
}

 .dropdown-menu > li > a:hover,
   .dropdown-menu > li > a:focus {
    color: #262626;
   text-decoration: none;
  background-color: #7a9d96;  /*change color of links in drop down here*/
   }
   .dropdown-menu{
     background-color:#dcae1d;
   }
   
    .nav > li > a:hover,
 .nav > li > a:focus {
    text-decoration: none;
    background-color: #00303f; /*Change rollover cell color here*/
  }
  
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin:auto;
}

td, th {
    border: 1px solid #dcae1d;
    text-align: left;
    padding:8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

.btn-default{
  
  margin-top: 2px;
  
}
.btn-primary{
  margin-top: 2px;
}
.navbar{
  margin:0;
  
}
.jumbotron{
  background-color:#00303f;
  color:white;
}
h1,h2,p{
  text-align:center;
}
  </style>

</head>

<body class="customer">

<<<<<<< HEAD
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
      <li><a href="home.php"><span class="glyphicon glyphicon-home"></span></a></li>
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
          <li><a href="#">Viewed Items</a></li>
          <li><a href="#">Items in Cart</a></li>
          <li><a href="#">Searched Items</a></li>
        </ul>
        <li><a href="#">Video's</a></li>
        <li><a href="#">About</a></li>
         <li><a href="#"><span class="glyphicon glyphicon-mail"></span></a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-trash"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-wrench"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-bell"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
  
        <?php
          echo "<li><a>" .$_SESSION['login']."</a></li>"
        ;?>
      </ul>
=======
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
>>>>>>> 1fbdf2a2b92a25c6221c68e1b8510d665c34633b
    </div>
  </div>

</nav>
<div class="jumbotron">
  <h1><big>Hockey<strong>Plex</strong></big></h1>
  <h2>This is customer page</h2>
  <p>This is where the Customer enters extra information to their account.</p>
</div>
  
  
      
   <div class = "container info">
     <div class = "container-fluid">
       <center>
      <form id="#formSection" method="post" class="customeredit-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">
      <input type ="hidden" name= "user_number" value="1">
      <table class = "">
         <tr>
           <th>Information</th>
           <th>Input</th>
         </tr>
        <tr>
          <td>First Name</td> <td><input type="text" name="customer_fname"></td>
        </tr>
        <tr>
          <td>Last Name</td> <td><input type="text" name="customer_lname"></td>
        </tr>
        <tr>
          <td>Phone Number</td> <td><input type="text" name="customer_phone"></td>
        </tr>
        <tr>
          <td>Email</td> <td><input type="email" name="customer_email"></td>
        </tr>
        <tr>
          <td>Address</td> <td><input type="text" name="customer_address"></td>
        </tr>
        <tr>
          <td>City</td> <td><input type="text" name="customer_city"></td>
        </tr>
        <tr>
          <td>State</td> <td><input type="text" name="customer_state"></td>
        </tr>
        <tr>
          <td>Country</td> <td><input type="text" name="customer_country"</td>
        </tr>
        <tr>
          <td>Zip</td> <td><input type="text" name="customer_zip"></td>
        </tr>
        <tr>
          <td>Credit Card</td> <td><input type="text" name="customer_creditcard"></td>
        </tr>
      </table>
  
     
     <center>
         <hr>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" value="ADD RECORD">Submit</button>
     <center>
    </div>
</form>
</div>
</div>
   </center> 
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
    <script src="script.js"></script>  </body>

</html>