<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered</title>
</head>
<body>
<?php
/*AttemptMySQLserverconnection.AssumingyouarerunningMySQL
serverwithdefaultsetting(user'root'withnopassword)*/
//$link=mysqli_connect("sql202.epizy.com","epiz_29049548","
//zH9gPp4c73i1zx","epiz_29049548_management");
$host="sql202.epizy.com";
$user="epiz_29049548";
$password="3272680";
$db="epiz_29049548_management";


$link=mysqli_connect("$host","$user","$password","$db");
//Checkconnection
if($link===false){
die("ERROR:Could not connect.".mysqli_connect_error());
}


//Checkconnection
//if($link===false){
//die("ERROR:Could not connect.".mysqli_connect_error());
//}
//Escapeuserinputsforsecurity
$name=mysqli_real_escape_string($link,$_REQUEST['name']);
   

$email=mysqli_real_escape_string($link,$_REQUEST['email']);
$password=mysqli_real_escape_string($link,$_REQUEST['password']);
$occupation=mysqli_real_escape_string($link,$_REQUEST['occupation']);
$check_duplicate_username="SELECT occupation FROM manage where occupation='$occupation' ";
   $result=mysqli_query($link,$check_duplicate_username);
   $count=mysqli_num_rows($result);
     if($count > 0){
      echo "<h1 style='text-align:center;'>Already Registered,Try later!</h1> ";
      header("refresh:2;url=Loginguest.php");
      return false;
     }
//$location=mysqli_real_escape_string($link,$_REQUEST['location']);
//Attemptinsertqueryexecution
$sql="INSERT INTO manage (name, email ,password ,occupation ) VALUES('$name',
'$email', '$password','$occupation')";
if(mysqli_query($link,$sql)){
echo"<h4 style='color:green;text-align:center;'>Registered  successfully.</h4>";
header("refresh:1;url=Loginguest.php");
}else{
echo"ERROR:Could not able to execute $sql.".mysqli_error($link);
header("refresh:1;url=index.html");
}
//Closeconnection
mysqli_close($link);
?>
</body>
</html>