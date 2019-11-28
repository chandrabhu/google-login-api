<?php
require_once "config.php";
//Get Code 
if(isset($_SESSION['google_access_token'])){
	$gClient->setAccessToken($_SESSION['google_access_token']);
}else if (isset($_GET['code'])){
	$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
	$_SESSION['google_access_token'] = $token;
}else{
	//access token not found the open login page
	header('Location: index.php');
	exit;
}

$oAuth = new Google_Service_Oauth2($gClient);
$userData = $oAuth->userinfo->get();

//Set Session Data
$_SESSION['id'] = $userData->id;
$_SESSION['email'] =$userData->email;
$_SESSION['name'] =$userData->name;

header("Location: hello.php");
exit();

?>


