<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
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
<TITLE>MYGROCERY-Cart</TITLE>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="cartstyle.css" type="text/css" rel="stylesheet" />
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe" crossorigin="anonymous"></script>

</HEAD>
    
    
<BODY>

    
    <div class='menu-container'></div>
    <div class="header">
        <img src="product-images/headerMyGrocer.PNG">
    </div>
    
        <div class="navbar">
        <a href="index.html" class="left">Home</a>
        <a href="freshmarket.html" class="left">Fresh Market</a>    
        <a href="bakery.html" class="left">Bakery</a>
        <a href="chilled&frozen.html" class="left">Chilled & Frozen</a>
        <a href="beverages.html" class="left">Beverages</a>    
        <a href="foodcupboard.html" class="left">Food Cupboard</a>
    
    
        <div class="search-container">
            
            <a href = "search.php">Search</a>
            
            <a href = "cart.php">My Cart</a>
             
            <a href = "login.html">Login</a>
                
            </form>
        </div>
      </div>
    
<div id="shopping-cart">
<div class="txt-heading"><h2><b>My Shopping Cart</b></h2></div>

<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "RM ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "RM ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "RM ".number_format($total_price, 2); ?></strong></td>
<td><a href="payment.html" class="btnContinue"><p value = "place order" class="totalRow"><b>Place Order</b></p></a></td>
</tr>
</tbody>
</table>

  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

    <div class="wrapper">
<div id="product-grid">
	<div class="txt-heading"><h2><b>Products</b></h2></div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" height="150px"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-price"><?php echo "RM".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
    
	<?php
		}
	}
	?>
    
    <br><br><br><br><br><br><br>
        </div>
        
</div>
    
    <br>
      <br><br><br><br><br><br><br><br><br><br><br><br>
    

    <div class="footer-container"></div>
 <footer class="footer">
  <div class="footer__addr">
    <h3 class="footer__logo">mygrocery</h3>
        
    <h2>Contact</h2>
    
    <address>
      123-456-789 | MyGrocery Online Store<br>
          
      <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
    </address>
  </div>
  
  <ul class="footer__nav">
    <li class="nav__item">
      <h2 class="nav__title">ABOUT US</h2>

      <ul class="nav__ul">
        <li>
          <a href="index.html">Alternative ads</a>
        </li>
      </ul>
    </li>
    
    <li class="nav__item nav__item--extra">
      <h2 class="nav__title">WHAT'S IN STORE</h2>
      
      <ul class="nav__ul nav__ul--extra">
        <li>
          <a href="freshmarket.html">Fresh Market</a>
        </li>
        
        <li>
          <a href="bakery.html">Bakery</a>
        </li>
        
        <li>
          <a href="chilled&frozen.html">Chilled & Frozen</a>
        </li>
        
        <li>
          <a href="beverages.html">Beverages</a>
        </li>
        
        <li>
          <a href="foodcupboard.html">Food Cupboard</a>
        </li>
      </ul>
    </li>
    
    <li class="nav__item">
      <h2 class="nav__title">Thank You for <br> shopping with us!♥</h2>
      
      <ul class="nav__ul">
        <li>
          <a href="#"></a>
        </li>
        
        <li>
          <a href="#"></a>
        </li>
        
        <li>
          <a href="#"></a>
        </li>
      </ul>
    </li>
  </ul>
  
  <div class="legal">
    <p>&copy; 2021 mygrocery.com | Designed by GNETT</p>
    
  </div>
    
    <div class="rounded-social-buttons">
                    <a class="social-button facebook" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a class="social-button twitter" href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a class="social-button linkedin" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a class="social-button youtube" href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a class="social-button instagram" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
</footer>

</BODY>
</HTML>