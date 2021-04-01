<?php

require 'connect.php';
$patients=[];
$sql="SELECT * FROM patients";
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
		$patients[$cr]['sId']=$row['sId'];
		$patients[$cr]['nom']=$row['nom'];
		$patients[$cr]['prenom']=$row['prenom'];
		$patients[$cr]['dateNais']=$row['dateNais'];
		$patients[$cr]['age']=$row['age'];
		$patients[$cr]['poids']=$row['poids'];
		$patients[$cr]['taille']=$row['taille'];
		$patients[$cr]['sexe']=$row['sexe'];
		$cr++;
	}
	//print_r($patients);
	echo json_encode($patients);

}
else{
	http_response_code(404);
}


?>