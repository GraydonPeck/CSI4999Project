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
  <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="script.js"></script>

  <title>HockeyPlex Home</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- slider carousel -->


  <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css'>
  <link rel='stylesheet prefetch' href='https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick-theme.css'>




  <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->
  <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="main.css">



<!-- slider carousel-->
  <style class="cp-pen-styles">
    .slider {
      width: 90%;
      margin: auto;
      text-align: center;
      padding: 15px;
    }
    .slider .parent-slide {
      padding: 1px;
    }
    .slider img {
      display: block;
      margin: auto;
    }
  </style>


</head>

<body>
  <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=24254366782';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
              <li  data-toggle="modal" data-target="#login-modal"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-left"></span></a></li>
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
    </div>



<!-- Colin -->
<!-- Slick Carousel -->

      <div class="slider">

          <?php
            require_once 'conn.php';
						$conn = new mysqli($hn, $un, $pw, $db);
						if ($conn->connect_error) die ($conn->connect_error);

            $query = "(SELECT * FROM `rink_1_db` WHERE date = '12/01/2017' AND event != 'Available')
                      UNION
                      (SELECT * FROM `rink_2_db` WHERE date = '12/01/2017' AND event != 'Available')
                      UNION
                      (SELECT * FROM `rink_3_db` WHERE date = '12/01/2017' AND event != 'Available')
                      ORDER BY time";

            $result = $conn->query($query);
            if (!$result) die ("Database access failed: " . $conn-error);
            $rows = $result->num_rows;
            for ($j = 0; $j < $rows; ++$j)
            {
              $result->data_seek($j);
              $row = $result->fetch_array(MYSQLI_NUM);
              echo <<<_END

						    <div class="slide">
								  <div class="col-md-3 col-xs-3 subcard">
                    <div class="panel panel-primary">
                      <div class="panel-heading"> Rink: $row[2] $row[1] </div>
                			<div class="panel-body" style="max-height: 60pt;"> <b>Event: </b>$row[3] <br> <b>Info:</b> $row[4]</div>
                		</div>
           			  </div>
           		  </div>
_END;
            };
          ?>

      </div>









      <div class="container-fluid">
    <div class="col-md-2" style="padding-top:15px">
    </div>
    <!--/Floorplan-->
    <div class="col-md-8" style="padding-top:15px">

      <img src="img/floorplan.jpg" alt="Floor Plan" class="center-block img-rounded map" hidefocus="true" usemap="#FloorMap">
      <map name="FloorMap" id="Map">
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal1" shape="poly" coords="381,36,378,323,563,323,565,35" />
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal2" shape="poly" coords="270,178,270,46,33,46,33,146,42,154,45,180" />
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal3" shape="poly" coords="45,183,273,183,270,315,34,314,31,215" />
      </map>
      <br>
      <br>

      <div class="panel panel-primary">
        <h2>Featured Video</h2>
        <iframe  height="250px" width="75%"src="https://www.youtube.com/embed/3CpZ_AydX8s"  frameborder="1" allowfullscreen style="float:left;margin-right:20px;margin-bottom:20px;"></iframe>
        <p>This weekend check out a college match up between the Oakland Golden Grizzlies and the UDM Titans. The game will be the inaugual college game held here at HockeyPlex. This game will be the first meeting for these rivals in the 2017 season so get ready for an exhilarating game. Admission will be $5 and the puck drops on Ice 1 at 8:00pm. We'll be filming the whole game, as well as all of our college games so you can catch them here later! In the mean time enjoy our featured video of the week.</p>
        <p>In this video you will see the Central Michigan Chippewas defeating Oakland University 8-4 for CMU's first win in program history vs. the Grizzlies. Both Dalton Sutherland and Nathan Allgaier had hat tricks, and Riley Morgan took home his 7th win of the season. CMU improves to 11-4 on the season, and Oakland looks to get back on the grind and pick up a home win for their first game on campus. Check back here next week for a new featured video and feel free to leave a video request on our About page in the comments section. </p>
      </div>
     </div>

      <div class="col-md-2" style="padding-top:15px">
      <div class="fb-page" data-href="https://www.facebook.com/HockeyPlex-547694608918098/" data-tabs="timeline" data-height="700" data-width="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/HockeyPlex-547694608918098/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/HockeyPlex-547694608918098/">HockeyPlex</a></blockquote></div>
    </div>

    </div>
    <div id="wrapper">
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
   <div class="modal fade" id="ScheduleModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="Defaultmodal-container">
        <h1>Rink 1</h1><br>
        <div class="modal-body">
<center>
              <table class= "table">
                <tr>
                <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                </tr>
                <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                 $sql = "SELECT * FROM rink_1_db WHERE date = '12/01/2017' ";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php } ?>
                </table>
                      </center>
        </div>
      </div>
    </div>
  </div>
     <div class="modal fade" id="ScheduleModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="Defaultmodal-container">
        <h1>Rink 2</h1><br>
        <div class="modal-body">
<center>
              <table class = "table">
                <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                 $sql = "SELECT * FROM rink_2_db WHERE date = '12/01/2017' ";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php } ?>
                </table>
                      </center>
        </div>
      </div>
    </div>
  </div>

     <div class="modal fade" id="ScheduleModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog" role="document">
      <div class="Defaultmodal-container">
        <h1>Rink 3</h1><br>
        <div class="modal-body">
<center>
              <table class= "table">
                <th>Time</th>
                <th>Event</th>
                <th>Info</th>
                <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                 $sql = "SELECT * FROM rink_3_db WHERE date = '12/01/2017' ";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                 ?>
                <tr>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['time'];?>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['event'];?>
                  <td style="font-size:18px;padding-left:15px;"><?php echo $row['info'];?>
                </tr>
                <?php } ?>
                </table>
                      </center>
        </div>
      </div>
    </div>
  </div>
  <!-- End Login Modal -->


<script>

$(document).ready(function () {
$('#eventCarousel').carousel({
  interval: 10000
});

$('.carousel .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  if (next.next().length>0) {
    next.next().children(':first-child').clone().appendTo($(this));
  }
  else {
  	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
  }
});
</script>

<style>
  /* override position and transform in 3.3.x */
.carousel-inner .item.left.active {
  transform: translateX(-33%);
}
.carousel-inner .item.right.active {
  transform: translateX(33%);
}

.carousel-inner .item.next {
  transform: translateX(33%)
}
.carousel-inner .item.prev {
  transform: translateX(-33%)
}

.carousel-inner .item.right,
.carousel-inner .item.left {
  transform: translateX(0);
}


.carousel-control.left,.carousel-control.right {background-image:none;}

</style>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- slider carousel-->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js'></script>
    <script>
      window.onload=function(){
        $('.slider').slick({
        autoplay:true,
        autoplaySpeed:2000,
        arrows:true,
        prevArrow:'<button type="button" class="slick-prev"></button>',
        nextArrow:'<button type="button" class="slick-next"></button>',
        centerMode:true,
        slidesToShow:3,
        slidesToScroll:1
        });
      };

    //# sourceURL=pen.js
    </script>

</body>

</html>
