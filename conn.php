<?
session_start();
include("vendor/autoload.php");
use Facebook;

$FB = new \Facebook\Facebook(['app_id' => '378095093050017','app_secret'=> '229db002854cca6d04d0ea8e9aff9bfb','default_graph_version' => 'v3.3']);


$helper = $FB->getRedirectLoginHelper();

$redirectURL = "http://localhost/UI_project/test_fb.php";
$permissions = ['email'];
$login_Url = $helper->getLoginUrl($redirectURL, $permissions);

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
				

						<input type="button" Value="Log In with Facebook" onclick=" window.location = '<?php echo $login_Url ;?>'" class="btn btn-primary "/>

				</div>
			</div>
		</div>
	</body>
	</html>
