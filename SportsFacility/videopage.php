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
   <link rel="stylesheet" href="https://alloyui.com/pagination/css/basic.css" />

<style>
  #wrapper {
	min-height:100%;
	position:relative;
}
#header {
	background:#766151;
	padding:10px;
	opacity:0.9;
	text-align:center;
}
#content {

	padding-bottom:100px; /* Height of the footer element */

}
#footer {
	background:#766151;
	width:100%;
	height:100px;
	position:absolute;
	bottom:0;
	left:0;
  opacity:0.9;
}
.width{
  width:100%;
}

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #555;
  color: white;
  cursor: pointer;
  padding: 15px;
  opacity: 0.5;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: blue;
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
               <li><a href="servcust.php">Service Center<span class="badge pull-left"></span></a></li>
                </ul>
                </li>
        <li><a href="videopage.php">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></a></li>
        <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>
      </ul>




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

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<div class="jumbotron">
  <h1><big>Hockey<strong>Plex</strong></big></h1>
</div>



<div class="w3-content w3-display-container" style="max-width:1750px;" >


<div class="w3-display-container mySlides">
  <img src="./img/513607201.jpg" style="width:100%; height:300px;">

</div>

<div class="w3-display-container mySlides">
  <img src="./img/standrew_spot.jpg" style="width:100%; height:300px;">

</div>

<div class="w3-display-container mySlides">
  <img src="./img/maxresdefault.jpg" style="width:100%; height:300px;">

</div>

<div class="w3-display-container mySlides">
  <img src="./img/shea-rink.jpg" style="width:100%; height:300px;">

</div>


<button class="w3-button w3-display-left w3-black" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-display-right w3-black" onclick="plusDivs(1)">&#10095;</button>

</div>

</div>
<div class="container-fluid">
  <div>
    <div class="double col-sm-4">
      <h3 class="textcenter">Highlights</h3>
      <hr>
      <p>Customers or employees will be able to watch. This section is where you will watch the best highlights.</p>
    </div>
     <div class="double col-sm-4">
      <h3 class="textcenter">Skills</h3>
      <hr>
      <p>Customers or employees will be able to learn new skills with some skating tips.</p>
    </div>
    <div class="double col-sm-4">
    <h3 class="textcenter">Employee Training</h3>
    <hr>
    <p>Only for when employees are signed in. Will allow employees to touch up on skills for sharpen ice skates.</p>
    </div>
  </div>

  <div class="w3-bar">
    <button class="w3-bar-item w3-button tablink w3-black" onclick="videotab(event,'Highlights')">Highlights</button>
    <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Training')"> Skills Training</button>
    <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Learning')">Employee Training</button>
    <button class="w3-bar-item w3-button tablink" onclick="videotab(event,'Form')">Email Form</button>
  </div>

  <div id="Highlights" class="w3-container w3-display-container videos">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-large w3-display-topright">&times;</span>

    <div class=" content ">
      <div class=" col-sm-12">
        <h3 class="containertext">Highlight Videos</h3>
        <iframe  height="300px" width="45%"src="https://www.youtube.com/embed/Zf1Xc5da2cs"  frameborder="1" allowfullscreen></iframe>
      </div>

      <div class="col-sm-12">
        <h3 class="containertext">Highlight Videos</h3>
       <iframe  height="300px" width="45%" src="https://www.youtube.com/embed/4--iEOftLZ4" frameborder="1" allowfullscreen></iframe>
      </div>

      <div class="col-sm-12">
        <h3 class="containertext">Highlight Videos</h3>
        <iframe  height="300px" width="45%" src="https://www.youtube.com/embed/K8rt8gYAQls" frameborder="1" allowfullscreen></iframe>
      </div>

       <div class=" col-sm-12">
        <h3 class="containertext">Highlight Videos</h3>
       <iframe  height="300" width="45%" src="https://www.youtube.com/embed/0otLHeiYeDA" frameborder="1" allowfullscreen></iframe>
      </div>

      <div class="col-sm-12">
        <h3 class="containertext">Highlight Videos</h3>
       <iframe  height="300px" width="50%" src="https://www.youtube.com/embed/plna4yeuPLQ" frameborder="1" allowfullscreen></iframe>
      </div>

      <div class="col-sm-12">
        <h3 class="containertext">Highlight Videos</h3>
        <iframe  height="300px" width="50%" src="https://www.youtube.com/embed/mosMkX_4Sok" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

      <div class="col-sm-12">
        <div id="pagination">
          <ul class="pagination pagination-content">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">6</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
      </div>
  </div>


    <div id="Training" class="w3-container w3-display-container videos" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>

    <div class="col-sm-4">
      <h2 class="containertext">Elite Skills</h2>
      <div class=" fluidMedia">
        <iframe  src="https://www.youtube.com/embed/oFCxzEYGtBs" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Agility</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/bUV18ftJXeY?list=PLyp8LF-3yz5AuhDDIbWrg3bhRexI3lGMX" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Balance</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/mrLiOX6nIhM" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Quick Edge</h2>
      <div class=" fluidMedia">
        <iframe  src="https://www.youtube.com/embed/MPrerhyHllA" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Double Quickness</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/2XsQxGJ3Zw4" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Quick Feet</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/sWGRnPnj858" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    </div>


   <div id="Learning" class="w3-container w3-display-container videos" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>

    <div class="col-sm-4">
      <h2 class="containertext">Skate Sharpening #1</h2>
      <div class=" fluidMedia">
       <iframe  src="https://www.youtube.com/embed/ZaNEHE4UKxM" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Skate Sharpening #2</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/G5BjMvvwYbs" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    <div class="col-sm-4">
      <h2 class="containertext">Skate Sharpening #3</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/w3qutTbxw4E" frameborder="1" allowfullscreen></iframe>
      </div>
    </div>

    </div>


   <div id="Form" class="w3-container w3-display-container videos" style="display:none">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>

    <div class="col-sm-12">
      <form>
        <ul class="form-style-1">
          <li><label>Full Name <span class="required">*</span></label><input type="text" name="field1" class="field-divided" placeholder="First" />&nbsp;<input type="text" name="field2" class="field-divided" placeholder="Last" /></li>
          <li>
            <label>Email <span class="required">*</span></label>
            <input type="email" name="field3" placeholder="example@gmail.com" class="field-long" />
          </li>
          <li>
            <label>Subject</label>
            <select name="field4" class="field-select">
            <option value="Feild1">Feild1</option>
            <option value="Feild2">Feild2</option>
            <option value="Questions">Questions</option>
            </select>
          </li>
          <li>
            <label>Your Message <span class="required">*</span></label>
            <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
          </li>
          <li>
            <input type="submit" value="Submit" />
          </li>
        </ul>
      </form>
    </div>
  </div>
</div>

<br>


 <div id="wrapper">
		<div id="header">
		  <h2>Contact Infromation</h2>
		  <hr>
		</div>
		<div id="content">
		</div>
		<div id="footer">
		  <center>
		  <button type="button" class="btn button1" data-toggle="collapse" data-target="#demo">More Info</button>
		  </center>
		  <div id="demo" class="collapse">
		   <p class="sansserif" style="text-align:center;">We are located at 318 Meadow Brook Rd, Rochester MI 48309</p>
          <p class="sansserif" style="text-align:center;">Phone number: (248) 370-2100</p>
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





</body>
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
      tablinks[i].className = tablinks[i].className.replace(" w3-black", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-black";
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

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";

}

var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 10000); // Change image every 2 seconds
}


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
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
