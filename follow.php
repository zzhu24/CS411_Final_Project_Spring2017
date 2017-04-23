<?php

    $link = mysql_connect('webhost.engr.illinois.edu', 'pricetracker_cs411', 'cs411');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('pricetracker_cs411');

   session_start();
   echo ($_SESSION['email']);
   $email_current=$_SESSION['email'];
   $Item_NO=$_POST["Item_NO"];

	$sql=mysql_query("INSERT INTO `Follow`( `User_Email`, `Item_NO`) VALUES ('$email_current','$Item_NO')");
    //echo ($_SESSION['email']);
    print("<h1>Follow successfully!</h1>");
?>