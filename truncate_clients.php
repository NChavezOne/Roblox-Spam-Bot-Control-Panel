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
		$sql = "TRUNCATE TABLE clientconnector";

		if (mysqli_query($conn, $sql)) {
		  echo "<h1>Clients truncated successfully</h1>";  
		  header( "refresh:2; url=adminpage" );
		  session_start();
		} else {
		  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	mysqli_close($conn);
?>