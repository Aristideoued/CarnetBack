<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){

	$requet=json_decode($postdata);
    
   
	$idp=mysqli_real_escape_string($con,trim($requet->idp));
    $idm=mysqli_real_escape_string($con,trim($requet->idm));
    $idh=mysqli_real_escape_string($con,(int)$requet->idh);
    $datec=mysqli_real_escape_string($con,$requet->datec);
    $maladie=mysqli_real_escape_string($con,trim($requet->maladie));
    $resume=mysqli_real_escape_string($con,($requet->resume));
	

	$sql="INSERT INTO Consultation(idp,idm,idh,datec,maladie,resume) VALUES ('$idp','$idm','$idh','$datec','$maladie','$resume')
	";

	if(mysqli_query($con,$sql)){
		http_response_code(201);
	}
	else{
		http_response_code(422);
	}
}








?>