<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
	$request=json_decode($postdata);

    $id=mysqli_real_escape_string($con,$_GET['id']);
    
    $idf=mysqli_real_escape_string($con,trim($request->identifiant));
	$nom=mysqli_real_escape_string($con,trim($request->nom_m));
	$prenom=mysqli_real_escape_string($con,trim($request->prenom_m));
	$numberp=mysqli_real_escape_string($con,($request->mobileNumber));
	$hp=mysqli_real_escape_string($con,(int)$request->hopital);
    $mdp=mysqli_real_escape_string($con,trim($request->mdp_1));

   
   

	$sql="UPDATE Medecin SET identifiant='$idf',nom='$nom',prenom='$prenom',mobileNumber='$numberp',hopital='$hp',mdp_1='$mdp' WHERE identifiant=$id LIMIT 1 ";
	if(mysqli_query($con,$sql)){

		http_response_code(204);
	}
	else {
		return http_response_code(422);
	}

}



?>