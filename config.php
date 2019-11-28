<?php

session_start();
require "./../../vendor/autoload.php";


/*  Google API login Setup   */
$gClient = new Google_CLient();
$gClient->setClientId("6824815212345-e12tqjnqk1234508q2ir0s45lsn5mvmco.apps.googleusercontent.com");
$gClient->setClientSecret("SZkijvf0F_8ldQ7wR5N0RdUq");
$gClient->setApplicationName("CPI Login Tutorial");
$gClient->setRedirectUri("http://localhost/PROJECT_NAME/g_callback.php");

//Google Authorization to get Details 
$gClient->addScope("https://www.googleapis.com/auth/plus.login");
$gClient->addScope("https://www.googleapis.com/auth/userinfo.email");


?>
