<!DOCTYPE html>
<?php
 include("dbutils.php");
 session_start();
      if ($_POST['hidden']==1)
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        edit_employee ($_POST['employee_fname'], $_POST['employee_lname'], $_POST['employee_type'], $_POST['employee_phone'], $_POST['user_name']);
        edit_employee_email($_POST['user_email'], $_POST['user_name']);
        header ("Location: employeepage.php");
    }
    if ($_POST['hidden2']==2)
    {

	    echo "Found " . count($_POST) . " elements" . "<td>";
        var_dump($_POST);
        request_day ($_POST['day'], $_POST['user_name']);
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
<div class="jumbotron">
  <h1><big>Hockey<strong>Plex</strong></big></h1>
</div>

  <div class="col-md-8"  style="padding-top:10px;">
    <div class="panel panel-primary">
      <div class="panel-heading">This Weeks Schedule</div>
      <center>
      <table class="table">
      <?php
    $db = mysqli_connect("localhost","gpeck2217","","c9");
    $username = $_SESSION['login'];
    $sql = "SELECT * FROM work_schedule WHERE user_name = '$username'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)){
      ?>
          <tr>
            <td><?php echo $row['day']?></td> <td><?php echo $row['job']?></td>
          </tr>
          <?php } ?>
    </table>
    <table >
      <th></th><th>You're currently unavailable</th><th></th>
      <?php
    $db = mysqli_connect("localhost","gpeck2217","","c9");
    $username = $_SESSION['login'];
    $sql = "SELECT * FROM work_schedule WHERE blocked = '$username' AND job = 'proshop'";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_array($result)){
      ?>
          <tr>
            <td></td><td><?php echo $row['day']?></td><td></td>
          </tr>
          <?php } ?>
    </table>
    <a class= "button" data-toggle="modal" data-target="#Request" href="#">Edit Availablity</a>
    </center>
    </div>
    <a class= "button btn-block btn-danger" href="servque.php">Service Queue Adminstration</a>
  </div>




   <div class= "col-md-4" style="padding-top:10px;">
      <div class="panel panel-primary">
        <div class="panel-heading">Employee Information</div>
         <form id="#formSection" method="post" class="employeeedit-form" data-animate="flipInX" action = "<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit= "return valid()">
              <table class = "table">
               <!-- Links to our database with the information each customer enter into the following fields -->
                   <?php
                      $db = mysqli_connect("localhost","gpeck2217","","c9");
                      $username = $_SESSION['login'];
                      $sql = "SELECT * FROM employee_db WHERE user_name = '$username'";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result)){
                    ?>
                            <tr>
                              <td>First Name</td> <td><?php echo $row['employee_fname']?></td>
                            </tr>
                            <tr>
                              <td>Last Name</td> <td><?php echo $row['employee_lname']?></td>
                            </tr>
                            <tr >
                              <td>Phone Number</td> <td><?php echo $row['employee_phone']?></td>
                            </tr>
                            <?php }
                      $db = mysqli_connect("localhost","gpeck2217","","c9");
                      $username = $_SESSION['login'];
                      $sql = "SELECT * FROM login_db WHERE user_name = '$username'";
                      $result = mysqli_query($db, $sql);
                      while ($row = mysqli_fetch_array($result)){
                        ?>
              <tr>
                <td>Email</td> <td><?php echo $row['user_email']?></td>
              </tr>
              <?php } ?>
            </table>
            <a class= "button btn-block btn-danger" data-toggle="modal" data-target="#Edit" href="#">EDIT INFORMATION</a>
          </form>
      </div>

      </div>






    <!--Edit model -->
    <div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="Defaultmodal-container">
  					<h1>Edit User Information</h1>
              <form action ="employeepage.php" method="post">
             <?php
              $db = mysqli_connect("localhost","gpeck2217","","c9");
              $username = $_SESSION['login'];
              $sql = "SELECT * FROM employee_db WHERE user_name = '$username'";
              $result = mysqli_query($db, $sql);
              while ($row = mysqli_fetch_array($result)){
            ?>

                     <input type="text" name="employee_fname" value="<?php echo $row['employee_fname']?>">
                    <input type="text" name="employee_lname" value="<?php echo $row['employee_lname']?>">
                    <input type="hidden" name= "employee_type" value="<?php echo $row['employee_type']?>">
                    <input type="text" name="employee_phone" value="<?php echo $row['employee_phone']?>">
                    <input type="hidden" name= "user_name" value="<?php echo $row['user_name']?>">
                     <?php }
              $db = mysqli_connect("localhost","gpeck2217","","c9");
              $username = $_SESSION['login'];
              $sql = "SELECT * FROM login_db WHERE user_name = '$username'";
              $result = mysqli_query($db, $sql);
              while ($row = mysqli_fetch_array($result)){
                ?>
                    <input type="text" name="user_email" value="<?php echo $row['user_email']?>"</td>
                    <input type = "hidden" name= "hidden" value= "1">

                    <input type="submit" class="login loginmodal-submit" value="Submit">
                      <?php } ?>
                       </form>
                    </div>
                  </div>
                </div>
              </div>



  <!--end of Edit modal -->


   <!--Schedule model -->
    <div class="modal fade" id="Request" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="Defaultmodal-container">
  					<h1>Which day would you like to request off</h1>
              <form action ="employeepage.php" method="post">
                        <label class="custom-select"> <select name = "day" class="form-control">
                            <option disabled selected value>- select a day -</option>
                            <option value = "monday">Monday</option>
                            <option value = "tuesday">Tuesday</option>
                            <option value = "wednesday">Wednesday</option>
                            <option value = "thursday">Thursday</option>
                            <option value = "friday">Friday</option>
                            <option value = "saturday">Saturday</option>
                            <option value = "sunday">Sunday</option>
                           	</select></label>
                    <input type = "hidden" name= "hidden2" value= "2">
                    <input type = "hidden" name= "user_name" value= "<?php echo $_SESSION['login']?>">
                    <input type="submit" class="login loginmodal-submit" value="Submit">
                      </form>
                  </div>

                </div>

              </div>




  <!--end of schedule modal -->





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="script.js"></script>  </body>

</html>
