<?php

session_start();

$host="sql202.epizy.com";
$user="epiz_29049548";
$password="3272680";
$db="epiz_29049548_management";

$conn=mysqli_connect("$host","$user","$password","$db");
//Checkconnection
if($conn===false){
die("ERROR:Could not connect.".mysqli_connect_error());
}


if (isset($_POST['submit1'])){
        $Name = $_POST['adminn'];
        $Adress = $_POST['adress'];

        

    $select = " SELECT * FROM manage WHERE name = '$Name' and password = '$Adress' ";
    $result = mysqli_query($conn,$select);
    $row  = mysqli_fetch_array($result);

    if(is_array($row)) {
        $_SESSION["name"] = $row['name'];
        $_SESSION["adress"] = $row['password'];
        $_SESSION['last_time'] = time();

       // header("Location:Guest.php");
    }   
    else {
        echo '<script type = "text/javascript">';
        echo 'alert("Invalid Admin or Address,try again.");';
        echo 'window.location.href = "Loginguest.php" ';
        echo '</script>';
    }
    }
   // if(isset($_SESSION["name"]) && $_SESSION["name"] === true){
   // header("location: Guest.php");
   // exit;
//}

    if(isset($_SESSION["name"])){
        header("Location:Guest.php");
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Guest.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">

<link rel="shortcut icon" href="images/favicon.ICO" type="image/x-icon">
    
    <script type="text/javascript" >

      function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

    </script>
    <title>Login</title>
</head>
<body>



    <form id="Gform" name="adform" action="Loginguest.php" method="POST" onsubmit="validate()" >
        <label class="lbl1">Admin Login</label><br>
        <label class="lbl"><i class="fa fa-user"></i> Admin:</label><br>
        <input type="text" id="username" class="form-control" name="adminn" placeholder="name" required><br>
        <label class="lbl"><i class="fa fa-key"></i> Address:</label><br>
        <input type="password"  id="password" class="form-control" name="adress" placeholder="unique address" required><br>
        
        <button type="submit" name="submit1"  id="submit" class="form-control"><i class="fa fa-sign-in"></i>  Login</button>

        
 

    </form>
  





        <button class="open-button" onclick="openForm()">register</button> 
        

        <div class="form-popup" id="myForm">
    <form action="register.php" class="form-container">
      <h2>Management Only</h2>
  
      <label for="name"><b>First Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required>

      <label for="intrested"><b>Unique Address</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
  

      
      <label for="location"><b>Occupation</b></label>
      <br>
      <select name="occupation">
        <option value="Select" selected disabled>--select--</option>
        <option value="Manager">Manager</option>
        <option value="Patner">partner</option>
        <option value="Customer care">Customer Care</option>
        
        </select>
      <!--<input type="text" placeholder="Enter county" name="location" required>-->
  
      <button type="submit" class="btn">Register</button>
      <button type="submit" class="btn cancel" onclick="closeForm()"><i class="fa fa-remove"></i> Close</button>
    </form>
     </div>
    
</body>
</html>