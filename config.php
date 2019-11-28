<?php

session_start();
require "vendor/autoload.php";


/*  Google API login Setup   */
$gClient = new Google_CLient();
$gClient->setClientId("682481523886-e12tqjnqk6u6o08q2ir0s45lsn5mvmco.apps.googleusercontent.com");
$gClient->setClientSecret("SZkijvf0F_8ldQ7wR5N0RdUq");
$gClient->setApplicationName("CPI Login Tutorial");
$gClient->setRedirectUri("http://localhost/UI_project/g_callback.php");

//Google Authorization to get Details 
$gClient->addScope("https://www.googleapis.com/auth/plus.login");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.email");


/* Facebook API login Setup  */
$FB = new \Facebook\Facebook([
 'app_id' => '378095093050017',
 'app_secret'=> '229db002854cca6d04d0ea8e9aff9bfb',
 'default_graph_version' => 'v3.3'
]);


//$helper = $FB->getRedirectLoginHelper();
//if(isset($_GET['state'])){
//$helper->getPersistentDataHandler()->set('state',$_GET['state']);
//}

?>
