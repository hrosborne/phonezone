<?php
session_start();
$_SESSION['name'] = 'Matthew'; 
$_SESSION['cart'] = 31;
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<title>Phone Zone</title> 
<link rel="stylesheet" type="text/css" media="screen" href="styles/menu.css" />
<link rel="stylesheet" type="text/css" media="screen" href="styles/style.css" />
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript">
var flashvars = {};
var params = {};
params.scale = "noscale";
params.salign = "tl";
params.wmode = "transparent";
params.allowScriptAccess = "always";
params.allowFullScreen = "true";
var attributes = {};
swfobject.embedSWF("banner.swf", "banner", "768", "225", "9.0.0", false, flashvars, params, attributes);
</script>
</head> 
<body>
<div id="wrap">
<div id="menu"> 
<ul class="adxm menu"> 
	<li class="submenu"><a href="#">Handsets</a> 
		<ul id="MenuSub"> 
			<li><a href="iphone.php">Iphone</a></li> 
			<li><a href="android.php">Android</a></li> 
			<li><a href="blackberry.php">Blackberry</a></li> 
			<li><a href="basicphones.php">Basic Phones</a></li> 
			
			<!--    "this is how to comment out code"-->
		</ul>		
	</li> 
	
		<li><a href="sim.php">Sim Cards</a></li>
		<li><a href="accessories.php">Accessories</a></li>
		<li><a href="cus_service.php">Customer Service</a></li> 
		<li><a href="contact.php">Contact</a></li> 
		<li><a href="viewbasket.php">View Basket</a></li> 
</ul> 
</div> 
<a href="http://sots.brookes.ac.uk/~09034276/index.php"><img src="images/temp.jpg" alt="Phone Zone" id="logo" /></a> 
<div id="banner"> 
</div>
	
	<div id="main">
	<h1>Welcome to the Phone Zone!</h1> 
	<p>Here at the Phone Zone, you can purhcase any of the latest and greatest handsets.</p>

<div>We hope you enjoy your shopping.</div>
<br>


<?php
		// Connect to database
		mysql_connect("localhost", "09034276", "Ticket1") or die(mysql_error());
		mysql_select_db("09034276") or die(mysql_error());

		//Adds one to the counter
		mysql_query("UPDATE hits SET counter = counter + 1");
		
		//fetches data
		$result = mysql_query("SELECT * FROM hits") 
		or die(mysql_error()); 
		echo writeShoppingCart();

		

		
		while($row = mysql_fetch_array( $result )) {
			echo "Hit Count: ".$row['counter'];
		} 
			
		//today = getdate();
		//echo "<br /> Date: " .$today[mday]."  ".$today[month];
	
		?>		

	</div>

</div>

<div id="footer">
<p>Disclaimer: This site is constructed as coursework for Internet Commerce Design, at Oxford Brookes University. It is not a working website and is not connected with any site referenced. The views and opinions expressed within these pages are personal and should not be construed as reflecting the views and opnions of Oxford Brookes University.</p>		

</div>
</body>
</html>