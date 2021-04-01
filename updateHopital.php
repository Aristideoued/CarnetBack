<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
	$request=json_decode($postdata);

    $id=mysqli_real_escape_string($con,$_GET['id']);

	$nom=mysqli_real_escape_string($con,trim($request->nom));
	$province=mysqli_real_escape_string($con,trim($request->province));
	$ville=mysqli_real_escape_string($con,trim($request->ville));
	

	$sql="UPDATE Hopitaux SET nom='$nom',province='$province',ville='$ville' WHERE id=$id LIMIT 1 ";
	if(mysqli_query($con,$sql)){

		http_response_code(204);
	}
	else {
		return http_response_code(422);
	}

}



?>