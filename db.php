<?php
$host="sql202.epizy.com";
$user="epiz_29049548";
$password="3272680";
$db="epiz_29049548_management";

$conn=mysqli_connect("$host","$user","$password","$db");
//Checkconnection
if($conn===false){
die("ERROR:Could not connect.".mysqli_connect_error());
}


?>