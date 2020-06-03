<?php
 include "dbcon.php";
 
session_start();
$opp=$_SESSION['authenticated'];
if ($opp != 'true') {
 header("location:login.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gazipur Student's Association,MBSTU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


  <style>
    body {
font-family: cursive;
background-color: #DEE9E9;
}

.navbar {
  overflow: hidden;
  background-color: #66CBCE;
}

.navbar a {
  float: left;
  font-size: 15px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #66999B;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #9AB68C;
}

.dropdown:hover .dropdown-content {
  display: block;
}

table {
   
   width: 70%;
   color: #778475;
   font-family: Comic Sans MS, cursive, sans-serif ;
   font-size: 17px;
   text-align: center;
   margin-left: 10px;
   
  
     } 
  th {
   background-color: #6BB1B3;
   color: white;
    }
  tr:nth-child(even) {background-color: #f2f2f2}
  h3{
    font-family: "Times New Roman", Times, serif;
  }
  

 </style>
 
</head>
<body>
  <div class="navbar">
  <a href="updateprofile.php">Home</a>
  
  <div class="dropdown">
    <button class="dropbtn"><?php echo $_SESSION['name']; ?>
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="userprofile.php"><img src="pro1.png" title="Users profile" style="height: 20px; width:20px"></a>
      <a href="logout.php"><img src="logout.jpg" title="Logout" style="height: 20px; width:20px"></a>
    </div>
  </div> 
</div>



 <table>
  <thead>
 <tr>
  <th>name</th> 
  <th>studentid</th>
  <th>dept</th> 
  <th>bloodgrp</th> 
  <th>address</th> 
  <th>mobile</th>
  <th>Email</th> 
  <th>picture</th>
  
  
   
 </tr>

</thead>
    
    <?php

      //$mobile=$_SESSION['mobile'];
      $studentid=$_SESSION['studentid'];
      $dept=$_SESSION['dept'];
      $sql="SELECT * FROM gazipurassoc WHERE studentid='$studentid' AND dept='$dept' ";
        $result=mysqli_query($conn,$sql);
        if ($result -> num_rows >0) {
         
         // output data of each row
         
         while($row = $result->fetch_assoc()) {
          
          echo "<tr><td>" . $row["name"]. "</td><td>" . $row["studentid"] . "</td><td>".$row["dept"]. "</td><td>".$row["bloodgrp"]."</td><td>".$row["address"]."</td><td>".$row["mobile"]."</td><td>".$row["email"]."</td><td>"."<img style='img-responsive; width:50px; height:50px;' src=profilepic/".$row["image"].">"."</td></tr>";
           $_SESSION['studentid']=$row['studentid'];
           $_SESSION['dept']=$row['dept'];
      }
      echo "</table>";
      } else { echo "0 results"; }

    ?>
<br>


  <p align="center">
    
    <a href="updateprofilereal.php?studentid=<?php echo$_SESSION['studentid'];?>&dept=<?php echo$_SESSION['dept'];?>"><button class="btn btn-secondary">Update your profile</button></a>
  
  <br><br>
   <h4 style="text-align:center">To Download your membership form click here
   <a class="btn" role="button" href="printpdf.php?studentid=<?php echo$_SESSION['studentid'];?>&dept=<?php echo$_SESSION['dept'];?>">Your Membership form</a></h4>
   
    <p style="color: tomato"><Strong>N:B:</strong>image may be not showing due to update issue. Please check your membership form and make sure image is there</p>
  
  </p>

</table>



</body>
</html>
