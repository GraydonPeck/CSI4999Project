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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  
  <!--
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  -->
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">

  <style>
    @import 'http://fonts.googleapis.com/css?family=Montserrat:300,400,700';
* {
    margin: 0;
}

.navbar-brand img {
    display: block;
    height: 25px;
    margin: -3px 5px;
}

/*
.navbar-header {
    margin-left: 5px;
    width: 100%;
}
*/

.modal-footer .btn+.btn {
    margin-bottom: 0px;
    margin-top: 2px;
    margin-left: 2%;
}


.intro-section {
    background: url(img/welcome.png) no-repeat;
    background-size: cover;
    height: 100vh;
    padding-top: 50px;
    background-attachment: fixed;
    overflow: hidden;
}

.intro-section .info {
    text-align: center;
    margin: 20% auto;
    width: 100%;
    color: #f5f5f5;
    background-attachment: fixed;
}

.intro-section .info h1 {
    font-size: 38px;
}

.intro-section .info p {
    font-size: 50px;
}

.intro-section .info .cta {
    font-size: 24px;
}

.btn-primary {
    padding-bottom: 10px;
}
/*************************
JavaScript Style
*************************/
#div1{
	font-size:20px;
	padding:5px;
	text-align:center;
}



/*************************
Body, Text, and page styling
*************************/
.jumbotron {
    background-color: #483272F;
    color: white;
	margin-bottom: 0;
	
}

.topdisplay {
    background-color: #48372F;
    color: white;
	height: 200px;
	

}

body {
	background: #ffb347; /* fallback for old browsers */
  background: -webkit-linear-gradient(to right, #ffb347, #ffcc33); /* Chrome 10-25, Safari 5.1-6 */
  background: linear-gradient(to right, #ffb347, #ffcc33); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    
}

h1.sansserif{
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;	
}

h1{
	
	text-align:center;
}

p.sansserif{
	font-family: Arial, Helvetica, sans-serif;
	font-size:14px;	
}

p.normal {
    font-weight: normal;
	font-size: 14px;
}

p.light {
    font-weight: lighter;
	font-size: 14px;
}

p.thick {
    font-weight: bold;
	font-size: 14px;
}

p.thicker {
    font-weight: 900;
	font-size: 14px;
}

.paragraph {
    text-align: center;
}

.affix {
      top: 0;
      width: 100%;
}

.affix + .container-fluid {
      padding-top: 40px;
}


/*nav:hover{
	opacity: 1.5;
	filter:alpha(opacity=100);
	color:#FEE202;
}*/
/*.navbar-default {
    background-color: #766151;
    border-color: #030033;
	color:#FEE202;
	opacity: 0.9;
	
	
	
}
*/



/*.nav>li>a:hover,
.nav>li>a:focus {
    text-decoration: none;
    background-color: #766151;
	color:#FFFFFF;
	
    
}
*/
/*******************************
Carousel
*******************************/
 .carousel-inner img {
      -webkit-filter: grayscale(90%);
      filter: grayscale(90%); /* make all photos black and white */ 
      width: 100%; /* Set width to 100% */
      margin: auto;
  }
  .carousel-caption h3 {
      color: #fff !important;
  }

/*******************************
Table & Container
*******************************/
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin: auto;
}

td,
th {
    border: 1px solid #dcae1d;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

table,
th,
td {
    border: 1px solid black;
    border-collapse: collapse;
	text-align:center;
	padding-bottom:5px;
	padding-top:5px;
	margin-bottom:5px;

}


/****************************************************
DropDown & list items
****************************************************/
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown-menu>li>a:hover,
.dropdown-menu>li>a:focus {
    text-decoration: none;
   	color: #black;
    /*change color of links in drop down here*/
}

.dropdown-menu {
    background-color: #FFFFFF;
	color:blue;
	opacity:0.7;
}

.navbar-inverse {
	background-color: #514947;

	
}
.navbar-brand{
	font-size: 32px;
}

.navbar {
    margin: 0;
}

.glyphicon-bell:before{
	margin-right: 5px;
}

.glyphicon-home:before{
	margin-right: 5px;
}

.glyphicon-user:before{
	margin-right: 5px;
}

.glyphicon-list-alt:before{
	margin-right: 5px;
}

.glyphicon-apple:before{
	margin-right: 5px;
}

.glyphicon-facetime-video:before{
	margin-right: 5px;
}

.glyphicon-piggy-bank:before{
	margin-right: 5px;
}
.caret.caret-up {
    border-top-width: 0;
    border-bottom: 4px solid #fff;
  }
  
  .caret.caret-up1 {
    border-top-width: 0;
    border-bottom: 4px solid #fff;
  }
/****************************************************
ToolTip
****************************************************/
.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    
    /* Position the tooltip */
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}

/****************************************************
Buttons
****************************************************/
.button {
    background-color: #B6B6B6; /* Green */
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 12px;
	margin:5px 5px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button1:hover {
    background-color: #514947;
    color: white;
}

.button2 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button2:hover {
    background-color: #514947;
    color: white;
}

.button3 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button3:hover {
    background-color: #514947;
    color: white;
}

.button4 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button4:hover {
    background-color: #514947;
    color: white;
}

.button5 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button5:hover {
    background-color: #514947;
    color: white;
}

.button6 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button6:hover {
    background-color: #514947;
    color: white;
}

.button7 {
    background-color: #766151; 
    color: #FFFFFF; 
    border: 2px solid #FFFFFF;
}

.button7:hover {
    background-color: #514947;
    color: white;
}

.dropdown1{
	
}

.dropdown2{
	
}

.dropdown3{
	
}



/****************************************************
HOME PAGE
****************************************************/

.item {
    padding-top: 15px;
    padding-bottom: 10px;
    padding-left: 220px;
    padding-right: 220px;
}

.carousel-control {
    background-color: #dcae1d;
    padding-bottom: 50px;
}


.subcard .panel {
    height: 120px;
    width: 150px;
}

.carousel-inner {
    max-height: 150px !important;
}


/****************************************************
REGISTER PAGE
****************************************************/

.registerBody {
    background-color: #a9b4be;
}

form {
    height: auto;
    margin: 10% 20%;
    padding: 15px;
}


.signup-form input {
    background-color: #f0f0f0;
    color: #414141;
    font-size: 18px;
    font-weight: 300;
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ccc;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    display: block;
    margin-bottom: 20px;
}


#signup-section {
    background: url(img/register.png) 0 no-repeat;
    padding-top: 15%;
    height: 110%;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.singuptitle {
    padding-top: 10%;
    margin: -10% auto -5%;
    text-align: center;
    font-size: 45px;
    color: #fff;
}

.signup-form input #submitSection {
    margin: 0 auto;
    max-width: 185px;
    background-color: #4cae4c;
    color: #fff;
}

  </style>

</head>

<body>

<nav class="navbar navbar-inverse" data-spy="affix" data-offset-top="197">
   <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="main.php">HockeyPlex</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home">Home</span></button></a></li> 
      <li><a href="#">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></button></a></li>
      <li><a href="#">Pro Shop<span class="glyphicon glyphicon-piggy-bank pull-left"></span></button></a><li>
      <li><a href="#">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></button></a></li>
      <li><a href="#">About<span class="glyphicon glyphicon-apple pull-left"></span></button></a><li>
         
      </ul>
	    <ul class="nav navbar-nav navbar-right">
		 
          <li><a href="#">Notifications<span class="caret"></span><span class="glyphicon glyphicon-bell pull-left"></span></a></li>
		  
          <ul class="dropdown-menu">
			<li class="dropdown-header">Important</li>
            <li><a href="#"> Security Breach </a></li>
            <li class="divider"></li>
            <li><a href="#">DDOS Attack </a></li>
            <li class="divider"></li>
			<li class="dropdown-header">Doesn't need attention</li>
            <li><a href="#"> Skater </a></li>
            <li class="divider"></li>
            
          </ul>
        </li>
         <ul class="nav navbar-nav navbar-right">
         <li class="dropdown1">
           
          <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <button onclick="myFunction" class="button button7 navbar-btn dropdown-toggle" type="button" data-toggle="dropdown" href="#">Sign In<span><span class="caret"></span> <span class="glyphicon glyphicon-user pull-left"></button></span>
              <?php }else{ ?>
              
              <?php } ?>
              <!-- End Trigger-->
		  <ul class="dropdown-menu">
			<li class="dropdown-header">Options</li>
            <li><a href="#"> Settings <span class="glyphicon glyphicon-cog pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">User stats <span class="glyphicon glyphicon-stats pull-right"></span></a></li>
            <li class="divider"></li>
            <li><a href="#">Messages <span class="badge pull-right"> 42 </span></a></li>
            <li class="divider"></li>
            
            
            
            
           
          </ul>
        </li>
       
  
      <!-- Username display -->
       <?php if(isset($_SESSION['loggedin'])){
          echo "<li><a>" .$_SESSION['login']."</a></li>";?>
          <?php }else{ ?>
         
           <?php } ?>
      
      <!--End of username display -->
      </ul>
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
      <table class = "">
         <tr>
           <th>Information</th>
           <th>Input</th>
         </tr>
             <?php
  $db = mysqli_connect("localhost","gpeck2217","","c9");
  $username = $_SESSION['login'];
  $sql = "SELECT * FROM login_db WHERE user_name= '$username'";
  $result = mysqli_query($db, $sql);
  while ($row = mysqli_fetch_array($result)){
              			?>
<input type='hidden' name='user_number' value="<?php echo $row['user_number']?>">
               	<?php
              		}
              	?> 
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
          <td>Country</td> <td><input type="text" name="customer_country"></td>
        </tr>
        <tr>
          <td>Zip</td> <td><input type="text" name="customer_zip"></td>
        </tr>
        <tr>
          <td>Credit Card</td> <td><input type="text" name="customer_creditcard"></td>
        </tr>
      </table>
     <center>
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" id="submitSection" class="btn btn-primary" value="Submit">
</form>
</div>
</div>
</div>
   </center> 
   
   
</body>

<script>
function hourglass() {
  var a;
  a = document.getElementById("div1");
  a.innerHTML = "&#xf251;";
  setTimeout(function () {
      a.innerHTML = "&#xf252;";
    }, 1000);
  setTimeout(function () {
      a.innerHTML = "&#xf253;";
    }, 2000);
}
hourglass();
setInterval(hourglass, 3000);


/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}




</script>
<script>
$(document).ready(function(){
	$(".dropdown").on("hide.bs.dropdown", function(){
    $(".button6").html('Notifications<span class="caret"></span><span class="glyphicon glyphicon-bell pull-left"></span>');
	
  });
	$(".dropdown").on("show.bs.dropdown", function(){
    $(".button6").html('Notifications<span class="caret caret-up"></span><span class="glyphicon glyphicon-bell pull-left"></span>');
	
  });
});

$(document).ready(function(){
	$(".dropdown1").on("hide.bs.dropdown", function(){
    $(".button7").html('Sign In<span class="caret"></span><span class="glyphicon glyphicon-user pull-left"></span>');
	
  });
	$(".dropdown1").on("show.bs.dropdown", function(){
    $(".button7").html('Sign In<span class="caret caret-up"></span><span class="glyphicon glyphicon-user pull-left"></span>');
	
  });
});
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