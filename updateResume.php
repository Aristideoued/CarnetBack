<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
	$request=json_decode($postdata);

	$sId=mysqli_real_escape_string($con,$request->sId);
	$nom=mysqli_real_escape_string($con,trim($request->nom));
	$prenom=mysqli_real_escape_string($con,trim($request->prenom));
    $maladie=mysqli_real_escape_string($con,$request->maladie);
    $resume=mysqli_real_escape_string($con,trim($request->resume));
    $medecin=mysqli_real_escape_string($con,trim($request->medecin));

    $sql="UPDATE Consultation SET resume='$resume' WHERE consultation.idp='$sId' && consultation.idm='$medecin' &&  consultation.maladie='$maladie'  LIMIT 1 ";

	if(mysqli_query($con,$sql)){

		http_response_code(204);
	}
	else {
		return http_response_code(422);
	}

}



?>