<?php

require "init.php";

$nom= $_POST["nom"];
$prenom=$_POST ["prenom"];
$email=$_POST["email"];
$upload_path='image/';


$fileinfo=pathinfo($_FILES['image']['name']);
$extension=$fileinfo['extension'];
$file_path=$upload_path.'IMG_'.$nom.'_'.$prenom.'.'.$extension;


$sql= "UPDATE `users` SET `path` = '$file_path' WHERE `users`.`email` = '$email' ;";
if(mysqli_query($con,$sql)){
	if(move_uploaded_file($_FILES['image']['tmp_name'],$file_path) )
	{
		
		$status="Image successfully uploaded";
	}
	else 
	{
		$status="Error";
	}
}
else{
	$status="error";
}

	
echo json_encode(array("response"=>$status));
mysqli_close($con);
