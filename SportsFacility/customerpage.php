<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
     if ($_POST['hidden']==1)
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        edit_customer ($_POST['customer_fname'], $_POST['customer_lname'], $_POST['customer_phone'], $_POST['customer_email'],  $_POST['customer_address'], $_POST['customer_city'],  $_POST['customer_state'],  $_POST['customer_country'],  $_POST['customer_zip'], $_POST['user_name']);
        header ("Location: customerpage.php");
    }
    if ($_POST['hidden1']==1)
    {
      echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        delete_event ($_POST['id'], $_POST['ice']);
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


      <!-- End of settings dropdown -->

        <!-- Trigger Login Modal -->
              <?php if(isset($_SESSION['loggedin'])){ ?>
              <li  data-toggle="modal"> <a href="logout.php">Logout<span class="glyphicon glyphicon-user pull-left"></span></a></li>
              <?php }else{ ?>
              <li  data-toggle="modal" data-target="#Login"> <a href="#">Login<span class="glyphicon glyphicon-lock pull-left"></span></a></li>
              <?php } ?>
              <!-- End Trigger-->

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
<div class="modal fade" id="EditCust" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="Defaultmodal-container">
        <h1>Edit User Information</h1>
          <center>
            <!-- This is where the customer form is located for entering additional information.  -->
            <form id="#formSection" method="post" class="customeredit-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">
              <!-- This is a table style that adds a black border to the table and colors each element in the table -->
                       <!-- Links to our database with the information each customer enter into the following fields -->
                           <?php
                $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $sql = "SELECT * FROM login_db WHERE user_name= '$username'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                  $name = $row['user_name'];
                            			?>
                        <!-- End of selecting the username from the database -->
              <input type='hidden' name='user_name' value="<?php echo $row['user_name']?>">
                                     	<?php
                            		}
                          $db = mysqli_connect("localhost","gpeck2217","","c9");
                $username = $_SESSION['login'];
                $sql = "SELECT * FROM customer_db WHERE user_name = '$name'";
                $result = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($result)){
                  $number = $row['user_name'];
                            			?>
              <input type="text" name="customer_fname" value="<?php echo $row['customer_fname']?>">
              <input type="text" name="customer_lname" value="<?php echo $row['customer_lname']?>">
              <input type="text" name="customer_phone" value="<?php echo $row['customer_phone']?>">
              <input type="text" name="customer_email" value="<?php echo $row['customer_email']?>">
              <input type="text" name="customer_address" value="<?php echo $row['customer_address']?>">
              <input type="text" name="customer_city" value="<?php echo $row['customer_city']?>">
              <input type="text" name="customer_state" value="<?php echo $row['customer_state']?>">
              <input type="text" name="customer_country" value="<?php echo $row['customer_country']?>">
              <input type="text" name="customer_zip" value="<?php echo $row['customer_zip']?>">

                             	<?php
                    		}
                          	?>
             <input type ="hidden" name = "hidden" value="1">
                <input type="submit" class="login loginmodal-submit" value="Submit">
              </form>
          </div>
       </div>

  </div>
  <!-- This is a customer info table -->
    <form id="#formSection" style="padding:0px;ev method="post" class="customereedit-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">
      <div class="TableWrap">
          <table class="table DefaultTable">
             <thead class="TableHeading">
               <th colspan = "2">Your INFORMATION</th>
             </thead>
             <!-- Links to our database with the information each customer enter into the following fields -->
                 <?php
      $db = mysqli_connect("localhost","gpeck2217","","c9");
      $sql = "SELECT * FROM customer_db WHERE user_name = '$name'";
      $result = mysqli_query($db, $sql);
      while ($row = mysqli_fetch_array($result)){
    ?>
            <tr class="tablestyle">
               <tr>
              <td>First Name</td> <td><?php echo $row['customer_fname']?></td>
            </tr>
            <tr>
              <td>Last Name</td> <td><?php echo $row['customer_lname']?></td>
            </tr>
            <tr>
              <td>Phone Number</td> <td><?php echo $row['customer_phone']?></td>
            </tr>
            <tr>
              <td>Email</td> <td><?php echo $row['customer_email']?></td>
            </tr>
            <tr>
              <td>Address</td> <td><?php echo $row['customer_address']. " " . $row['customer_city'] . ", " . $row['customer_state'] . ", " . $row['customer_country'] . ", " . $row['customer_zip']  ?></td>
            </tr>
            <?php } ?>
             </table>
           <a class= "button" data-toggle="modal" data-target="#EditCust" href="#">EDIT INFORMATION</a>
         <center>
        </div>
    </form>

    <!-- This is a customer reservation table -->
    <form id="#formSection" style="padding:0px;" method="post" class="customeredit-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">
      <div class="TableWrap">
        <!-- This is a table style that adds a black border to the table and colors each element in the table -->
      <table class = "table DefaultTable">
         <thead class="TableHeading">
           <th colspan="6">Your Events!</th>
         </thead>
         <tr>
         <th>Date:</th><th>Time</th><th>Ice</th><th>Event</th><th>Info</th><th></th>
         </tr>
          <?php
          $db = mysqli_connect("localhost","gpeck2217","","c9");
          $username = $_SESSION['login'];
          $sql = "(Select * FROM rink_1_db WHERE user_name = '$username')
                  UNION
                  (Select * FROM rink_2_db WHERE user_name = '$username')
                  UNION
                  (Select * FROM rink_3_db WHERE user_name = '$username')";
          $result = mysqli_query($db, $sql);
          while ($row = mysqli_fetch_array($result)){
          ?>
         <tr>
          <td><?php echo $row['date'] ?></td>
          <td><?php echo $row['time'] ?></td>
          <td><?php echo $row['ice'] ?></td>
          <td><?php echo $row['event']?></td>
        <td><?php echo $row['info']?></td>
        <input type ="hidden" name = "id" value="<?php echo $row['id'] ?>">
        <input type ="hidden" name = "ice" value="<?php echo $row['ice'] ?>">
        <input type ="hidden" name = "hidden1" value="1">
        <td><input type="submit" id="submitSection" class="btn btn-primary" value="Delete"></td>
        </tr>
        <?php } ?>
            </table>
        </div>
    </form>

<!-- <div id="wrapper">-->
<!--		<div id="header">-->

<!--		  <h2>Contact Information</h2>-->

<!--		  <hr class="style-seven">-->
<!--		</div>-->
<!--		<div id="content">-->



<!--    <div class="container">-->
<!--      <center>-->
<!--  <button onclick="location.href = 'aboutpage.php#comment1';" id="myButton" class="button button1" >Message Us</button>  </div>-->
<!--  </center>-->
<!--		</div>-->

<!--		<div id="footer">-->
<!--		  <center>-->

<!--		    <p class="sansserif"><strong>Address:</strong> <i>318 Meadow Brook Rd, Rochester MI 48309</i></p>-->
<!--        <p class="sansserif"><strong>Phone Number:</strong><i> (248) 370-2100</i></p>-->
<!--        <p class="sansserif"><strong>Email: </strong><i>mpdegraeve@oakland.edu</i></p>-->
<!--      </center>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->


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

/* This script makes the caret move up and down, currently our JavaScript isn't working*/
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

/* End of code that makes the caret ulter based on click */
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