<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
	$request=json_decode($postdata);

    $id=mysqli_real_escape_string($con,$_GET['id']);

	$nom=mysqli_real_escape_string($con,trim($request->nom));
	$prenom=mysqli_real_escape_string($con,trim($request->prenom));
	$dateNais=mysqli_real_escape_string($con,$request->dateNais);
    $age=mysqli_real_escape_string($con,(int)$request->age);
    $poids=mysqli_real_escape_string($con,(double)$request->poids);
    $taille=mysqli_real_escape_string($con,(double)$request->taille);
    $sexe=mysqli_real_escape_string($con,$request->sexe);

    $sql="UPDATE Patients SET nom='$nom',prenom='$prenom',dateNais='$dateNais',age='$age',poids='$poids',taille='$taille',sexe='$sexe' WHERE sId= '$id' LIMIT 1 ";

	if(mysqli_query($con,$sql)){

		http_response_code(204);
	}
	else {
		return http_response_code(422);
	}

}



?>