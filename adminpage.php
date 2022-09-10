<!doctype html>
<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin - myrobuxgenerator.site</title>
		<link rel="stylesheet" href="style3.css"> <!-- include the CSS style sheet for the website -->
	</head>
	<body>
		<?php
		if ($_SESSION["logged"] == True) {
			//do nothing
		} else {
			echo $_SESSION["logged"];
			echo "<h1>Please log in.</h1>";
		}
		?>
		<?php if ($_SESSION["logged"] == True) : ?>
		
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
		$sql = "SELECT * FROM databaseinfo";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		?>	
		
		<h1>Spam bot Control Panel</h1>
		<button class="collapsible">Show/Hide Control panel</button>
		<div class="content">
			<p>Database origin date: <?php echo $row["origin"]?></p>
			<p>Database last backed up: <?php echo $row["backup"]?></p>

			<h3>Machine learning captcha solver</h3>
			<p>Tensorflow based convolutional neural network, compiled 8/15/22 based on sample size of 500</p>

			<h3>Spam bot Mode</h3>
			<p><b>Current mode: 
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
			$sql = "SELECT mode FROM spambotmode ORDER BY time DESC LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			if ($row["mode"] == "1") {
				echo "Multiple from list";
			}
			elseif ($row["mode"] == "0") {
				echo "One group";
			}
			?>	
			</b></p>
			<p>Select from spamming one group or multiple from list.</p>
			<form action="change_mode.php" method="post">
				<input type="radio" name="mode" value="multi">Multiple from list<br><input type="radio" name="mode" value="single">One group
				<br><input type="submit" name="submit" value="Change mode">
			</form>

			<?php if ($row["mode"] == "0") : ?>
			<div class="changegroupdiv">
				<h3>Current group being targeted for spam:</h3>
				<p>This option is visible because you are spamming only ONE group.</p>
				<p><a href="<?php 
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
					$sql = "SELECT * FROM spamgroup ORDER BY TIME DESC LIMIT 1";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					echo $row["groupspam"];

					?>"><?php echo $row["groupspam"];?></a></p>
				<p>Must be valid group link</p>
				<form action="change_group.php" method="post">
					<input type="text" name="grouplink">
					<input type="submit" name="submit" value="Change group">
				</form>
			</div>

			<?php elseif ($row["mode"] == "1") : ?>
			<div class="changegroupdiv">
				<h3>List of groups being targetted for spam:</h3>
				<p>This option is visible because you are spamming MULTIPLE groups.</p>
				<p><a href="<?php 
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
					$sql = "SELECT * FROM groupstospam";
					$result = $conn->query($sql);

					?>"><?php 
					while($row = $result->fetch_assoc()) {
						echo "<p><a href=" . $row["groupspam"] . "</a>" . $row["groupspam"] . "</p>";
					}
					?></a></p>
				<p>Must be valid group link</p>
				<form action="add_group.php" method="post">
					<input type="text" name="grouplink">
					<input type="submit" name="submit" value="Add group">
				</form>
			</div>
			<?php endif; ?>

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
			$sql = "SELECT SUM(messagessent) FROM machinelearning";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			?>

			<p>Total number of messages spammed: <span><?php echo $row['SUM(messagessent)'];?></span></p>

			<h3>Current message being spammed: </h3>

			<p>
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
				$sql = "SELECT * FROM spammessage ORDER BY time DESC LIMIT 1";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				echo $row["message"];

				?></p>
			<p>Max: 500 Characters</p>
			<form action="change_message.php" method="post">
				<input type="text" name="message">
				<input type="submit" name="submit" value="Change message">
			</form>

			<h3>Accounts</h3>

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
			?>

			<p>Unique Roblox accounts created so far: <span><?php echo $result->num_rows ?></span> accounts</p>

			<p>Click <a href="accounts">here</a> to see a full list of all accounts created</p>

			<h3>Client information</h3>
			<p>Client assumptions:
				<ul>
					<li>Full resolution 1920x1080</li>
					<li>Windows 11</li>
					<li>Downloaded Google Chrome</li>
				</ul>
			</p>
			<p><a href="https://github.com/NChavezOne/Roblox-Spam-Bot">Github Repo</a></p>
			<p><a href="https://www.dropbox.com/scl/fo/tko2t24ksw0d3tnllu7ix/h?dl=0&rlkey=pt5hrw83cpzl8ud5bjw0vz95y">Dependencies are on dropbox</a></p>
		</div>
		<!-- Seperate from top -->
		
		<h3>Connect clients</h3>
		<form action="truncate_clients.php" method="post">
			<input type="submit" name="submit" value="Truncate Clients">
		</form>
		<ul class="carousel">
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
			$sql = "SELECT * FROM clientconnector ORDER BY timecreated DESC";
			$result = $conn->query($sql);

			//=======================================

			if ($result->num_rows > 0) {
			  // output data of each row
				while($row = $result->fetch_assoc()) {

					$uuid = $row["uuid"];
					$pos = strpos($uuid, "-");
					$uuid = substr($uuid, 0, $pos);

					$lastpinged = time() - $row["lastpinged"];

					$toReturn = 
						"<li class=item>
							<p class=clientText> <b>" . $row["osname"] . "</b></p>"
							. "<p class=clientText>UUID: " . $uuid . "</p>" . 
							"<p class=clientText>Running commit " . $row["commit"] . "</p>
							<p class=clientText>" . $row["ipaddress"] . "</p>
							<p class=clientText>" . $row["internalip"] . "</p>
							<img class=clientImg src=img/userInterface/client_icon.png width=150 height=150>
							<p class=clientText id=indicator><span class=indic><img src=img/userInterface/greencircle.png width=13px>   Online</p></span>
							<p class=clientText><img src=img/userInterface/clock2.png width=13px>   Most recent ping: <span id=value class=value>" . $lastpinged
							 . "</span>s</p>
							<p class=clientText>   First connected: " . $row["timecreated"] . "</p>
						</li>";
					echo $toReturn;
				}
			} else {
			  echo "No clients connected or no client history";
			}

			?>
		</ul>
		<template>
			<h3>Connected clients</h3>
			<ul class="carousel">
				<li class="item">
					<p class="clientText"><b><?php echo $row["osname"];?></b></p>
					<p class="clientText">UUID: <?php echo $uuid ?></p><p class="clientText"><?php echo $row["ipaddress"];?></p>
					<p class="clientText"><?php echo $row["internalip"];?></p>
					<img class="clientImg" src="img/userInterface/client_icon.png" width="150" height="150">
					<p class="clientText" id="indicator"><img src="img/userInterface/greencircle.png" width="13px">   Online</p>
					<p class="clientText"><img src="img/userInterface/clock2.png" width="13px">   Most recent ping: <span id = "value"><?php echo $lastpinged;?></span>s</p>
					<p class="clientText">   First connected: <?php echo $row["timecreated"];?></p>
				</li>
			</ul>
		</template>
	
		<br>
		<h1>Milestones</h1>
		<button class="collapsible">Show/Hide Milestones</button>
		<div class="content">
			<h3>1000 Messages sent! 8/17/22</h3>
			<h3>2000 Messages 8/17/22</h3>
			<h3>SQL server reset somehow, tracking lost. 8/24/22</h3>
		</div>
		<br>
		<h1>Server statistics</h1>
		<button class="collapsible">Show/Hide server information</button>
		<div class="content">
			<p>This page was last updated: <span id="id01"><b>NaN</b></span></p>

			<h3>Uptime Monitoring</h3>
			<p>Uptime monitoring is provided by StatusCake</p>
			<h3>Server uptime for the past 30 days</h3>
			<a href="https://www.statuscake.com" title="Website Uptime Monitoring"><img src="https://app.statuscake.com/button/index.php?Track=wHP3HCYUWA&Days=30&Design=2" /></a>

			<br>
			<br>
			<h1>Server information</h1>

			<h3>FileZilla FTP Server</h3>
			<p>98.242.199.97 on port(s) 21, 14147</p>
			<p>Username: admin</p>
			<p>Password: alexander53</p>

			<h3>MySQL Server</h3>
			<p>98.242.199.97 or 127.0.0.1 on port 3306</p>
			<p>Database: maindatabase</p>
			<p>Username: root</p>
			<p>Password: poopoocaca51</p>

			<h3>Apache HTTP Server</h3>
			<p>98.242.199.97 on port(s) 80, 443</p>

			<h3>DDos Protection</h3>
			<p>Provider: Cloudflare</p>

			<h3>Domain Registrar</h3>
			<p>Provider: IONOS, inc.</p>
			<p>Nameservers:</p>
			<ul>
				<li>annabel.ns.cloudflare.com</li>
				<li>karl.ns.cloudflare.com</li>
			</ul>
		</div>

		<br>
		
		<h1>Changelog</h1>
		<button class="collapsible">Show/Hide Changelog</button>
		<div class="content">
			<h3>8-5-22</h3>
			<p>Server power supply failed. Broken beyond repair, switched to a different Core i3 machine and swapped hard drives - working without issues<br>
			had to switch port forwarding on router to change local IP from previous machine to new machine<br>Changed DCHP for host on router to reserved local IP 10.0.0.9</p>
			<h3>8-6-22</h3>
			<p>Granted all priviledges on the main database for the MySQL server running on 10.0.0.9 with the following query:<br><br><i>GRANT ALL PRIVILEGES ON maindatabase* TO 'root'@'%' WITH GRANT OPTION;</i><br><br>MySQL Connection using the mysql.connector python package on different host machine appears to be working as expected now,<br>can attempt to utilize MySQL for machine learning training</p>
			<h3>8-10-22</h3>
			<p>Implemented admin page authetification, MySQL for created roblox accounts, spam bot statistics</p>
			<p>Number of issues with the performance of the machine learning, going to analyze the audio for better analysis
			Start of first option: 2.020s <br>
			First test: <br>
				End of announcement: 2.961s <br>
				End of first option: 6.339 seconds, length 3.378 <br>
				End of second announcement: 7.751 <br>
				End of second option: 10.588 <br>
				End of third announcement: 11.587 <br>
				End of third option 14.896, or 15 seconds I guess<br>
				Let's just plug those values into the bot and see what it looks like. Well, we know for sure that the TTS for the captcha is always going to be the same length so let's start with that.<br>
				Option 1: 0.963s
				<br>
				Option 2: 0.952s
				<br>
				Option 3: 0.952
				<br>
				Audio clips appear to all be about 3.3, let's call it 3.2 seconds each. Now, we need to offload the processing after the recording to ensure no delays in the inner functions. So instead, we'll have the inner function simply return the data and and we'll do all the audio processing AFTER the audio is recorded</p>
			<h3>8-11-22</h3>
			<p>Note: The default speaker doesn't appear to be consistent, it can sometimes change and break the audio driver. This issue will need to be addresses before significant deployment of the bot.</p>
			<h3>8-17-22</h3>
			<p>Bot is working fully autonomous, machine learning working perfect, got bot working on second client but had to disable DHCP for the client device as well as append SQL priviledges using the command <br><i>GRANT ALL ON maindatabase to root@'10.0.0.24' IDENTIFIED BY 'poopoocaca51';</i></p>
			<p>Note: special characters don't properly render on SQL, need to find a workaround. Also reformat USB pls.</p>
			<h3>8-22-22</h3>
			<p>Working on integrating a system of multispam or single group spam.</p>
			<h3>8-24-22</h3>
			<p>Entire SQL server wiped. Going to create it all over again, all accounts and message tracking lost. Whaetever. Going to back it up often this time and write a stript for authenticating and backing up automatically.</p>
			<h3>9-5-22</h3>
			<p>Entire SQL Server hacked with ransomware. Try to get a mariaDB server up and running with the same credentials and setup phpMyAdmin. </p>
			<h3>9-6-22</h3>
			<p>Setting everything back up by just reinstalling XAMPP, going to get everything up and running again. A couple of notes: recreate FTP user for dreamweaver, disable PHP error messages, set up SQL again authorize all users.
			
			Root@localhost is being denied. going to try to grant it master access with the following command. 
			
			<i>GRANT ALL PRIVILEGES ON maindatabase* TO 'root'@'%' WITH GRANT OPTION;</i>
				
			<p>Didn't work. Solution was instead found in this stackoverflow post.
			
			<i>GRANT ALL PRIVILEGES ON *.* TO 'root'@'%.example.com' 
    IDENTIFIED BY 'some_characters' 
    WITH GRANT OPTION;
FLUSH PRIVILEGES;</i> <br> You need to replace localhost explicitly with the local IP of the server</p>
			
			<b>THERE IS NO WAY TO AUTOMATE GRANTING PRIVILEGES ON THE SERVER! THE ONLY WAY IS WITH THE FOLLOINW COMMAND AND PERFORMING THE TASK MANUALLY: <i>GRANT ALL ON maindatabase to root@'10.0.0.24' IDENTIFIED BY 'poopoocaca51';</i></b>
			
			</p>
		</div>
		<?php endif; ?>
	</body>
	<script>
		window.onload = changeClients()
		
		function changeClients(){
			const myItems = document.getElementsByClassName("item");
			const myValues = document.getElementsByClassName("value");
			const myIndicators = document.getElementsByClassName("indic");
			for (let z = 0; z < myItems.length; z++) {
				var timeSinceLastPing = myValues[z].innerHTML;
				if (parseInt(timeSinceLastPing) > 120) {
					//We are offline
					myIndicators[z].innerHTML = String.raw`<p class="clientText" id="indicator"><img src="img/userInterface/redcirc.png" width="13px">   Offline</p>`;
					myValues[z].innerHTML = ">2 Minute";
				}
			}
		}
	</script>
	<script>
		//page last updated
		const date = new Date(document.lastModified);
		var element = document.getElementById("id01");
		element.innerHTML = date;
	</script>
	<script>
		var coll = document.getElementsByClassName("collapsible");
		var i;
		
		for (i = 0; i < coll.length; i++) {
  			coll[i].addEventListener("click", function() {
    		this.classList.toggle("active");
    			var content = this.nextElementSibling;
    			if (content.style.maxHeight){
      				content.style.maxHeight = null;
    			}else {
      				content.style.maxHeight = content.scrollHeight + "px";
    			} 
  			});
		}
</script>
</html>