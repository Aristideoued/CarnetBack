<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
	$request=json_decode($postdata);

    $id=mysqli_real_escape_string($con,$_GET['id']);
    
    $idp=mysqli_real_escape_string($con,trim($request->idp));
	$idm=mysqli_real_escape_string($con,trim($request->idm));
	$idh=mysqli_real_escape_string($con,trim($request->idh));
	$datec=mysqli_real_escape_string($con,($request->datec));
	$maladie=mysqli_real_escape_string($con,(int)$request->maladie);
    $resume=mysqli_real_escape_string($con,trim($request->resume));

   
   

	$sql="UPDATE consultation SET idp='$id',idm='$idm',idh='$idh',datec='$datec',maladie='$maladie',resume='$resume' WHERE idc=$id LIMIT 1 ";
	if(mysqli_query($con,$sql)){

		http_response_code(204);
	}
	else {
		return http_response_code(422);
	}

}



?>s