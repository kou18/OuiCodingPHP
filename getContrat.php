<?php
require "init.php";

$id=$_GET['id'];
$sql= "SELECT a.*, b.joursConge  FROM `contrat` a, `users` b WHERE iduser=$id";
$result=mysqli_query($con,$sql);

$json_array=array();
$row=mysqli_fetch_assoc($result);
$json_array=$row;
echo json_encode($json_array);
mysqli_close($con);
?>
