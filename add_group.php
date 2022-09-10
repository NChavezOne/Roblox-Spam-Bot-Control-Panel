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
	
	$website = $_POST['grouplink'];
	if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
		echo "<h1>Group not added. Invalid link.</h1>";
		header( "refresh:2; url=adminpage" );
	  	session_start();
	} else {
		date_default_timezone_set("America/New_York");    
		$time = date("Y-m-d h:i:sa");

		$sql = "INSERT INTO groupstospam (groupspam, time)
		VALUES ('$website', '$time')";

		if (mysqli_query($conn, $sql)) {
		  echo "<h1>Group added successfully</h1>";  
		  header( "refresh:2; url=adminpage" );
		  session_start();
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);
?>