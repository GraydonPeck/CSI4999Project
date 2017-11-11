<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
  if ($_POST['hidden']==1)
{
	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_event1 ($_POST['date'], $_POST['time'], $_POST['event'], $_POST['info'], $_POST['username']);
        header ("Location: schedulepage.php");
    }
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
						if (!$result) die ("Database access failed: " . $conn->error);

						$rows = $result->num_rows;

						for ($c = 0; $c <= 5; ++$c)
						{
							$result->data_seek($c);
							$row = $result->fetch_array(MYSQLI_NUM);

							echo <<<_END
								<div class="col-md-2 col-xs-2 subcard">
                            		<div class="panel panel-primary">
                              			<div class="panel-heading"> Rink: $row[2] $row[1] </div>
                              			<div class="panel-body"> <b>Event: </b>$row[3] <br> <b>Info:</b> $row[4]</div>
                            		</div>
                      			</div>

_END;
						}
					?>

				  </div>
				  <div class="item">

				  	<?php
						for ($c2 = 6; $c2 <= $row; ++$c2)
						{
							$result->data_seek($c2);
							$row = $result->fetch_array(MYSQLI_NUM);

							echo <<<_END
								<div class="col-md-2 col-xs-2 subcard">
                            		<div class="panel panel-primary">
                              			<div class="panel-heading">Rink: $row[2] $row[1]  </div>
                              			<div class="panel-body"> <b>Event: </b>$row[3] <br> <b>Info:</b> $row[4]</div>
                            		</div>
                      			</div>

_END;
						}

					?>

				  </div>


              </div>
              <a class="left carousel-control" href="#eventCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
              <a class="right carousel-control" href="#eventCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
          <!--/carousel-inner-->
      </div><!--/schedulecarousel-->
    </div>
    <div class="col-md-3" style="padding-top:15px">
    </div>
    <!--/Floorplan-->
    <div class="col-md-6" style="padding-top:15px">
      <img src="img/floorplan.jpg" alt="Floor Plan" class="center-block img-rounded map" hidefocus="true" usemap="#FloorMap">
      <map name="FloorMap" id="Map">
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal" shape="poly" coords="381,36,378,323,563,323,565,35" />
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal" shape="poly" coords="270,178,270,46,33,46,33,146,42,154,45,180" />
        <area alt="" title="" data-toggle="modal" href="#" data-target="#ScheduleModal" shape="poly" coords="45,183,273,183,270,315,34,314,31,215" />
      </map>
      <br>
      <br>
      <div>
      <h2>Featured Video</h2>
      <iframe  height="300px" width="45%"src="https://www.youtube.com/embed/3CpZ_AydX8s"  frameborder="1" allowfullscreen style="float:left;margin-right:20px;margin-bottom:20px;"></iframe>
      <p>This weekend check out a college match up between the Oakland Golden Grizzlies and the UDM Titans. The game will be the inaugual college game held here at HockeyPlex. This game will be the first meeting for these rivals in the 2017 season so get ready for an exhilarating game. Admission will be $5 and the puck drops on Ice 1 at 8:00pm. We'll be filming the whole game, as well as all of our college games so you can catch them here later! In the mean time enjoy our featured video of the week.</p>
      <p>In this video you will see the Central Michigan Chippewas defeating Oakland University 8-4 for CMU's first win in program history vs. the Grizzlies. Both Dalton Sutherland and Nathan Allgaier had hat tricks, and Riley Morgan took home his 7th win of the season. CMU improves to 11-4 on the season, and Oakland looks to get back on the grind and pick up a home win for their first game on campus. Check back here next week for a new featured video and feel free to leave a video request on our About page in the comments section. </p>
      </div>
      </div>
      <div class="col-md-3" style="padding-top:15px">
      <div class="fb-page" data-href="https://www.facebook.com/HockeyPlex-547694608918098/" data-tabs="timeline" data-height="700" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/HockeyPlex-547694608918098/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/HockeyPlex-547694608918098/">HockeyPlex</a></blockquote></div>
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
          <h4 class="modal-title" id="myModalLabel">Rink 1</h4>
        </div>
        <div class="modal-body">
<center>
              <form action ="schedulepage.php" method="post">
              <table>
                 <tr><th>Date:</th>
                <td><input type= "text" name="date" value="12/01/2017"></td></tr>
              <tr><th>Time:</th>
                          <td><select name ="time" class="form-control">
                            <option disabled selected value>- select a time -</option>
                               <?php
                            $db = mysqli_connect("localhost","gpeck2217","","c9");
                            $username = $_SESSION['login'];
                             $customer = check_login_type($username);
                             if ($customer)
                            {
                            $sql = "SELECT * FROM rink_1_db WHERE date = '12/01/2017' AND event = 'available'";
                            }
                            else
                            {
                            $sql = "SELECT * FROM rink_1_db WHERE date = '12/01/2017'";
                            }
                            $result = mysqli_query($db, $sql);
                            while ($row = mysqli_fetch_array($result)){
                		        	?>
                            <option value = "<?php echo $row['time']?>"><?php echo $row['time']?></option>
                           	<?php
                          		}
                          	?></select></td></tr>
                          	<tr><th>Event:</th>
                          	<td><input type= "text" name="event" value="<?php echo $row['event']?>"></td></tr>
                          	<tr><th>Extra Info:</th>
                          	<td><input type= "text" name="info" value="<?php echo $row['info']?>"></td></tr>
                          	<input type="hidden" name="hidden" value ="1">
                          	<input type="hidden" name="username" value = "<?php echo $_SESSION['login']?>">
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
