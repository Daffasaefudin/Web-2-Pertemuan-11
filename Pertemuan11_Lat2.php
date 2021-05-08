<?php
$conn = mysqli_connect("localhost","root","");
$dbname="lat_dbase";
$cek=mysqli_query($conn,"CREATE DATABASE $dbname") ;
if($cek){
echo "Database $dbname berhasil dibuat";
}
else {
  die("Couldn't Create Database: $dbname");
}
?>
