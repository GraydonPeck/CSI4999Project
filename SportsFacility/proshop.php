<?php
session_start();
require_once("dbcontroller.php");
include("dbutils.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;
}
}
?>
<HTML>
<HEAD>
<TITLE>HockeyPlex Pro Shop</TITLE>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!--<link href="style.css" type="text/css" rel="stylesheet" />-->
    <link href="main.css" type="text/css" rel="stylesheet" />
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script type = "text/javascript" src = "chk.js"></script>
</HEAD>
<BODY>

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
        <li><a href="proshop.php">Pro Shop<span class="glyphicon glyphicon-piggy-bank pull-left"></span></a><li>
        <li><a href="videopage.php">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></a></li>
        <li><a href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></a><li>
      </ul>

<!--Start of form where users can search -->
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
          <button type="submit" class="button1 btn btn-default">Submit</button>
      </form>
<!-- End of users search form -->


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
            </ul>
          </li>

          <!-- End of settings dropdown -->

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
              <li data-toggle="modal" data-target="#Login"><a href="main.php"></a></li>
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
        </div>
      </div>
    </div>
  </div>
          </form>

  <!-- End Login Modal -->

<div id="shopping-cart">
<div class="cart-top">Shopping Cart <a id="btnEmpty" href="proshop.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:center;"><strong>Quantity</strong></th>
<th style="text-align:center;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>
<?php
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom: 1px solid black;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:1px solid black;"><?php echo $item["code"]; ?></td>
				<td style="text-align:center;border-bottom:1px solid black;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:center;border-bottom:1px solid black;"><?php echo "$".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:1px solid black;"><a href="proshop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="5" align=right><strong>Total:</strong> <?php echo "$".$item_total; ?></td>
</tr>
</tbody>
</table>
  <?php
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) {
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form class = "product-item" method="post" action="proshop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img id= "proimage"src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div class="product-name" id="productnames"><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</BODY>

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

</HTML>