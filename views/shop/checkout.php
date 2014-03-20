<?php
if($_SESSION['shopcart'])
{
//session_destroy();


?>


<form action="index.php?view=update_cart" method="post">
<table id="cartlist">

<thead>
	<tr>

		<th scope="col">Item</th>
		<th scope="col">Price</th>
		<th scope="col">Quantity</th>
		<th scope="col">Subtotal</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($_SESSION['shopcart'] as $id => $qty): 
			$product = find_product($id);
		?>
		<tr>
		<td><?php echo $product['ProName']; ?></td>
		<td>£<?php echo number_format($product['ProPrice'],2); ?></td>
		<td><input type="text" size="2" name="<?php echo $id ?>" maxlength="2" value="<?php echo $qty; ?>"/></td>
		<td>£<?php echo number_format($product['ProPrice'] * $qty, 2); ?></td>
		
		
		
		</tr>
		<?php endforeach; 
		 ?>
		
		</tbody>
		
		</table>
		<table id="cartlist">
		<?php
	
	error_reporting(E_ALL ^ E_NOTICE);
	$pc = mysql_real_escape_string($_POST['promocode']);
		if ($pc == "FREEISHIP")
		
		{
		$shipping = 0.00;
		}
		else
		{
		$shipping = 4.99;
		}
		$grand = ($_SESSION['total_price']+$shipping);
		
		$_SESSION['grandtotal'] =$grand;
		
		?>
	 <th><b>Subtotal:</b> £<?php echo number_format($_SESSION['total_price'],2); ?> </th>
	 <th><b>Shipping:</b> £<?php echo number_format($shipping); ?> </th>
	 <th><b>Grand Total:</b> £<?php echo number_format($_SESSION['total_price']+$shipping,2); ?></th>
	 <th><input type="submit" name="update"  float= "right" value="Update"/></th>
	 </table></form>
	 <table id="cartlist">
<form action="index.php?view=checkout" method="post">
	 <th><input type="text" size="10" name="promocode" style="height: 20x; width: 150px" value="Enter PROMO here" /></th>
	  <th><input type="submit" name="update"   value="Apply Promotion"/></th>
	 
		
		</table></form>
		
<form action="index.php?view=order" method="post">
<table id="cartlist">
</tr>
<?php 
  $i = 1;
  foreach($_SESSION['shopcart'] as $id => $qty): 
  $product = find_product($id);
?>
<input type="hidden" name="proname_<?php echo $i; ?>" value="<?php echo $product['title']; ?>">
<input type="hidden" name="proid_<?php echo $i; ?>" value="<?php echo $product['id']; ?>">
<input type="hidden" name="proprice_<?php echo $i; ?>" value="<?php echo $product['price']; ?>">
<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $qty; ?>">
<?php 
  $i++;
  endforeach; 
?>
<td>Firstname: <input type="text" name="fn"/></td>
<td>Lastname: <input type="text" name="sn"/></td>
<td>Address number: <input type="text" name="hn"/></td>
<td>Postcode: <input type="text" name="pc"/></td>
<td><input type="submit" name="order" value="Order"/></td>
</tr>

</table>
</form>
	<?php
}
else
{
	echo '<p> your cart is empty....! <a href="index.php"> continue shopping </a></p>';
}
?>	