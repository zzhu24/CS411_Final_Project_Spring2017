<?php


	include 'lib/checkFunction.php';


	$link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');
	


	session_start();
	//echo ($_SESSION['email']);
	$email_current=$_SESSION['email'];
	if (empty($email_current)) {
    echo "<h1>Please log in first to use this function!<h1>";
		}

	//$Item_NO=$_POST["Item_NO"];
	//$sql="SELECT * 
	//FROM Follow,Item,User 
	//WHERE Follow.Item_NO = Item.Item_NO AND
	//Follow.User_Email = User.User_Email";


	$res = mysql_query("SELECT *
	FROM User
	WHERE User_Email = '$email_current'");
	$row = mysql_fetch_assoc($res);


	$current_age = $row['Age'];

	//echo ($current_age);

	$current_gender = $row['Gender'];

	//echo ($current_gender);

	$current_income = $row['Income'];

	//echo ($current_income);






/*

	mysql_query("SELECT f.Item_NO
		,COUNT(*)
		,SUM(CASE WHEN u.Age = $current_age THEN 1 ELSE 0 END) AS ageCount
		,SUM(CASE WHEN u.Gender = $current_gender THEN 1 ELSE 0 END) AS genderCount
		,SUM(CASE WHEN u.Income = $current_income THEN 1 ELSE 0 END) AS incomeCount
	FROM Follow f, User u
	WHERE f.User_Email = u.User_Email
	GROUP BY f.Item_NO");
*/






	$counting = mysql_query("SELECT tAll.Item_NO, tAll.ageCount * tAll.genderCount* tAll.incomeCount/tAll.totalCount/tAll.totalCount/tAll.totalCount AS points
	FROM (SELECT f.Item_NO
   			,COUNT(*) totalCount
			,SUM(CASE WHEN u.Age = $current_age THEN 1 ELSE 0 END) AS ageCount
			,SUM(CASE WHEN u.Gender = $current_gender THEN 1 ELSE 0 END) AS genderCount
			,SUM(CASE WHEN u.Income = $current_income THEN 1 ELSE 0 END) AS incomeCount
		FROM Follow f, User u
		WHERE f.User_Email = u.User_Email
		GROUP BY f.Item_NO) AS tAll
		ORDER BY points DESC");
	//echo "<p>There are " . mysql_num_rows($counting) . " result(s) available</p>";
	//echo mysql_errno($link) . ": " . mysql_error($link) . "";
	//while($new_row = mysql_fetch_assoc( $counting )){
	//	$lasin = $row['Item_NO'];
	//	echo "<p>$lasin</p>";
	//}

	//$first_three = mysql_query("SELECT * FROM '$counting' LIMIT 3")

	//$top_3 = mysql_query("SELECT * FROM '$counting' LIMIT 1,3");
	//echo "<p>There are " . mysql_num_rows($counting) . " result(s) available</p>";
	$i = 0;
	while( ($row = mysql_fetch_assoc( $counting )) && ($i < 3)){
		$lasin = $row['Item_NO'];
		//echo "<p>$lasin</p>";





		$response = getAmazonPrice("com", $lasin);
	    $iname = $response[title];
	    $iprice = $response[price];
	    $iurl = $response[url];
	    $image = $response[image];
	    
	    
	    
	    echo "<img src=$image />
            <h1>Item ASIN: $lasin <br/>
            <a href=$iurl>Item Name: $iname</a> <br/>
            Current Price: $$iprice <br/></h1>";

	    $i ++;
	}


/*


	/*
	$total = mysql_query("SELECT f.Item_NO, COUNT(*) n
	FROM Follow f, User u
	WHERE f.User_Email = u.User_Email
	GROUP BY f.Item_NO");
	//echo mysql_errno($link) . ": " . mysql_error($link) . " ";
	//echo "<p>There are " . mysql_num_rows($total) . " result(s) available</p>";
    while( $row = mysql_fetch_assoc( $total ) ){
								$asin = $row['Item_NO'];
								$n = $row['n'];
								mysql_query( "INSERT INTO `Recommendation`(`Item_NO`, `Total`) 
											VALUES ('$asin','$n')");
								//echo "<h1>$asin, $n</h1>";
					          

								$age_table = mysql_query("SELECT f.Item_NO, COUNT(*) n1
								FROM Follow f, User u
								WHERE f.User_Email = u.User_Email AND u.Age = $current_age
								GROUP BY f.Item_NO");
								echo mysql_errno($link) . ": " . mysql_error($link) . " ";
								echo "<p>There are " . mysql_num_rows($age_table) . " result(s) available</p>";
							    while( $row = mysql_fetch_assoc($age_table){
												          $asin = $row['Item_NO'];
												          $n1 = $row['n1'];
												          mysql_query( "UPDATE `Recommendation`
												          				SET `Age` = '$n1' 
												          				where `Item_NO` = '$asin'");
												          echo "<h1>$asin, $n1</h1>";
												          
												        }





					        }

*/

/*
	$count_age = mysql_query("SELECT f.Item_NO, COUNT(*)
	FROM Follow f, User u
	WHERE f.User_Email = u.User_Email AND $current_age = u.Age
	GROUP BY f.Item_NO");
	echo "<h1>This age has $count_age </h1><br />";

	$count_gender = mysql_query("SELECT f.Item_NO, COUNT(*)
	FROM Follow f, User u
	WHERE f.User_Email = u.User_Email AND $current_gender = u.gender
	GROUP BY f.Item_NO");
	echo "<h1>This gender has $count_gender </h1><br />";

	$count_income = mysql_query("SELECT f.Item_NO, COUNT(*)
	FROM Follow f, User u
	WHERE f.User_Email = u.User_Email AND $current_Income = u.Income
	GROUP BY f.Item_NO");
	echo "<h1>This gender has $count_income </h1><br />";


	
	$age_table = mysql_query("SELECT f.Item_NO, COUNT(*) n
	FROM Follow f, User u
	WHERE f.User_Email = u.User_Email AND u.Age = $current_age
	GROUP BY f.Item_NO");
	echo mysql_errno($link) . ": " . mysql_error($link) . " ";
	echo "<p>There are " . mysql_num_rows($age_table) . " result(s) available</p>";
    while( $row = mysql_fetch_assoc($age_table){
					          $asin = $row['Item_NO'];
					          $n = $row['n'];
					          mysql_query( "UPDATE `Recommendation`
					          				SET `Age` = '$n' 
					          				where `Item_NO` = '$asin'");
					          echo "<h1>$asin, $n</h1>";
					          
					        }
*/



?>

