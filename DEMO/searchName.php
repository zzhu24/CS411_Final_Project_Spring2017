<?php

	$link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');

    echo "<h1> Item Info DEMO</h1><br/>";
    
    
    $fcount = 0;
    $pcount = 0;
    $sASIN=$_POST["search_param"];
    
    $fres = mysql_query("SELECT count(*) fcount FROM Follow WHERE Item_NO = '$sASIN'");
    if($row = mysql_fetch_assoc( $fres )){
        $fcount = $row['fcount'];
    }
    
    $pres = mysql_query("SELECT count(*) pcount FROM Price WHERE Price_Item_NO = '$sASIN'");
    if($row = mysql_fetch_assoc( $pres )){
        $pcount = $row['pcount'];
    }
    
    $sql="SELECT * FROM Item WHERE Item_NO = '$sASIN'";
    $res=mysql_query($sql);
    
    print("<table width=\"100%\" border=\"1\" cellpadding=\"10\"> 
		<tr>
			<td  align=\"center\">
			<h1>Price Tracker</h1>
			<h4> Search Result(s)</h4>
			</td>
		</tr> ");
	print("<tr>
			<td align=\"center\"> ");
			if (mysql_num_rows($res)>0)
			{
				print("<p>There are " . mysql_num_rows($res) . " result(s) available</p>");
					    ?>
					<table border="2">
					  <thead>
					    <tr>
					      <th>Item NO.</th>>
					      <th>Name</th>
					      <th>Follows</th>
					      <th>Price Records</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php
					      if( mysql_num_rows( $res )==0 ){
					        echo '<tr><td colspan="3">No Rows Returned</td></tr>';
					      }else{
					        while( $row = mysql_fetch_assoc( $res ) ){
					          echo "<tr><td>{$row['Item_NO']}</td><td>{$row['Item_Name']}</td><td>{$fcount}</td><td>{$pcount}</td></tr>\n";
					        }
					      }
					    ?>
					  </tbody>
					</table>
					    <?php
			}
			else
			{
				print("There is no result found with your current search criterion  :-  $searchType = \"$searchCriterion\" <br> Please recheck your searching criteria! <br\> <br> Thanks! <br/>");
			}
			
		
			print("</td>
		</tr>
	</table> ");		
	mysql_close($link);
?>