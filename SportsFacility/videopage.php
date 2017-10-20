<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
      if (count($_POST))
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        add_user ($_POST['User_name'], $_POST['User_password'], $_POST['User_email'], $_POST['user_type']);
        edit_employee ($_POST['User_name'], $_POST['employee_fname'], $_POST['employee_lname'], $_POST['employee_type'], $_POST['employee_phone']);
        header ("Location: employeepage.php");
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

  <title>HockeyPlex Employee</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <!-- referencing an external style sheet. -->
<script src="https://cdn.alloyui.com/3.0.1/aui/aui-min.js"></script>
<link href="https://cdn.alloyui.com/3.0.1/aui-css/css/bootstrap.min.css" rel="stylesheet"></link>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" type="text/css" href="main.css">

<style>
  .w3-bar {
    background-color:#766151;
    color:white;
    font-size: 14px;

  }

  .w3-container{
    background-color:#00303f;
  }

  .containertext{
    color:white;
  }

  .center {
    text-align: center;
}

.pagination {
    display: inline-block;
}

.pagination a {
    color: white;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    transition: background-color .3s;
    border: 1px solid #ddd;
    margin: 0 4px;
}

.scroll {
    width: 1200px;
    height: 400px;
    overflow: scroll;
}

.container1 {

  height:300px;
	position: relative;

	border: 2px solid #ccc;
	text-align:center;
	margin-left:10px;
	padding: 5px;
	font-size: 20px;
	border-radius: 2px;
	overflow:auto;
}



.pagination a:hover:not(.active) {background-color: #ddd;}



footer{
  height:100px;
  background-color:black;
}
</style>

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
        <li><a href="schedulepage.php">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">ProShop</span><span class="caret"></span> <span class="glyphicon glyphicon-piggy-bank pull-left"></span></a>
        <ul class="dropdown-menu">
			       <li class="dropdown-header">Proshop</li>
			         <li><a href="proshop.php">Proshop <span class="badge pull-left"></span></a></li>
               <li><a href="servlobby.php">Service Center<span class="badge pull-left"></span></a></li>
                </ul>
                </li>
        <li><a href="videopage.php">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></a></li>
        <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>
      </ul>

<!--Start of form where users can search -->
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input id="demo"type="text" class="form-control" placeholder="Search">
        </div>
          <button onclick="pagesezarch" type="submit" class="button1 btn btn-default">Submit</button>
      </form>
<!-- End of users search form -->


    <!-- This is a dropdown menu that contains the settings for our site. Add additional information here later -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a id="myTrigger" href="#" class="dropdown-toggle" data-toggle="dropdown">Settings</span><span class="caret"></span> <span class="glyphicon glyphicon-cog pull-left"></span></a>
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
<div class="jumbotron">
  <h1><big>Hockey<strong>Plex</strong></big></h1>
  <h2 class="center">This is the video page</h2>
  <p class="center">This is where the Customer/Employee learn's how to complete each task assigned.</p>
</div>
<div class="container-fluid">
  <div>
    <h2>Welcome to the viewing of each of the containers</h2>
    <p>This is where users will find helpful information</p>
    <p><strong>Happy navigation:</strong> Hope you have a great time looking at our videos.</p>
  </div>

  <div class="w3-bar">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="videotab(event,'Highlights')">Highlights</button>
    <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Training')">Training</button>
  </div>

  <div id="Highlights" class="w3-container w3-display-container videos">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-large w3-display-topright">&times;</span>

    <div class="content ">

      <div class=" col-sm-4">
        <h3 class="containertext">Video 1</h3>
        <iframe  height="300" width="400" src="https://www.youtube.com/embed/Zf1Xc5da2cs" frameborder="1" allowfullscreen></iframe>
        </iframe>
      </div>

      <div class="col-sm-4">
        <h3 class="containertext">Video 2</h3>
        <iframe  height="300" width="400" src="https://www.youtube.com/embed/OycZ6KLWjQo" frameborder="1" allowfullscreen></iframe>
        </iframe>
      </div>

      <div class="col-sm-4">
        <h3 class="containertext">Video 3</h3>
        <iframe height="300" width="400" src="https://www.youtube.com/embed/aerrlifU_UE" frameborder="1" allowfullscreen></iframe>
        </iframe>
      </div>
    </div>

      <div class="col-sm-12">
        <div id="pagination">
          <ul class="pagination pagination-content">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
      </div>
  </div>


    <div id="Training" class="w3-container w3-display-container videos" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>

    <div class="col-sm-4">
      <h2 class="containertext">Video 1</h2>
      <div class=" fluidMedia">
        <iframe src="https://www.youtube.com/embed/Zf1Xc5da2cs" frameborder="1" allowfullscreen></iframe>
        </iframe>
      </div>
        <p class="sansserif">This is the container where all the training videos will be located.</p>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Video 1</h2>
      <div class="fluidMedia">
        <iframe src="https://www.youtube.com/embed/Zf1Xc5da2cs" frameborder="1" allowfullscreen></iframe>
        </iframe>
      </div>
        <p class="sansserif">This is where there will be another video</p>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Video 1</h2>
      <div class="fluidMedia">
        <iframe src="https://www.youtube.com/embed/Zf1Xc5da2cs" frameborder="1" allowfullscreen></iframe>
        </iframe>
      </div>
        <p class="sanserrif">This is where there will be another video</p>
      </div>

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


<footer class="site-footer">
  I'm the Sticky Footer.
</footer>


  <!-- End Login Modal -->
<script>
function videotab(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("videos");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}

function pagesearch(){
  var str = "video"
  var n = str.search("video");
  document.getElementById("demo").innerHTML = n;
}

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    }
}


YUI().use(
  'aui-pagination',
  function(Y) {
    var pages = Y.all('.content div');

    new Y.Pagination(
      {
        boundingBox: '#pagination',
        circular: false,
        contentBox: '#pagination .pagination-content',
        on: {
          changeRequest: function(event) {
            var instance = this,
                state = event.state,
                lastState = event.lastState;

            if (lastState) {
                pages.item(lastState.page - 1).setStyle('display', 'none');
              }

            pages.item(state.page - 1).setStyle('display', 'block');
          }
        },
        page: 1
      }
    ).render();
  }
);




</script>



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
