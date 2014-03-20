<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Phone Zone - Shop</title> 
<link rel="stylesheet" type="text/css" media="screen" href="styles/menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="styles/style.css" />
</head> 
<div id="wrap">
<div id="menu"> 
<ul class="adxm menu"> 
	<li class="submenu"><a href="#">Handsets</a> 
	<!-- handset sub menu -->
		<ul id="MenuSub"> 
			<li><a href="iphone.php">Iphone</a></li> 
			<li><a href="android.php">Android</a></li> 
			<li><a href="bb.php">Blackberry</a></li> 
			<li><a href="basic.php">Basic Phones</a></li> 
			<li><a href="all.php">All Products</a></li> 
			</ul>	
<!-- rest of the menu -->			
	</li> 
		<li><a href="sim.php">Sim Cards</a></li>
		<li><a href="acc.php">Accessories</a></li>
		<li><a href="index.php?view=cs">Promotions</a></li> 
		<li><a href="index.php?view=contact">Contact</a></li> 
		<li><a href="index.php?view=checkout">Checkout</a></li> 
</ul> 
</div> 
<!-- phone zone logo and then ad banner called -->
<?php
// calculates random image from my_images array and returns it
function randomImage ( $array ) {

  $total = count($array);

  $call = rand(0,$total-1);

  return $array[$call];

}

?>

<?php
// images array
$my_images = array (


  "images/banner1.png",
	"images/banner2.png",
	"images/banner3.png",

);

?>
<!-- phone zone logo and then ad banner called -->
<div id="logo">
<a href="http://sots.brookes.ac.uk/~09034276/index.php"><img src="images/slimlogo2.png" alt="Phone Zone" id="logo" /></a>
</div> 
<div id="banner">
<?php

echo '<img 

  src="'.randomImage($my_images).'" 

  alt="Random Image" />';

?>
</div>
	
<!-- basket  -->
<div id="cartandsearch">
<div id="left">
<table id="cartcontents">
<thead>
<th scope="col"><b>Cart Contents</b></th>
</thead>
<td><?php echo $_SESSION['total_items']; ?> items</td>
<td>Total: £<?php echo number_format($_SESSION['total_price'], 2); ?></td>
<td><a href="index.php?view=checkout">Checkout</a></td>
</table>
</div>
<!-- search bar  -->
<div id="right">
<form action="index.php?view=search" method="post">
<table id="searchbar">

<td><input type="text" size="10" style="height: 20x; width: 250px" name="searchstring" maxlength="20"/></td>
<td><input type="submit"  style="height: 30px; width: 100px" name="search" value="Search shop"/></td>
</table>
</form>
</div>
<br> </br>

</div>
<div id="main">
<?php
// includes this page as root
include 'views/'.$controller.'/'.$view.'.php' ;
  
 ?>
	
</div>
</div>


<div id="footer">
<p>Disclaimer: This site is constructed as coursework for Internet Commerce Design, at Oxford Brookes University. It is not a working website and is not connected with any site referenced. The views and opinions expressed within these pages are personal and should not be construed as reflecting the views and opnions of Oxford Brookes University.</p>		
</div>
</html>
