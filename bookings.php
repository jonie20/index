<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookings</title>
</head>
<body>
<?php
/*AttemptMySQLserverconnection.AssumingyouarerunningMySQL
serverwithdefaultsetting(user'root'withnopassword)*/

$host="sql202.epizy.com";
$user="epiz_29049548";
$password="3272680";
$db="epiz_29049548_clients";


//$conn = mysqli_connect('$host', '$user', '$password' , '$db');
//if($conn){
 //   echo "connection sucessfull";
//}



$link=mysqli_connect("$host","$user","$password","$db");
//Checkconnection
if($link===false){
die("ERROR:Could not connect.".mysqli_connect_error());
}
//Escapeuserinputsforsecurity
$name=mysqli_real_escape_string($link,$_REQUEST['name']);
$email=mysqli_real_escape_string($link,$_REQUEST['email']);
$intrested=mysqli_real_escape_string($link,$_REQUEST['intrested']);
$location=mysqli_real_escape_string($link,$_REQUEST['location']);
//Attemptinsertqueryexecution
$sql="INSERT INTO subscribe (name, email ,intrested,location ) VALUES('$name',
'$email','$intrested', '$location')";
if(mysqli_query($link,$sql)){
echo"<h4 style='text-align:center;color:green;'>Booked Successfully.</h4>";
header("refresh:1;url=client.html");
}else{
echo"ERROR:Could not able to execute $sql.".mysqli_error($link);
header("refresh:1;url=index.html");
}
//Closeconnection
mysqli_close($link);
?>
</body>
</html>