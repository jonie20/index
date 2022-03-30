<?php
//session_start();
session_start();
if($_SESSION['name']){
       
echo "Welcome ".$_SESSION['name'];
}else{
   echo '<script type = "text/javascript">';
        echo 'alert("Not Logged in!");';
        echo 'window.location.href = "Loginguest.php" ';
        echo '</script>';
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Guest.css">

<link rel="shortcut icon" href="images/favicon.ICO" type="image/x-icon">

    <title>Administration</title>
<!--<style>
#img_div{
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }


</style>-->

</head>
<body >
<div class="pre-loader">
  <div class="sk-fading-circle">
    <div class="sk-circle1 sk-circle"></div><h1>Loading...</h1>
    <div class="sk-circle2 sk-circle"></div>
    <div class="sk-circle3 sk-circle"></div>
    <div class="sk-circle4 sk-circle"></div>
    <div class="sk-circle5 sk-circle"></div>
    <div class="sk-circle6 sk-circle"></div>
    <div class="sk-circle7 sk-circle"></div>
    <div class="sk-circle8 sk-circle"></div>
    <div class="sk-circle9 sk-circle"></div>
    <div class="sk-circle10 sk-circle"></div>
    <div class="sk-circle11 sk-circle"></div>
    <div class="sk-circle12 sk-circle"></div>
  </div>
</div>


<a class="clientlnk" style="color:white;background-color:black;text-decoration:none;font-size:20px auto;position:sticky;top:3px;padding:2px;margin-left:80%;margin-top:0px;" href="client.html" target="_blank">Client Area</a>

    <div>


<h2>Remember to Logout after visiting this page!!! </h2>

    
    <di><h2>People intrested for your tours</h2></div>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Intrested In</th>
                <th>Location</th>
            </tr>
            <?php

            $host="sql202.epizy.com";
$user="epiz_29049548";
$password="3272680";
$db="epiz_29049548_clients";


$link=mysqli_connect("$host","$user","$password","$db");
//Checkconnection
if($link===false){
die("ERROR:Could not connect.".mysqli_connect_error());
}




            
//$conn = mysqli_connect("sql202.epizy.com","epiz_29049548","
//zH9gPp4c73i1zx","epiz_29049548_clients");
           // if($conn->connect_error){
           //     die("connection failed:".$conn->connect_error);
            //}

            $sql = "SELECT name,email,intrested,location from subscribe";
            $result=$link->query($sql);

            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                  echo "<tr><td>".$row["name"]."</td><td>".$row["email"]."</td><td>".$row[
                  "intrested"]."</td><td>".$row["location"]."</td><td>";
                     
                }
                echo "</table>";
            }
            else{
                echo "No one checked-in your services";
            }
            $link->close();

            ?>
        </table>
    </div>
    <div >

   <h2> Click here to <a href = "logout.php">Logout</a></h2>
    
    
    
        
        
    </div>

   <!-- <?php
    $db = mysqli_connect("sql202.epizy.com", "epiz_29049548", "3272680", "epiz_29049548_image_upload");


    $result = mysqli_query($db, "SELECT * FROM images");
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>-->
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
(function($){
  'use strict';
    $(window).on('load', function () {
        if ($(".pre-loader").length > 0)
        {
            $(".pre-loader").fadeOut("slow");
        }
    });
})(jQuery)


</script>


</body>
</html>