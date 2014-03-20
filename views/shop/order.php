<?php
//$firstname = mysql_real_escape_string($_POST['fn']); 
//$surname = mysql_real_escape_string($_POST['sn']); 
//$housenum = mysql_real_escape_string($_POST['hn']); 
//$postcode = mysql_real_escape_string($_POST['pc']); 
//$total = mysql_real_escape_string($_SESSION['grandtotal']);

$firstname = ($_POST['fn']); 
$surname = ($_POST['sn']); 
$housenum = ($_POST['hn']); 
$postcode = ($_POST['pc']); 
$total = ($_SESSION['grandtotal']);







db_connect();

	$insert=("INSERT INTO orders (firstname, surname, housenumber, postcode, totalamount)
			VALUES ('{$firstname}', '{$surname}', '{$housenum}', '{$postcode}', '{$total}')"); 
					
					mysql_query($insert) or die('Error, insert query failed');


	
		
session_destroy(); 								
?>


<?php if(!empty($_POST)): ?>


  <span class="body-txt"><p>Hey <b><?php echo $_POST['fn']; ?> <?php echo $_POST['sn']; ?></b>, thanks for your order. It will be on its way soon, we hope you enjoy it. </span></p>
  <span class="body-txt"><a href="index.php"> Click here to go back to the front page! </a> </span></p>
</p>
<?php endif; ?>
