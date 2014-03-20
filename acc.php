<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Phone Zone - Accessories</title> 
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

<?php

session_start();
// includes the database functions
include('db_fns.php');

// includes cart functions
include('cart_fns.php');

// calculates random image from my_images array and returns it

function randomImage ( $array ) {

  $total = count($array);

  $call = rand(0,$total-1);

  return $array[$call];

}
// images array

$my_images = array (

  "images/banner1.png",
	"images/banner2.png",
	

);

?>
<!-- phone zone logo and then ad banner called -->

<a href="http://sots.brookes.ac.uk/~09034276/index.php"><img src="images/slimlogo2.png" alt="Phone Zone" id="logo" /></a> 
<div id="banner">
<?php
// echoes a random image 

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


$rowsPerPage = 3;

// default page is 1
$pageNum = 1;

// if $_GET['page'] is defined, use it as page number
if(isset($_GET['page']))
{
    $pageNum = $_GET['page'];
}

// count the offset
$offset = ($pageNum - 1) * $rowsPerPage;
db_connect();
// select sql with number of results parameters
$query = " SELECT * FROM product WHERE ProType='acc' " .
         " LIMIT $offset, $rowsPerPage";
$result = mysql_query($query) or die('Error, query failed');

// create table
 echo "<table id='productlist'>";
 
    echo "<tr><th>Name</th><th>Description</th><th>Type</th><th>Price (£)</th><th><b>Add to Cart</b></th></tr>";
while($row = mysql_fetch_array($result)){

//define variables

 $id     = $row['ProID'];
  $name     = $row['ProName'];
  $type    = $row['ProType'];
  $desc     = $row['ProDesc'];

  $price    = $row['ProPrice'];
  $pic 		= $row['produrl'];
   echo "<tr><td style='width: 100px;'>".$name."</td><td style='width: 700px;'>".$desc."</td><td>".$type."</td><td>".$price."</td><td><a href='index.php?view=add_to_cart_acc&id=".$id."'><img src='".$pic."'></a></td></tr>";

   }
   
  
echo "</table>";

$numrows = mysql_result(mysql_query("SELECT count(*) FROM product WHERE ProType='acc' "), 0);

// the maximum pages we can have
$maxPage = ceil($numrows/$rowsPerPage);

// print the link to access each page
$self = $_SERVER['PHP_SELF'];

//links at the bottom of page, to go back, forwards, first page and last page

if ($pageNum > 1)
{
   $page  = $pageNum - 1;
   $prev  = " <a href=\"?page=$page\">[Prev]</a> ";

   $first = " <a href=\"$self?page=1\">[First Page]</a> ";
} 
else
{
   $prev  = '&nbsp;'; // on page one, don't print previous link
   $first = '&nbsp;'; // nor the first page link
}

if ($pageNum < $maxPage)
{
   $page = $pageNum + 1;
  
$next = " <a href=\"$self?page=$page\">[Next]</a> ";
$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
  
} 
else
{
   $next = '&nbsp;'; // we're on the last page, don't print next link
   $last = '&nbsp;'; // nor the last page link
}

// print the navigation link
echo $first . $prev . 
" Showing page $pageNum of $maxPage pages " . $next . $last;
?>
	
</div>
</div>


<div id="footer">
<!-- disclaimer, out of wrap  -->
<p>Disclaimer: This site is constructed as coursework for Internet Commerce Design, at Oxford Brookes University. It is not a working website and is not connected with any site referenced. The views and opinions expressed within these pages are personal and should not be construed as reflecting the views and opnions of Oxford Brookes University.</p>		
</div>
</html>
