<?php

require "init.php";


$email=$_POST["email"];
$nbjours=$_POST["nbjours"];


$sql= "UPDATE `users` SET `joursConge` = `joursConge`-'$nbjours' ,
                   `verifConge` = CURRENT_DATE
					  WHERE `email` = '$email';";
if(mysqli_query($con,$sql)){	
		$status="Success";
	}
	else 
	{
		$status="Error";
	}

	
echo json_encode(array("response"=>$status));
mysqli_close($con);
