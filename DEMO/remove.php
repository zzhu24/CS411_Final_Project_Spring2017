<?php

	$link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');

    echo "<h1> Remove </h1>";
	$rASIN=$_POST["remove_param"];
    
    $res = mysql_query("DELETE FROM Price WHERE Price_Item_NO = '$rASIN'");
    if (!$res) {
        die(mysql_error());
	}
	else{
	    printf("<h2>Records deleted in Price: %d</h2><br/>", mysql_affected_rows());
	}
	
	$res = mysql_query("DELETE FROM Follow WHERE Item_NO = '$rASIN'");
    if (!$res) {
        die(mysql_error());
	}
	else{
	    printf("<h2>Records deleted in Follow: %d</h2><br/>", mysql_affected_rows());
	}
	
	$res = mysql_query("DELETE FROM Item WHERE Item_NO = '$rASIN'");
    if (!$res) {
        die(mysql_error());
	}
	else{
	    printf("<h2>Records deleted in Item: %d</h2><br/>", mysql_affected_rows());
	}
	
	
	
    
?>
