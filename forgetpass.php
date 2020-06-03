<?php

  if (isset($_POST['update'])) {
    $msg;
    include "dbcon.php";
    session_start();

    //$email=$_POST['email'];
    $mobile=$_POST['mobile'];

    $sql="SELECT * from gazipurassoc where mobile='$mobile' ";
    $res=mysqli_query($conn,$sql);
    $row=$res->fetch_assoc();

    if ($mobile==$row['mobile']) {
      
      header("location:forgetpass1.php");

    }
    else{
      $msg="<div class='container'><p class='text-danger'><strong>Hey!</strong> The mobile no. is wrong.<br> Do you want to go <a href='login.php'>back</a> ?</p></div>";
    }








  }






?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Change Password</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
  	h6{
  		background-color: #DF6A6A;
  		padding: 15px;
  	}
  </style>	
  
</head>

<body>
	
	<form method="post" style="width: 20%;border-style:dotted;margin:50px 300px 50px " action="forgetpass.php">
		<div class="content">
		<div class="form-label-group"><label><b>Your phone number</b></label>
                
        <input type="tel" name="mobile" class="form-control" maxlength="11" placeholder="Your mobile no" >
              </div>

        <button class="btn btn-info" type="submit" name="update">Next</button>
        </div>
<?php 
if (isset($msg)) {
  # code...


echo $msg;} ?>
	</form>

</body>
</html>
