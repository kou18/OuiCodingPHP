<?php
require "init.php";

$sql= "SELECT iduser FROM `contrat` WHERE DATEDIFF(fin,CURRENT_DATE)<7 AND DATEDIFF(fin,CURRENT_DATE)>0";
$result=mysqli_query($con,$sql);
$json_array=array();
while($row=mysqli_fetch_array($result)){
  $sql2= "SELECT nom,prenom from `users` WHERE id='$row[iduser]';";
  $result2=mysqli_query($con,$sql2);
  $row2=mysqli_fetch_assoc($result2);
  $json_array[]=$row2;
}

echo json_encode($json_array);
mysqli_close($con);
?>