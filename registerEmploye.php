<?php

require "init.php";


$nom= $_POST["nom"];
$prenom= $_POST["prenom"];
$entreprise= $_POST["entreprise"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];
$id= $_POST["id"];
$type_contrat=$_POST["type"];
$date_debut=$_POST["debut"];
$date_fin=$_POST["fin"];

$sql = "SELECT * FROM users WHERE email= '$email' OR id=$id";

$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
	$status="User already exists";
}
else
{
	$sql= " INSERT INTO `users` (`id`, `nom`, `prenom`, `entreprise`, `role`, `email`, `mdp`, `joursConge`, `verifConge`, `path`) VALUES ('$id', '$nom', '$prenom', '$entreprise', 'Employe', '$email', '$mdp', '0', '$date_debut', ''); ";
    $sql2=" INSERT INTO `contrat` (`type`, `debut`, `fin`, `iduser`) VALUES ('$type_contrat', '$date_debut', '$date_fin', '$id'); ";
	if(mysqli_query($con,$sql) && mysqli_query($con,$sql2))
	{
		$status="User successfully Registered";
	}
	else 
	{
		$status="Error";
	}
	
}

echo json_encode(array("response"=>$status));
mysqli_close($con);

?>