<?php

	require "connection.php";

	$id = "";
	$acceleration = $_POST["acceleration"];
	$accelTime = $_POST["accelTime"];

	// $acceleration = "1234";
	// $time = "20h30min43sec";

	$sql = "INSERT INTO sensor_values VALUES ('$id','$acceleration', '$accelTime');";

	mysqli_query($con, $sql);

	mysqli_close($con);

?>