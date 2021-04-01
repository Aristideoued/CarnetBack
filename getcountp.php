<?php

require 'connect.php';
$patients=[];
$sql="SELECT maladie,COUNT(*) as cpte FROM Consultation GROUP BY maladie ORDER BY cpte DESC  " ;
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
		$patients[$cr]['maladie']=$row['maladie'];
		//$patients[$cr]['nomh']=$row['nomh'];
		$patients[$cr]['cpte']=$row['cpte'];
		
		$cr++;
	}
	//print_r($patients);
	echo json_encode($patients);

}
else{
	http_response_code(404);
}


?>