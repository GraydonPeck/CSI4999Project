<?php
session_start();
require_once("dbcontroller.php");
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
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
  <script type = "text/javascript" src = "chk.js"></script>
  <link rel="stylesheet" type="text/css" href="NavbarStyle.css">
</HEAD>
<BODY>

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
      <li><button  class="button button1 navbar-btn" href="index.php"><span class="glyphicon glyphicon-home">Home</span></button></li> 
      <li><button  class="button button2 navbar-btn dropdown-toggle" href="#">Schedule<span class="glyphicon glyphicon-list-alt pull-left"></span></button></li>
      <li><button onclick="myFunction" class="button button3 navbar-btn dropdown-toggle" href="#">Pro Shop<span class="glyphicon glyphicon-piggy-bank pull-left"></span></button><li>
      <li><button class="button button4 navbar-btn dropdown-toggle" href="#">Video's<span class="glyphicon glyphicon-facetime-video pull-left"></span></button></li>
      <li><button onclick="myFunction" class="button button5 navbar-btn dropdown-toggle" href="aboutpage.php">About<span class="glyphicon glyphicon-apple pull-left"></span></button><li>
         
      </ul>
	    <ul class="nav navbar-nav navbar-right">
		
         <li class="dropdown">
		 
          <button onclick="myFunction" class="button button6 navbar-btn dropdown-toggle" data-toggle="dropdown" href="#">Notifications<span class="caret"></span><span class="glyphicon glyphicon-bell pull-left"></span></button>
		  
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
<th style="text-align:left;"><strong>Code</strong></th>
<th style="text-align:right;"><strong>Quantity</strong></th>
<th style="text-align:right;"><strong>Price</strong></th>
<th style="text-align:center;"><strong>Action</strong></th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
		?>
				<tr>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
				<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
				<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
				<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="proshop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
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
			<form method="post" action="proshop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img id= "proimage"src="<?php echo $product_array[$key]["image"]; ?>"></div>
			<div id="productnames"><strong><?php echo $product_array[$key]["name"]; ?></strong></div>
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