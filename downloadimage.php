<?php
require "init.php";
$email=$_POST["email"];
$sql= "SELECT path from `users` where email='$email';";
$result=mysqli_query($con,$sql);
$path=mysqli_fetch_assoc($result);
echo json_encode($path);
mysqli_close($con);

?>
