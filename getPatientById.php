<?php 
require 'connect.php';
$postdata=file_get_contents("php://input");
$req=json_decode($postdata);
if (isset($postdata) && !empty($postdata)) {
	$id=mysqli_real_escape_string($con,trim($req->id));

//$id=($_GET['id']);


$sql="SELECT * FROM Patients WHERE sId ='$id' LIMIT 1";

$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);

echo $json=json_encode($row);


}

?>