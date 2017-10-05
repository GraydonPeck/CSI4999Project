</<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
 $username = $_POST['username'];
?>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
       if(isset($_SESSION['loggedin'])){
          if ($customer)
          {
          echo "<li><a href='customerpage.php'>" .$_SESSION['login']. "</a> </li>";
          } else {
          echo "<li><a href='employeepage.php'>" .$_SESSION['login']. "</a> </li>";
           } }else{ ?>
          <li  data-toggle="modal" data-target=""> <a href="main.php">Create Account</a></li>
           <?php } ?>
      
      <!--End of username display -->
      </ul>
    </div>
  </div>

</nav>
        <h1>About Us</h1>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>How we came to be ...</h2>
                    <p>Twenty years ago, here in the middle of town, we looked forward to winter. That is when the low lying area in the back of our sub froze over and became our makeshift ice rink. It became our mission as winter approached that this area was to be as full of water as possible. We would spend hours skating, shooting, and even shared with the neighborhood kids so they could enjoy too! One of our dads got a job as a zamboni driver a few towns over. He let us take a ride when was working once and our vision was sealed. We were going to create our own ice arena in our town for our community to enjoy and be proud of. Fast foward to today ... our dream is your reality: HockeyPlex</p>
                    <h2>Here is what you can do on our site ...</h2>
                    <p>You can reserve a rink on our website for a team practice or a game you can get your skates sharpened if needed, and you can check the schedule to see what days rinks are available for you to reserve. Get more information that will go here.</p>
                </div>
            </div>
             <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
            <p>We are located at 318 Meadow Brook Rd, Rochester MI 48309</p>
            <p>Phone number: (248) 370-2100</p>

            </div>
                <div class="col-md-6">
                <h2>Hours of Operation</h2>
                <p>Sunday 6AM-12AM</p>
                <p>Monday 6AM-12AM</p>
                <p>Tuesday 6AM-12AM</p>
                <p>Wednesday 6AM-12AM</p>
                <p>Thurday 6AM-12AM</p>
                <p>Friday 6AM-12AM</p>
                <p>Saturday 6AM-12AM</p>
                </div>
                </div>
        </div>
    </body>
</html>