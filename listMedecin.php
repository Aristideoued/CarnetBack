<?php

require 'connect.php';
$medecins=[];
$sql="SELECT identifiant,nom_m,prenom_m,mobileNumber,nomh FROM Medecin,Hopitaux WHERE Medecin.hopital=Hopitaux.id and Hopitaux.id!=6  ";
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
		$medecins[$cr]['identifiant']=$row['identifiant'];
		$medecins[$cr]['nom_m']=$row['nom_m'];
		$medecins[$cr]['prenom_m']=$row['prenom_m'];
		$medecins[$cr]['mobileNumber']=$row['mobileNumber'];
		$medecins[$cr]['nomh']=$row['nomh'];
		
		$cr++;
	}
	//print_r($patients);
	echo json_encode($medecins);

}
else{
	http_response_code(404);
}


?>