<?php 
class Database{
public function getDB(){
	$connect = new PDO("mysql:host=localhost; dbname=session_project", "root", "");
	return $connect;
}
}
?>
