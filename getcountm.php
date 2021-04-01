<?php

require 'connect.php';
$patients=[];
$sql="SELECT nomh,hopital,COUNT(*) as cpt FROM Medecin,Hopitaux WHERE Hopitaux.id=Medecin.hopital  GROUP BY hopital HAVING hopital!=6 ORDER BY cpt DESC  " ;
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
		$patients[$cr]['hopital']=$row['hopital'];
		$patients[$cr]['nomh']=$row['nomh'];
		$patients[$cr]['cpt']=$row['cpt'];
		
		$cr++;
	}
	//print_r($patients);
	echo json_encode($patients);

}
else{
	http_response_code(404);
}


?>