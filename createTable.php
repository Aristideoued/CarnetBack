

<?php
require 'connect.php';
$r="create table if not exists Consultation(idc int(11) NOT NULL,idp varchar(16) NOT NULL,idm varchar(15) NOT NULL,idh int(11) NOT NULL,datec date NOT NULL,maladie varchar(60) NOT NULL,resume text(65000),foreign key(idp) references Patients(sId),foreign key(idm)references Medecin(identifiant),foreign key(idh) references Hopitaux(id),primary key(idc) auto_increment)";

if(mysqli_query($con,$r)){
	echo "Table Etudiant cree avec succes";
} else {
    echo "Error creating table: " . mysqli_error($con);

};

?>