<?php
 
require_once "config.php";

if(isset($_SESSION['google_access_token']) || isset($_SESSION['user_id']) || isset($_SESSION['fb_access_token']) ){

unset($_SESSION['google_access_token']);
$gClient->revokeToken();

unset($_SESSION['user_id']);
unset($_SESSION['fb_access_token']);
session_destroy();
header("Location: index.php");
exit;
}else{
	header("Location: index.php");
	exit();
}
?>