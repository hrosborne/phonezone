<?php

  /**
   * connects to database server and selects database
   * @return bool
   */
  function db_connect()
  {
		
    $connection = mysql_pconnect('fdb6.awardspace.net', '1597520_09034276', 'Ticket12');
		
		if(!$connection)
		{
		  return false;	
		}
		
		if(!mysql_select_db('1597520_09034276'))
		{
		  return false;	
		}
		
		return $connection;
		
  }
	
	/**
	 * Turns MYSQL into array
	 * @param resource $result
	 * @return array
	 */
	function db_result_to_array($result)
	{
		$res_array = array();
		
    for ($count=0;  $row = mysql_fetch_array($result); $count++)
    {
      $res_array[$count] = $row;
    }
	 
		return $res_array;
		
	}
	
	
	
  /**
   * finds products and lists them in DESC order
   * @return array
   */
	function find_products()
	{
	  db_connect();
		
		$query = "SELECT * FROM product order by product.ProID DESC";
		
		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	}

		function find_product_iphone()
	{
	  db_connect();
		
		$query = "SELECT * FROM product order by product.ProID WHERE ProType='android' ";
		
		$result = mysql_query($query);
		
		$result = db_result_to_array($result);
		
		return $result;
	}
		
	/**
   * finds a product by id
   * @return array
   */
	function find_product($id)
	{
	  db_connect();
		
		$query = sprintf("SELECT * FROM product WHERE product.ProID = '%s'", 
							mysql_real_escape_string($id));
		
		$result = mysql_query($query);
		
		$row = mysql_fetch_array($result);
		
		return $row;
	}
	
?>
