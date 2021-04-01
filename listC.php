<?php

require 'connect.php';
$patients=[];
$sql="SELECT nom,prenom,sexe,poids,age,nom_m,prenom_m,nomh,datec,mobileNumber,sId,idc,resume,maladie FROM consultation,Hopitaux,Medecin,Patients WHERE Patients.sId=consultation.idp && Hopitaux.id=consultation.idh && Medecin.identifiant=consultation.idm";
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
		$patients[$cr]['idc']=$row['idc'];
		$patients[$cr]['nomh']=$row['nomh'];
		$patients[$cr]['age']=$row['age'];
		$patients[$cr]['poids']=$row['poids'];
		$patients[$cr]['sexe']=$row['sexe'];
		$patients[$cr]['mobileNumber']=$row['mobileNumber'];
		$patients[$cr]['nom']=$row['nom'];
		$patients[$cr]['prenom']=$row['prenom'];
		$patients[$cr]['nom_m']=$row['nom_m'];
		$patients[$cr]['prenom_m']=$row['prenom_m'];
		$patients[$cr]['nomh']=$row['nomh'];
		$patients[$cr]['datec']=$row['datec'];
		$patients[$cr]['maladie']=$row['maladie'];
		$patients[$cr]['resume']=$row['resume'];
	
		$cr++;
	}
	//print_r($patients);
	echo json_encode($patients);

}
else{
	http_response_code(404);
}


?>