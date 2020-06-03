<?php
  include "dbcon.php";
  session_start();
 $opp=$_SESSION['authenticated'];
if ($opp != 'true') {
 header("location:login.php");
}
       
 
?>


<!DOCTYPE html>
<html>
<head>
  <title>Gazipur Student's Association,MBSTU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
  </head>
<style>
body {
font-family: cursive;
}

.navbar {
  overflow: hidden;
  background-color: #578356;
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
  background-color: #A3AB3C;
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


  
</style>

<?php
 $sql="SELECT * FROM gazipurassoc";
  $result = $conn->query($sql);
      if ($result -> num_rows >0) {

?>
<body>

<div class="navbar">
  
  <a href="updateprofile.php">Your profile</a>
  
  <div class="dropdown">
    <a href="logout.php">Logout</a>
  </div>
  
  <h4 style="text-align: center;color: yellow">
      <?php
        echo $_SESSION['name'];
       ?>
   </h4>
  
</div>

<div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>name</td>  
                                    <td>student id</td>  
                                    <td>dept</td>  
                                    <td>bloodgroup</td>  
                                    <td>address</td> 
                                    <td>mobile</td> 
                               </tr>  
                          </thead>  
                          <?php  
                           while($row = $result->fetch_assoc())  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["name"].'</td>  
                                    <td>'.$row["studentid"].'</td>  
                                    <td>'.$row["dept"].'</td>  
                                    <td>'.$row["bloodgrp"].'</td>  
                                    <td>'.$row["address"].'</td>
                                    <td>'.$row["mobile"].'</td>  
                               </tr>  
                               ';  
                          }  }
                          ?>  
                     </table>  
                </div>  

        



</body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#employee_data').DataTable();  
 });  
 </script>  
