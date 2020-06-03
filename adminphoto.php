<?php
 include "dbcon.php";
 session_start();
 $opp=$_SESSION['authenticated'];
if ($opp != 'true') {
 header("location:adminpanel.php");
}
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

  
  


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<style>
  div.gallery {
  border: 1px solid #ccc;
}
</style>
<body>
  <div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
      <li class="nav-item">
        <a class="nav-link " href="admin.php">Admin Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="logout.php">logout</a>
      </li>
        
    </nav>

    <!-- Page Content -->
   

</div>       
  

  <h2 style="margin-left: 5px">Image Gallery</h2>
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


		

  </body>
  </html>