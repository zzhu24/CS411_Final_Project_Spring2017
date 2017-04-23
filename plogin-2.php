<?php

	$link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');

    session_start();
	$email=$_POST["username"];
	$password=$_POST["password"];

	$sql="SELECT * FROM User WHERE User_Email = '$email' ";

	print("<table width=\"100%\" border=\"1\" cellpadding=\"10\"> 
		<tr>
			<td  align=\"center\">
			<h1>Price Tracker Information Database</h1>
			<h2> CS411 </h2>
			<h3> Demo 1 !</h3>
			<h4> Login Page</h4>
			</td>
		</tr> ");
		
	     
	$res=mysql_query($sql);
	if (mysql_num_rows($res) < 1){
		print("<h1>Email doesn't exists</h1>");
	}
	else
	{
		$sql="SELECT * FROM User WHERE User_Email = '$email' AND User_Password = '$password' ";
        //echo ($email);
        //session_register("email");
        $_SESSION['email'] = $email;
        //echo ($_SESSION['email']);
		$res=mysql_query($sql);
		if (mysql_num_rows($res) < 1){
			print("<h1>Wrong Email Password Combination!</h1>");
		}
		else
		{
			print("<h1>Succeed</h1>");
		}
		
	}

//    echo ($_SESSION['email']);
////    $email_current=$_SESSION['email'];
//    $Item_NO=$_POST["Item"];
////    $sql="SELECT * FROM Follow WHERE User_Email = '$email_current' ";
//	$sql="INSERT INTO `Follow`( `User_Email`, `Item_NO`) VALUES ('tsha@illinois.edu','$Item_NO')";
//
//    print("<h1>You r Succeed!</h1>");

/*	
	if((mysql_num_rows($res)<1))
	{
		print("Email doesn't exists")
	}
	else
	{
	$sql="SELECT * FROM User WHERE User_Email = '$email' AND USER_Password = '$password'";
		
		if((mysql_num_rows(mysql_query($sql)) < 1)){
			print("Wrong Email Password Combination")
		}
		else{
			print("Login Success!!!!")
		}	
	}
	
*/
		
	mysql_close($link);



?>

