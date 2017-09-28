<!DOCTYPE html>
<?php
session_start();
include("dbutils.php");
require_once("dbcontroller.php");

$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["product_stock"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product_db WHERE product_code='" . $_GET["product_code"] . "'");
			$itemArray = array($productByCode[0]["product_code"]=>array('product_name'=>$productByCode[0]["product_name"], 'product_code'=>$productByCode[0]["product_code"], 'product_quantity'=>$_POST["product_quantity"], 'product_price'=>$productByCode[0]["product_price"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["product_code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["product_code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["product_quantity"])) {
									$_SESSION["cart_item"][$k]["product_quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["product_quantity"] += $_POST["product_quantity"];
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
					if($_GET["product_code"] == $k)
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
<html lang=en>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>ProShop</title>
<link rel="stylesheet" type="text/css" href="proshop.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<script type = "text/javascript" src = "chk.js"></script>

</head>

<body>
  <nav class="navbar navbar-default " >
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="main.php">SportPlex</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Schedule<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Events</a></li>
            <li><a href="#">Times/Dates</a></li>
            <li><a href="#">Your Schedule</a></li>
          </ul>
        </li>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pro Shop<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="proshop.php">Pro Shop</a></li>
          <li><a href="#">Cart</a></li>
          <li><a href="#">Searched Items</a></li>
        </ul>
        <li><a href="#">Video's</a></li>
        <li><a href="#">About</a></li>
         
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><span class="caret"></span> <span class="glyphicon glyphicon-user pull-right"></span></a>
          <ul class="dropdown-menu">
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
      <!-- This addes a dropdown menu for the important icons -->
       <ul class="nav navbar-nav navbar-right">
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"></span><span class="caret"></span> <span class="glyphicon glyphicon-bell pull-right"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"> Notification1 </a></li>
            <li class="divider"></li>
            <li><a href="#">Notification2 </a></li>
            <li class="divider"></li>
            <li><a href="#">Notification3 </a></li>
            <li class="divider"></li>
            
          </ul>
        </li>
       <!-- End of adding dropdown menu --> 
  
      <!-- Username display -->
       <?php if(isset($_SESSION['loggedin'])){
          if ($customer){
          echo "<li><a href='customerpage.php'>" .$_SESSION['login']. "</a> </li>";?>
          <?php } else { ?>
          <?php
           echo "<li><a href='employeepage.php'>" .$_SESSION['login']. "</a> </li>";?>
          <?php } ?>
          <?php }else{ ?>
          <li  data-toggle="modal" data-target=""> <a href="main.php">Create Account</a></li>
           <?php } ?>
      
      <!--End of username display -->
      </ul>
    </div>
  </div>

</nav>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart <a id="btnEmpty" href="proshop.php?action=empty">Empty Cart</a></div>
<?php
if(isset($_SESSION["cart_item"])){
    $item_total = 0;
?>	
<table cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>Name</strong></th>
<th style="text-align:left;"><strong>Price</strong></th>
<th style="text-align:right;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:center;"><strong>Description</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["product_name"]; ?></strong></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["product_price"]; ?></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["product_code"]; ?></td>
				<td style="text-align:right;border-bottom:##444444 1px solid;"><?php echo $item["product_stock"]; ?></td>
				<td style="text-align:right;border-bottom:#444444 1px solid;"><?php echo "$".$item["product_description"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="proshop.php?action=remove&code=<?php echo $item["product_code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
				</tr>
				<?php
        $item_total += ($item["product_price"]*$item["product_stock"]);
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
	$product_array = $db_handle->runQuery("SELECT * FROM product_db ORDER BY product_name ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="proshop.php?action=add&code=<?php echo $product_array[$key]["product_name"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["product_image"]; ?>"></div>
			<div><strong><?php echo $product_array[$key]["product_name"]; ?></strong></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["product_price"]; ?></div>
			<div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" /></div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</body>
</html>