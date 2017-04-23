<?php

	$link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');

    $email = $_POST["email"];
    $password = $_POST["password"];
    //$User_ID = $_POST["username"];
    $Age= $_POST["Age"];
    $Gender= $_POST["Gender"];
    $Income= $_POST["Income"];
    //$sql="SELECT * FROM User WHERE User_Email = '$username' ";
    $sql="SELECT * FROM User WHERE User_Email = '$email' ";
if((mysql_num_rows(mysql_query($sql))<1))
    {
	$sql="INSERT INTO `User`(`User_Email`, `User_Password`, `Gender`, `Age`,Income) VALUES ('$email','$password','$Gender','$Age','$Income')";
    print("<h1>Sign up successfully!</h1>");
}
 else
    {
        print("<h1>Email exits!</h1>");
    }

	// else if ($searchType == "Gene Symbol")
	// {
	// 	$sql="SELECT * FROM Gene WHERE Gene_Symbol LIKE '%$searchCriterion%' ORDER BY Gene_Full_Name";
	// }
	// else
	// {
	// 	$sql="SELECT * FROM Gene WHERE Gene_Full_Name LIKE '%$searchCriterion%' ORDER BY Gene_Full_Name";
	// }


	$res=mysql_query($sql);
	
		
	print("<table width=\"100%\" border=\"1\" cellpadding=\"10\"> 
		<tr>
			<td  align=\"center\">
			<h1>Price Tracker Information Database</h1>
			<h2> CS411 </h2>
			<h3> Demo 1 !</h3>
			<h4> Signup page(s)</h4>
			</td>
		</tr> ");
			

			if (mysql_num_rows($res)>0)
			{
				
				if ($searchType == "Name"){
					    ?>
					<table border="2">
					  <thead>
					    <tr>
					      <th>NO.</th>>
					      <th>Name</th>
					      <th>Info</th>
					    </tr>
					  </thead>
					  <tbody>
					    <?php
					      if( mysql_num_rows( $res )==0 ){
					        echo '<tr><td colspan="4">No Rows Returned</td></tr>';
					      }else{
					        while( $row = mysql_fetch_assoc( $res ) ){
					          echo "<tr><td>{$row['Item_NO']}</td><td>{$row['Item_Name']}</td><td>{$row['Item_Info']}</td></tr>\n";
					        }
					      }
					    ?>
					  </tbody>
					</table>
					    <?php
					  }

				//if ($searchType == "Source")



				while($data=mysql_fetch_assoc($res))
				{
					
				}
			}
			
	mysql_close($link);



?>


