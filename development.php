<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Development - MyRobuxGenerator</title>
		<style>
			.error {
				color:red;
			}
		</style>
	</head>
	<body>
		<h1>Welcome</h1>
		
		<form method="post" action="validate">
			<span class="error">*required fields</span>
			<p>Username</p>
			<input type="text" name="username">
			<span class="error">*</span>
			<p>Password</p>
			<input type="password" name="password">
			<span class="error">*</span>
			<br>
			<br>
			<input type="submit" name="submit" value="Login">
		</form>
	</body>
</html>
