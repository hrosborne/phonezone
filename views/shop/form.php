<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="orders_1189218555_biz@phpnotepad.com">

<?php 
  $i = 1;
  foreach($_SESSION['cart'] as $id => $qty): 
  $product = find_product($id);
?>

<input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $product['title']; ?>">
<input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $product['id']; ?>">
<input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $product['price']; ?>">
<input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $qty; ?>">

<?php 
  $i++;
  endforeach; 
?>
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="shipping_1" value="10.0">
<input type="hidden" name="return" value="http://www.phpvideotutorials.com/gamelist/index.php?view=thankyou">
<input type="hidden" name="cancel_return" value="http://www.phpvideotutorials.com/gamelist/">
<!-- hey guys I corrected the notify_url to point to /gamelist/paypal.php you can deleted this message -->
<input type="hidden" name="notify_url" value="http://www.phpvideotutorials.com/gamelist/paypal.php">
<input type="submit" name="pay now" value="pay" />
</form>
