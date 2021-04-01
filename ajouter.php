<?php 
require 'connect.php';

$postdata=file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){

    $requet=json_decode($postdata);

    $nom=mysqli_real_escape_string($con,trim($requet->nom));
    $prenom=mysqli_real_escape_string($con,trim($requet->prenom));
    $age=mysqli_real_escape_string($con,(int)$requet->age);
   
    $poids=mysqli_real_escape_string($con,(double)$requet->poids);
    $dateNais=mysqli_real_escape_string($con,$requet->dateNais);
    
    $taille=mysqli_real_escape_string($con,(double)$requet->taille);
    
    $sexe=mysqli_real_escape_string($con,$requet->sexe);

  

     function generateNumero_1($length = 8) {
      $characters = '0123456789';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[Rand(0, $charactersLength - 1)];
       }
      return $randomString;
     }

    $x="IDM";

    $bool=false;
    $i=0;
    $identifiant=[];
    $id="";

    while ($bool==false) {
        $x_1=generateNumero_1();
        $x.=$x_1;
        $id.=$x;
       $sql="SELECT * FROM patients WHERE sId='$id' ";
       if($result=mysqli_query($con,$sql)){
    
       while($row=mysqli_fetch_assoc($result)){
         $i++;
            }
        if($i==0){
             $sql1="INSERT INTO Patients (sId,
             nom,prenom,dateNais,age,poids,taille,sexe) VALUES ('$id','$nom','$prenom','$dateNais','$age','$poids','$taille','$sexe')
             ";

            if(mysqli_query($con,$sql1)){
              
              $identifiant[0]['sId']=$id;
              echo json_encode($identifiant);
             }
             else{
             http_response_code(422);
             }
             $bool=true;
            }
            else{
                $bool=false;
            }
        }
    }
    


   
}












?>