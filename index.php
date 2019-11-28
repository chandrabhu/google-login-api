<?php

require "config.php";
require "Userdetails.php";
require './../../vendor/autoload.php';

//Google Login Url
$loginURL = $gClient->createAuthUrl();


//User login Data
//Object of UserDetails from userdetails.php File
$userClass = new UserDetails();
$login_error_message ='';
//Simple Login with email and Password
if (isset($_POST['login'])) 
{
	$email    = trim($_POST['email']);
	$password = trim($_POST['password']);

	/* Regular expression check */
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

	if( $email_check && $password_check){

		$uid = $userClass->userLogin($email,$password);

		If($uid){
			//$_SESSION['user_id'] = $uid;

			header("Location: hello.php");
			exit();
		}else{
			$login_error_message  = "Invalid login Details!";
		}
	}else{
		$login_error_message ="Please enter correct email/password";
	}
	
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login/Signup </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container" style="margin-top: 80px;">
		
		<div class= "row justify-content-center">
			<div class="col-md-6 col-offset-3" align="center">
				
				<form style="border:1px solid #b5bfce;  padding:10%;" action="index.php" method = "post"> 

					<h3 align="center">Login Into Section Title</h3>
					<?php if($login_error_message){ echo '<p style="background-color: red; color:white;"> **'.$login_error_message.'</p>' ; } ?> 
					<hr>
					
					<input placeholder = "Email..." type="" name="email" class= "form-control" autocomplete="off"> <br>
					<input placeholder = "Password..." type="password" name="password" class= "form-control" autocomplete="off"> <br>

					<span><input type="submit" Value="Log In"  name= "login" class="btn btn-primary"/> 
						
						<b>OR</b>
						<i> New User? </i> <a href="signup.php"> Sign Up </a></span>
						<br>
						<p align="center">------------------------------------------------------</p>

						<p>Login with Social Sites: </p>

						<input type="button" Value="Log In with Facebook" onclick=" window.location = '<?php echo $fb_login_Url ;?>'" class="btn btn-primary "/>

						<input type="button" onclick=" window.location = '<?php echo $loginURL ;?>' " Value="Log In with Google" class="btn btn-danger"/>

					</form>
				</div>
			</div>
		</div>
	</body>
	</html>
