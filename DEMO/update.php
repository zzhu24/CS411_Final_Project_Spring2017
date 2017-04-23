<?php

	$link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');

    echo "<h1> UPdate/Insert DEMO</h1>";
    
    $uASIN=$_POST["Item_No"];
    $uName=$_POST["Item_name"];

    $sql="SELECT * FROM Item WHERE Item_NO = '$uASIN' ";
	$res=mysql_query($sql);
	if((mysql_num_rows($res) < 1))
	{
		$res =  mysql_query("INSERT INTO Item(Item_NO, Item_Name) VALUES ('$uASIN','$uName')");
	if (!$res) {
	   die(mysql_error());
	}
	else{
		printf("<h2>Records Added into Item: %d</h2>", mysql_affected_rows());
 		print("<h2>Insert successfully!</h2>");
	}
    		
	}
	else
	{
 		$res =  mysql_query(" UPDATE Item SET Item_Name = '$uName' WHERE Item_NO = '$uASIN'");
 		if (!$res) {
	        die(mysql_error());
		}
		else{
			printf("<h2>Records Modified in Item: %d</h2>", mysql_affected_rows());
	    	print("<h2>Update succefully!</h2>");
		}
     		
    }
    
?>
