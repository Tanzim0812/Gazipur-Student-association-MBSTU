<?php
include "dbcon.php";

if(isset($_GET['studentid'])&&isset($_GET['dept'])) {
    //$mobile=$_GET['mobile'];
    $studentid=$_GET['studentid'];
      $dept=$_GET['dept'];

      $sql="SELECT * FROM gazipurassoc WHERE studentid='$studentid' AND dept='$dept' "; 
        $result=mysqli_query($conn,$sql);
        if ($result) {
         
         while($row=$result->fetch_assoc()) {
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->
<title>Gazipur Student's Association,MBSTU</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  
  
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
 
  
</head>
<style>
  
  div.main{
    border: 2px solid grey;
    margin-right: 30px;
    margin-left: 30px;
    margin-top: 30px;
    margin-bottom: 30px;

  }
  @media print { .print-button { display:none; } }
</style>

<body>

<div class="main">
  
  
  <h4 style="text-align: center;padding: 20px;background-color:#F4F4B8"><b>Gazipur Student's Association, MBSTU</b></h4>
  <img src="logoo.jpg" style="width: 130px;height: 130px ;margin-right:20px" align="right">
  
  <div > 
      <img style='width: 200px;height: 200px;border-radius: 90px;margin-left: 5px' src="<?php echo"profilepic/".$row['image'] ?>">
  </div>
 
  
  
  
<ul class="list-group">
  <li class="list-group-item"><p style="color: red">Full Name : </p><?php echo $row['name']?></li>
  <li class="list-group-item"><p style="color: red">Student ID : </p><?php echo $row['studentid']?></li>
    <li class="list-group-item"><p style="color: red"> Department : </p> <?php echo $row['dept']?></li>
    <li class="list-group-item"><p style="color: red"> Blood group : </p> <?php echo $row['bloodgrp']?></li>
    <li class="list-group-item"><p style="color: red">Address : </p> <?php echo $row['address']?></li>
    <li class="list-group-item"><p style="color: red"> Mobile : </p> <?php echo $row['mobile']?></li>
    
  </ul>
<section class="py-2">
  <p class="lead" style="margin: 5px">উক্ত পত্র এসোসিয়েশনের সদস্যপদ হিসেবে বিবেচিত হইবে। কোন ধরনের গোলযোগ দেখা দিলে অতিস্বত্তর প্রোফাইল ইডিট করার জন্য বলা হচ্ছে।</p>
  
</section>
<br><br>
<p class="d-inline " style="text-align: right;margin-right: 10px;float: right">Signature of Secretary</p>
<p class="d-inline " style="text-align: left;margin-left: 10px">Signature of President</p>
  
</div>
<div class="container">
<a class="print-button btn btn-info" title="Print Screen" onclick="window.print();" target="_blank" style="cursor:pointer;">Print this page</a>
</div>



</body>  
<?php
}}}
?>
</html>