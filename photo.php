<?php
 include "dbcon.php";
 $i=0;
 $result = mysqli_query($conn, "SELECT * FROM tbl_uploads");
 
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gazipur Student's Association,MBSTU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
  	div.gallery {
  border: 1px solid #ccc;
}


  </style>
</head>

  
  



<body>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <!-- Brand/logo -->
    <a class="navbar-brand" href="index.php"><img src="logo.jpg" style="width: 70px; height: 50px;"></a>
    
    <!-- Links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link " href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="photo.php">Photo Gallery</a>
      </li>
      <li class="nav-item">
      <a class="nav-link " href="aboutus.php">About Us</a>
    </li>
      <div class="topnav-right">
      <li class="nav-item" >
        <a class="nav-link" href="login.php">Login</a>
      </li></div>
    </ul>
  </nav>

  <h2 style="margin-left: 5px;text-align: center">Image Gallery</h2>
  <div class="container">
  <div class="gallery">
  <table>
    <?php

    while ($row = mysqli_fetch_array($result)) {
      if ($i%3==0) {
        echo "<tr>";
      }
    echo "<td><img src='images/$row[image]' title='$row[image_text]' class='gallery' height='200px' width='300px'> </td>";
    if ($i%3==2) {

      echo "</tr>";
    }
    $i++;
  }
    ?>

  </table>
</div>
</div>
</body>
</html> 


		

  