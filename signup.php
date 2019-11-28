<?php
require_once "userdetails.php";

$userClass = new UserDetails();
$error = '';

if (isset($_POST['signup'])) 
{
	$name     = $_POST['name'];
	$username = $_POST['username'];
	$email    = $_POST['email'];
	$password = $_POST['password'];

	/* Regular expression check */
	$username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
	$email_check = preg_match('~^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$~i', $email);
	$password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);

if($username_check && $email_check && $password_check && strlen(trim($name))>0){

$uid = $userClass->userRegistration($name,$username,$email,$password);
 
if($uid){
		//$_session['user_id'] = $uid;
          
          header("Location: index.php");
          exit();
	}

}else{
	$error = "Please enter correct username/Email";

}

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top: 80px;">
		
		<div class= "row justify-content-center">
			<div class="col-md-6 col-offset-3" align="center">
				<form style="border:1px solid #b5bfce; padding:10%;" action="signup.php" method="post"> 
                    <h3 align="center">Sign-Up For Section-Title</h3>
                    <?php echo $error ; ?>
                    <hr>
					<input placeholder = "Name..." type="text" name="name" class= "form-control" required><br>
					<input placeholder = "Username..." type="text" name="username" class= "form-control" required><br>
					<input placeholder = "Email..." type="email" name="email" class= "form-control" required> <br>
   					<input placeholder = "Password...(atleast 8 characters)" type="password" name="password" class= "form-control" required> <br>

					 <input type="submit" name="signup" value="Sign-Up" class= "btn btn-primary" /> <br>
					 Or <br>
					 <a href="index.php" class="btn btn-info btn">
          <span class="glyphicon glyphicon-arrow-left"></span> Go-Back
        </a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
