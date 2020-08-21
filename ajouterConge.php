<?php
require "init.php";


$sql= "UPDATE `users`
       SET `joursConge` = `joursConge`+2.5
	   WHERE (CURRENT_DATE-`verifConge`)>= 30";
	   
if(mysqli_query($con,$sql))
{
   echo "Success";
}
else {
	echo "Failed";
}
mysqli_close($con);
?>