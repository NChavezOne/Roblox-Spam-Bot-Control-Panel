<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "poopoocaca51";
	$dbname = "maindatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("MySQL Connection failed: " . $conn->connect_error);
	}
	
	$final_value = 0;
	$selected_radio = $_POST['mode'];	
	if ($selected_radio == 'single') {
		$final_value = 0;
	}
	elseif ($selected_radio == 'multi') {
		$final_value = 1;
	}
	date_default_timezone_set("America/New_York");    
	$time = date("Y-m-d h:i:sa");

	$sql = "INSERT INTO spambotmode (mode, time)
	VALUES ('$final_value', '$time')";

	if (mysqli_query($conn, $sql)) {
		echo "<h1>Spam bot mode changed successfully.</h1>";  
		header( "refresh:2; url=adminpage" );
		session_start();
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>