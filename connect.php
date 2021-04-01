<?php 

define('DB_HOST','localhost');

define('DB_USER','root');

define('DB_PASS','root');

define('DB_NAME','Carnet');
define('DB_PORT','8889');

function connect(){
	
	$connect=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	if(mysqli_connect_errno($connect)){
	 die("echec de connection à la base: " . mysqli_connect_error());
	}
	mysqli_set_charset($connect,"utf8");
	return $connect;
}
$con=connect();
?>