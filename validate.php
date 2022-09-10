<?php
	include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['password'];  
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($con, $username);  
        $password = mysqli_real_escape_string($con, $password);  
      
        $sql = "SELECT * FROM adminlogin WHERE username = '$username' AND password = '$password'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1>Login successful</h1>";  
			header( "refresh:2; url=adminpage" );
			session_start();
			$_SESSION["logged"] = True;
        }  
        else{  
            $_SESSION["logged"] = False;
			echo "<h1> Login failed. Invalid username or password.</h1>"; 
			sleep(2);
			header( "refresh:2; url=development" ); 
        }
?>