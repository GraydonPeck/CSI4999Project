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
  <!--<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->
  <!--<script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->
  <script type="text/javascript" src="chk.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">



</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="197">
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
      <li><a href="index.php">Home<span class="glyphicon glyphicon-home pull-left"></span></button></a></li>
      <li><a href="schedulepage.php">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></a></li>
      <li><a href="proshop.php">Pro Shop<span class="glyphicon glyphicon-piggy-bank pull-left"></span></a><li>
      <li><a href="videopage.php">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></a></li>
      <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>

      </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <ul class="nav navbar-nav">

      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Notifications <span class="caret"></span><span class="glyphicon glyphicon-bell pull-left"></span></a>
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
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu</span><span class="caret"></span> <span class="glyphicon glyphicon-globe pull-left"></span></a>
           <ul class="dropdown-menu">
			<li class="dropdown-header">Options</li>
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
   </center>



<script>
/*global $*/
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
/*window.onclick = function(event) {
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
*/
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
</body>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script> window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>');</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</html>