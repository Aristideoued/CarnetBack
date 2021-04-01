<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){

	$requet=json_decode($postdata);

	$nom=mysqli_real_escape_string($con,trim($requet->nom));
	$prenom=mysqli_real_escape_string($con,trim($requet->prenom));
    $age=mysqli_real_escape_int($con,$requet->age);
    $age=intval($age);
    $poids=mysqli_real_escape_string($con,$requet->poids);
    $poids=doubleval($poids);
    $taille=mysqli_real_escape_string($con,$requet->taille);
    $taille=doubleval($taille);
	$sexe=mysqli_real_escape_string($con,$requet->sexe);


	$sql="INSERT INTO Patients (
     nom,prenom,age,poids,taille,sexe) VALUES ('".$nom."','".$prenom."','".$age."','".$poids."','".$taille."','".$sexe."')
	";

	if(mysqli_query($con,$sql)){
		http_response_code(201);
	}
	else{
		http_response_code(422);
	}
}








?>