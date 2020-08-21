<?php

require "init.php";

$email = $_POST["email"];
$mdp = $_POST["mdp"];

$sql = "SELECT id,nom,prenom,role,email FROM users WHERE email= '$email' and mdp= '$mdp'";
$result =mysqli_query($con, $sql);

if(!mysqli_num_rows($result)>0)
{
	$status= "Failed";
	echo json_encode(array("response"=>$status));
}
else 
{
	$row=mysqli_fetch_assoc($result);
	$id=$row["id"];
	$prenom=$row['prenom'];
	$nom=$row['nom'];
	$role=$row['role'];
	$email=$row['email'];
	$status="ok";
	echo json_encode(array("response"=>$status, "id"=>$id , "prenom"=>$prenom, "nom"=>$nom, "role"=>$role, "email"=>$email));

}

mysqli_close($con);
?>