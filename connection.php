<?php
	
	$host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "waketimer";

	/* Attempt to connect to MySQL database */
	$con = mysqli_connect($host, $db_user, $db_pass, $db_name);
	
	// Check connection
	if($con === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

?>