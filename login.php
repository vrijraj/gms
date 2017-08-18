<?php
	session_start();
	include("connection.php"); //Establishing connection with our database
	
	$error = ""; //Variable for storing our errors.
	if(isset($_POST["submit"]))
	{
		if(empty($_POST["email"]) || empty($_POST["pass"]))
		{
			$error = "Both fields are required.";
		}else
		{
			// Define $username and $password
			$email=$_POST['email'];
			$password=$_POST['pass'];

			// To protect from MySQL injection
			$email = stripslashes($email);
			$password = stripslashes($password);
			$email = mysqli_real_escape_string($db, $email);
			$password = mysqli_real_escape_string($db, $password);
			$password = md5($password);
			
			//Check username and password from database
			$sql="SELECT ad_id FROM admin_data WHERE ad_email='$email' and 	ad_pass='$password'";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			//If username and password exist in our database then create a session.
			//Otherwise echo error.
			
			if(mysqli_num_rows($result) == 1)
			{
				$_SESSION['email'] = $email; // Initializing Session
				header("location: /gms/home"); // Redirecting To Other Page
			}else
			{
				$error = "Incorrect username or password.";
			}

		}
	}

?>