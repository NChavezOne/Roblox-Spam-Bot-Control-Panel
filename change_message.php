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
	
	$message = $_POST['message'];
	if (strlen($message) > 499){
		echo "<h1>Message not changed. Must be less than 500 characters.</h1>";
		header( "refresh:2; url=adminpage" );
	  	session_start();
	} else {
		date_default_timezone_set("America/New_York");    
		$time = date("Y-m-d h:i:sa");

		$sql = "INSERT INTO spammessage (message, time)
		VALUES ('$message', '$time')";

		if (mysqli_query($conn, $sql)) {
		  echo "<h1>Message Changed successfully</h1>";  
		  header( "refresh:2; url=adminpage" );
		  session_start();
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
	mysqli_close($conn);
?>