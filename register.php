<?php

require "init.php";

$id=$_POST["id"];
$nom= $_POST["nom"];
$prenom= $_POST["prenom"];
$entreprise= $_POST["entreprise"];
$email = $_POST["email"];
$mdp = $_POST["mdp"];

$sql = "SELECT * FROM users WHERE email= '$email' OR id='$id' ;";

$result= mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
	$status="User already exists";
}
else
{
	$sql= " INSERT INTO `users` (`id`, `nom`, `prenom`, `entreprise`, `role`, `email`, `mdp`, `joursConge`, `verifConge`, `path`) VALUES ('$id', '$nom', '$prenom', '$entreprise', 'RH', '$email', '$mdp', '0', '', ''); ";
	if(mysqli_query($con,$sql))
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