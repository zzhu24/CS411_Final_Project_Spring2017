<?php
    $link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');
	
	include 'lib/checkFunction.php';


	
	$sql  = 'SELECT Item_NO FROM Item';
    $res = mysql_query($sql);
    echo "<p>There are " . mysql_num_rows($result) . " result(s) available</p>";
    echo mysql_errno($link) . ": " . mysql_error($link) . "";
    
    echo "<h1> Auto Check Price </h1><br />";
    $date = date('Y-m-d');
    echo "<h1>Today is $date </h1>";
    //mysql_query("INSERT INTO Price(Price_Item_NO, Price_Date, Price_price) VALUES('$iasin', CAST('". $date ."' AS DATE), '$iprice')");
    
    echo mysql_errno($link) . ": " . mysql_error($link) . "";
    while( $row = mysql_fetch_assoc( $res ) ){
					          $lasin = $row['Item_NO'];
					          if(strlen($lasin) == 10){
					              $lprice = getAmazonPrice("com", $lasin)[price];
    					          mysql_query("INSERT INTO Price(Price_Item_NO, Price_Date, Price_price) VALUES('$lasin', '$date', '$lprice')");
    					          echo "<p>$lasin :$$lprice</p>";
					          }
					          
					        }
    
?>

