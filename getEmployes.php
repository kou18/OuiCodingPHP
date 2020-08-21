<?php
require "init.php";


$sql= "SELECT a.`id`, a.`nom`, a.`prenom`, a.`email`, b.`type`, b.`debut`, b.`fin` FROM `users` a, `contrat` b WHERE a.`id`=b.`iduser`";
$result=mysqli_query($con,$sql);

$json_array=array();
$row=mysqli_fetch_assoc($result);
while($row=mysqli_fetch_assoc($result)){
	$json_array[]=$row;
}
echo json_encode($json_array);
mysqli_close($con);
?>