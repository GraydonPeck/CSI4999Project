<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
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
  background-color:#766151;
	padding-bottom:100px; /* Height of the footer element */
	opacity:0.9;

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

#myInput {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
	background-color: #00303f;
	color:white;
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid ; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
    border-collapse: collapse; /* Collapse borders */
    width: 100%; /* Full-width */
    /* border: 1px solid #514947; */ /* Add a grey border */
    font-size: 18px; /* Increase font-size */

	margin-bottom:15px;
}

#myTable th, #myTable td {
    text-align: left; /* Left-align text */
    padding: 12px; /* Add padding */
	background-color:#766151;
}

#myTable tr {
    /* Add a bottom border to all table rows */
     border-bottom: 1px solid #766151;


}
#myTable th{
	border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
    /* Add a grey background color to the table header and on hover */

}

.header{

	font-size:20px;
	text-align:center;
	color:white;
}

.text {
   position:  absolute;
   top: 0;
   left: 0;
   bottom: 0;
   right: 0;
   text-align: center;
   font-size: 20px;
   color: white;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color:#766151; /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */

}

/* Modal Content */
.modal-content {
    background-color: #766151;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

</style>

<script>
var _hmt = _hmt || [];
(function() {
var hm = document.createElement("script");
hm.src = "//hm.baidu.com/hm.js?73c27e26f610eb3c9f3feb0c75b03925";
var s = document.getElementsByTagName("script")[0];
s.parentNode.insertBefore(hm, s);
})();
</script>
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
    <div style="margin-top:50px; width:100%;">
	<input  type="text" id="HighlightsInput" name="videoname" onkeyup="Highlights()" placeholder="Search for names..">
	</div>

 <table id="HighlightTable">
 <thead>
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:60%;">Country</th>
  </tr>
 </thead>
 <tbody>
  <tr>
    <td>
      <h3 class="containertext">Highlight Videos</h3>

      <div class="fluidMedia">

        <iframe  height="300px" width="45%"src="https://www.youtube.com/embed/Zf1Xc5da2cs"  frameborder="1" allowfullscreen></iframe>
      </div>

    </td>
    <td>123</td>
  </tr>
  <tr>
    <td>
      <h3 class="containertext">Highlight Videos</h3>
      <div class="fluidMedia">

       <iframe  height="300px" width="45%" src="https://www.youtube.com/embed/4--iEOftLZ4" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Balance</td>
  </tr>
  <tr>
    <td>
      <h3 class="containertext">Highlight Videos</h3>
      <div class=" fluidMedia">

        <iframe  height="300px" width="45%" src="https://www.youtube.com/embed/K8rt8gYAQls" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick Edge</td>
  </tr>
  <tr>
    <td>
      <h3 class="containertext">Highlight Videos</h3>
      <div class="fluidMedia">

       <iframe  height="300" width="45%" src="https://www.youtube.com/embed/0otLHeiYeDA" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quickness</td>
  </tr>
  <tr>
    <td>
      <h3 class="containertext">Highlight Videos</h3>
      <div class="fluidMedia">

       <iframe  height="300px" width="50%" src="https://www.youtube.com/embed/plna4yeuPLQ" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick</td>
  </tr>
 </tbody>
</table>

</div>


    <div id="Training" class="w3-container w3-display-container videos" style="display:none">
    <div style="margin-top:50px; width:100%;">
	<input  type="text" id="SkillInput" onkeyup="Training()" placeholder="Search for names..">
	</div>


<table id="SkillsTable">
 <thead>
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:60%;">Country</th>
  </tr>
 </thead>
 <tbody>
  <tr>
    <td>
      <h2 class="containertext">Agility</h2>

      <div class="fluidMedia">
        <iframe src="https://www.youtube.com/embed/bUV18ftJXeY?list=PLyp8LF-3yz5AuhDDIbWrg3bhRexI3lGMX" frameborder="1" allowfullscreen></iframe>
      </div>

    </td>
    <td>Agility</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Balance</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/mrLiOX6nIhM" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Balance</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Quick Edge</h2>
      <div class=" fluidMedia">
        <iframe  src="https://www.youtube.com/embed/MPrerhyHllA" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick Edge</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Double Quickness</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/2XsQxGJ3Zw4" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quickness</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Quick Feet</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/sWGRnPnj858" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick</td>
  </tr>
 </tbody>
</table>
</div>

<div id="Learning" class="w3-container w3-display-container videos" style="display:none">
  <div style="margin-top:50px; width:100%;">
	  <input  type="text" id="LearningInput" onkeyup="Learning()" placeholder="Search for names..">
	</div>

   <table id="LearningsTable">
 <thead>
  <tr class="header">
    <th style="width:40%;">Name</th>
    <th style="width:60%;">Country</th>
  </tr>
 </thead>
 <tbody>
  <tr>
    <td>
      <h2 class="containertext">Skate Sharpening #1</h2>
      <div class=" fluidMedia">
       <iframe  src="https://www.youtube.com/embed/ZaNEHE4UKxM" frameborder="1" allowfullscreen></iframe>
      </div>

    </td>
    <td>Agility</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Skate Sharpening #2</h2>
      <div class="fluidMedia">
       <iframe  src="https://www.youtube.com/embed/G5BjMvvwYbs" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Balance</td>
  </tr>
  <tr>
    <td>
      <h2 class="containertext">Skate Sharpening #3</h2>
      <div class="fluidMedia">
        <iframe  src="https://www.youtube.com/embed/w3qutTbxw4E" frameborder="1" allowfullscreen></iframe>
      </div>
    </td>
    <td>Quick Edge</td>

 </tbody>
</table>
</div>


   <div id="Form" class="w3-container w3-display-container videos" style="display:none">
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

    <div class="container">
      <center>
      <button id="myBtns" class="btn button7" style=" margin-right:5px;">Email</button>
		  <button type="button" class="btn button7" style="text-align:center;" data-toggle="collapse" data-target="#demo">Simple collapsible</button>

  <div id="demo" class="collapse">
    <p>This is some text</p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
  </center>
		</div>

		<div id="footer">


		  <center>


<!-- Trigger/Open The Modal -->





<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
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
      </center>
  </div>

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
    if (document.body.scrollTop > 350 || document.documentElement.scrollTop > 350) {
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

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];




    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function filterTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#HighlightTable tbody").rows;



    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else if (secondCol.indexOf(filter) > -1){
          rows[i].style.display = "";

        } else {
            rows[i].style.display = "none";
        }
    }

}

function findTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#LearningsTable tbody").rows;



    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else if (secondCol.indexOf(filter) > -1){
          rows[i].style.display = "";

        } else {
            rows[i].style.display = "none";
        }
    }

}

function SearchTable(event) {
    var filter = event.target.value.toUpperCase();
    var rows = document.querySelector("#SkillsTable tbody").rows;


    for (var i = 0; i < rows.length; i++) {
        var firstCol = rows[i].cells[0].textContent.toUpperCase();
        var secondCol = rows[i].cells[1].textContent.toUpperCase();
        if (firstCol.indexOf(filter) > -1) {
            rows[i].style.display = "";
        } else if (secondCol.indexOf(filter) > -1){
          rows[i].style.display = "";

        } else {
            rows[i].style.display = "none";
        }
    }

}

document.querySelector('#HighlightsInput').addEventListener('keyup', filterTable, false);
document.querySelector('#SkillInput').addEventListener('keyup', SearchTable, false);
document.querySelector('#LearningInput').addEventListener('keyup', findTable, false);




// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtns");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
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
