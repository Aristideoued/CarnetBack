<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){

	$requet=json_decode($postdata);

	$nom=mysqli_real_escape_string($con,trim($requet->nomh));
    $province=mysqli_real_escape_string($con,trim($requet->province));
    $ville=mysqli_real_escape_string($con,trim($requet->ville));
	

	$sql="INSERT INTO Hopitaux (nomh,province,ville) VALUES ('$nom','$province','$ville')
	";

	if(mysqli_query($con,$sql)){
		http_response_code(201);
	}
	else{
		http_response_code(422);
	}
}








?>