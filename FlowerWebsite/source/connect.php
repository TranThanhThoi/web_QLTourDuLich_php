<?php 
$con = mysqli_connect("localhost","root","") or die ("no connect");
mysqli_select_db($con,"flowerwebsite");
mysqli_query($con,"set names 'utf8'");
?>
