<?php 
require 'connect.php';
$postdata=file_get_contents("php://input");
$req=json_decode($postdata);
if (isset($postdata) && !empty($postdata)) {
	
    $idm=mysqli_real_escape_string($con,trim($req->idm));
   $idp=mysqli_real_escape_string($con,trim($req->idp));
   $maladie=mysqli_real_escape_string($con,trim($req->maladie));

    
	
$patients=[];


//$sql="SELECT maladie,resume FROM Consultation WHERE idm= $idm ";
$sql="SELECT nom,prenom,sId,resume,maladie FROM consultation,Patients WHERE consultation.idp='$idp' && consultation.idm='$idm' &&  consultation.maladie='$maladie' && Patients.sId=consultation.idp";
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
	    $patients[$cr]['sId']=$row['sId'];
		$patients[$cr]['nom']=$row['nom'];
		$patients[$cr]['prenom']=$row['prenom'];
		$patients[$cr]['maladie']=$row['maladie'];
		$patients[$cr]['resume']=$row['resume'];
		$patients[$cr]['medecin']=$idm;
	
		$cr++;
	}
	//print_r($patients);
	

    }
    else{
	http_response_code(404);
     }

	

echo json_encode($patients);


}




?>