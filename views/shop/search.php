<?php
db_connect();
//stops sql injection
$searchstring = mysql_real_escape_string($_POST['searchstring']); 
$min_length = 3;
// you can set minimum length of the query if you want
     
    if(strlen($searchstring) >= $min_length){ // if query length is more or equal minimum length then
         
        
        
         
        $raw_results = mysql_query("SELECT * FROM product
            WHERE (`ProName` LIKE '%".$searchstring."%') OR (`ProType` LIKE '%".$searchstring."%') LIMIT 3") or die(mysql_error());
             
    
        if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             echo "<table id='productlist'>";
 
  echo "<tr><th>Name</th><th>Description</th><th>Type</th><th># In Stock</th><th>Price (£)</th><th><b>Add to Cart</b></th></tr>";
            while($results = mysql_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
              $id     = $results['ProID'];
  $name     = $results['ProName'];
  $type    = $results['ProType'];
  $desc     = $results['ProDesc'];
  $quantity = $results['Stock'];
  $price    = $results['ProPrice'];
  $pic 		= $results['produrl'];
               // echo "<p><h3>".$results['ProName']."</h3>".$results['ProType']."</p>";
				echo "<tr><td style='width: 100px;'>".$name."</td><td style='width: 700px;'>".$desc."</td><td>".$type."</td><td>".$quantity."</td><td>".$price."</td><td><a href='index.php?view=add_to_cart_search&id=".$id."'><img src='".$pic."'></a></td></tr>";
				//echo "<tr><td style='width: 100px;'>".$results['ProName']."</td><td style='width: 700px;'>".$results['ProDesc']."</td><td>".$results['ProType']."</td><td>".$results['Stock']."</td><td>".$results['ProPrice']."</td><td><a href='index.php?view=add_to_cart_android&id=".$results['ProID']."'><img src='".$results['produrl']."'></a></td></tr>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
         echo "</table>";    
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
	



?>