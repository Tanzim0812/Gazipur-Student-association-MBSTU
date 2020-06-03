<?php

include "dbcon.php";
session_start();
$opp=$_SESSION['authenticated'];
if ($opp != 'true') {
 header("location:adminpanel.php");
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/> 
	 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
	  <title>Gazipur Student's Association,MBSTU</title>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
</head>
<style>
	body {
font-family: cursive;
}

.navbar {
  overflow: hidden;
  background-color: #B36E6E;
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
<?php
 $sql="SELECT * FROM gazipurassoc";
  $result = $conn->query($sql);
      if ($result -> num_rows >0) {

?>

<body>
	
<div class="navbar">
  	<a href="adminuser.php">Home</a>
  
	  <div class="dropdown">
		    <button class="dropbtn"><span class="glyphicon glyphicon-chevron-down"></span>
		      <i class="fa fa-caret-down"></i>
		    </button>
		    <div class="dropdown-content">
		      <a href="admin.php"><img src="adminlogo.png" title="Admin" style="height: 25px; width:25px"></a>
		      <a href="logout.php"><img src="logout.jpg" title="Logout" style="height: 20px; width:20px"></a>
		    </div>
	  </div> 
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
                                    <td></td>
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
                                    <td>' ?><a style='color:#EA8383' onclick="return confirm('Are you sure you want to delete this item?');" href="deleteuser.php?id=<?php echo $row['id'] ?>">Delete</a> <?php '</td>


                                    
                                    
                              </tr>  
                               ';  
                          }  }
                          ?>  
                          
                     </table>  
                </div>  

        

  
   

</body>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
          
  
 </html>  
 <script>
 
	 $(document).ready(function(){  
	      $('#employee_data').DataTable();  
	 });  
 </script>
 