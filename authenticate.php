<?php 
require 'connect.php';
$postdata=file_get_contents("php://input");
$req=json_decode($postdata);
if(isset($postdata) && !empty($postdata)) {
	
    $username=mysqli_real_escape_string($con,trim($req->username));
    $mdp=mysqli_real_escape_string($con,trim($req->mdp));
   	$mdpcryp=hash('sha256', $mdp);


   $sql="SELECT identifiant,mdp_1 FROM Medecin WHERE identifiant='$username' and mdp_1= '$mdpcryp' ";
   if($result=mysqli_query($con,$sql)){
	   $rows=[];
	   while ($row=mysqli_fetch_assoc($result)) {
	    $rows[0]['username']=$row['identifiant'];
	    $rows[0]['mdp']=$row['mdp_1'];

	      }
       echo json_encode($rows);
    }

else{
	$rows[0]['username']="non";
    echo json_encode($rows);
	//http_response_code(404);
     }




}
 


?>