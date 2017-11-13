<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
if ($_POST['hidden']==1)
        {
	echo "Found " . count($_POST) . " elements" . "<td>";
    var_dump($_POST);
    add_comment ($_POST['name'], $_POST['comment']);
     header ("Location: aboutpage.php");
        }
?>
<html>
    <head>
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: #514947;
            color: white;
        }
        #commentsection {
          text-align: left;
        }

    </style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HockeyPlex Employee</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <!-- referencing an external style sheet. -->
  <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
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
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- End Login Modal -->
<div class="jumbotron">
  <center><h1><big>Hockey<strong>Plex</strong></big></h1></center>


</div>
            <div class="container" style="padding-top:10px;">
              <div class="panel panel-primary">
                <h1>About Us</h1>
                    <div class="col-md-12">

                        <h2>How we came to be ...</h2>
                        <p>Twenty years ago, here in the middle of town, we looked forward to winter. That is when the low lying area in the back of our sub froze over and became our makeshift ice rink. It became our mission as winter approached that this area was to be as full of water as possible. We would spend hours skating, shooting, and even shared with the neighborhood kids so they could enjoy too! One of our dads got a job as a zamboni driver a few towns over. He let us take a ride when was working once and our vision was sealed. We were going to create our own ice arena in our town for our community to enjoy and be proud of. Fast foward to today ... our dream is your reality: HockeyPlex</p>
                        <h2>Here is what you can do on our site ...</h2>
                        <p>You can reserve a rink on our website for a team practice or a game you can get your skates sharpened if needed, and you can check the schedule to see what days rinks are available for you to reserve. Get more information that will go here.</p>
                    </div>
                 <div class="row">
                    <div class="col-md-6" style="padding-left:30px;">
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
                  <div id="commentsection">
                  <h1 id="comment1">Comment Section</h1>
                  <form id="#formSection" method="post" class="customercomment-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
                    Name: <input type="text" name="name" value="<?php echo $_SESSION['login']?>">
                    Comment: <input type="text" name="comment" value="">
                    <input type="hidden" name ="hidden" value ="1">
                    <button type="submit" class="btn btn-primary" value="comment">Submit</button>
                    </form>
               <table class = "table ForumTable">
                    <?php
                      $db = mysqli_connect("localhost","gpeck2217","","c9");
                      $sql = "SELECT * FROM forum";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result)){
                    ?>
                            <tr>
                              <td>Poster:</td> <td><?php echo $row['name']?></td>
                            </tr>
                            <tr>
                              <td>Comment</td> <td><?php echo $row['comment']?></td>
                            </tr>
                            <?php } ?>
                </table>
                </div>
            </div>
      </div>

      <div class="footer">
        <p>Contact us</p>
          <p>We are located at 318 Meadow Brook Rd, Rochester MI 48309</p>
          <p>Phone number: (248) 370-2100</p>
      </div>
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
    <script src="script.js"></script>
</html>