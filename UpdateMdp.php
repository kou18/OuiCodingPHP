<?php
require "init.php";

$mdp=$_POST["mdp"];
$email=$_POST["email"];
$sql= "UPDATE `users` SET `mdp`='$mdp' WHERE `email` ='$email'";
if(mysqli_query($con,$sql)){
	$status= "SUCCESS";
}
else {
	$status= "FAILED";
}

echo json_encode(array("response"=>$status));
mysqli_close($con);
?>
