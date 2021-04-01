<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){

	$requet=json_decode($postdata);
    
    $identifiant=mysqli_real_escape_string($con,trim($requet->identifiant));
	$nom=mysqli_real_escape_string($con,trim($requet->nom_m));
    $prenom=mysqli_real_escape_string($con,trim($requet->prenom_m));
    $phone=mysqli_real_escape_string($con,$requet->mobileNumber);
    $hp=mysqli_real_escape_string($con,(int)$requet->hopital);
    $mdp=mysqli_real_escape_string($con,trim($requet->mdp_1));
	$mdpc=hash('sha256', $mdp);

	$sql="INSERT INTO Medecin(identifiant,nom_m,prenom_m,mobileNumber,hopital,mdp_1) VALUES ('$identifiant','$nom','$prenom','$phone','$hp','$mdpc')
	";

	if(mysqli_query($con,$sql)){
		http_response_code(201);
	}
	else{
		http_response_code(422);
	}
}








?>