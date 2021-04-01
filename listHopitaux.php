<?php

require 'connect.php';
$hopitaux=[];
$sql="SELECT * FROM Hopitaux WHERE id!=6";
if($result=mysqli_query($con,$sql)){
	$cr=0;
	while($row=mysqli_fetch_assoc($result)){
		
		$hopitaux[$cr]['id']=$row['id'];
		$hopitaux[$cr]['nomh']=$row['nomh'];
		$hopitaux[$cr]['province']=$row['province'];
		$hopitaux[$cr]['ville']=$row['ville'];
		
		$cr++;
	}
	//print_r($patients);
	echo json_encode($hopitaux);

}
else{
	http_response_code(404);
}


?>