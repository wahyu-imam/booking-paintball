<?php
$server   ="localhost" ;
$username ="root";
$password ="";
$database   ="paintball";
$con=mysqli_connect($server,$username,$password)or die ("Server Tidak Ditemukan");
$db=mysqli_select_db($con,$database)or die ("Database Tidak Ditemukan");
?>