<?php

 function add_to_cart($id)
 {
   if (isset($_SESSION['shopcart'][$id]))
   {
      $_SESSION['shopcart'][$id]++;
			return true;
    }
		else
		{
			$_SESSION['shopcart'][$id] = 1;
      return true;
		}
		
		return false;	
  
}

	function total_items($cart)
  {
     $num_items = 0;
		 
		 if(is_array($cart))
	   {
			 foreach($cart as $id => $qty)
			 {
				 $num_items += $qty;
			 }
		 }
		 
		 return $num_items;
  }

	function update_cart()
	{
	  foreach($_SESSION['shopcart'] as $id => $qty)
		{
			if($_POST[$id] == '0')
			{
				unset($_SESSION['shopcart'][$id]);
			}
			else
			{
				$_SESSION['shopcart'][$id] = $_POST[$id];
			}
		}
		if($_POST['promocode'] == 'iphone')
		{
		
	
	}
	}
	


	
	function total_price($cart)
  {
		
     $price = 0.0;
		 
		 $connection = db_connect();
		 
		 if(is_array($cart))
	   {
			 foreach($cart as $id => $qty)
			 {
				 $query = "select ProPrice from product where product.ProID = '$id'";
				 $result = mysql_query($query);
				 if($result)
				 {
					 $item_price = mysql_result($result, 0, 'ProPrice');
					 $price += $item_price * $qty;
				 }
			 }
		 }
		  return $price;
  }		
	
?>