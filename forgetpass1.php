<?php

  if (isset($_POST['update'])) {
    
    include "dbcon.php";
    session_start();

    $email=$_POST['email'];
    $studentid=$_POST['studentid'];

    $sql="SELECT * from gazipurassoc where email='$email' AND studentid='$studentid' ";
    $res=mysqli_query($conn,$sql);
    $row=$res->fetch_assoc();

    if ($email==$row['email'] && $studentid==$row['studentid']) {
      
      $str="0123456789abcdefghijklmnopqrstuvwxyz";
      $str=str_shuffle($str);
      $str=substr($str,0,10);

      $password=md5($str);

      $sql1="UPDATE gazipurassoc SET password='$password' WHERE email='$email' AND studentid='$studentid'";
      $res1=mysqli_query($conn,$sql1);

      if ($res1) {
       
          echo "$str";


      }
      

      



    }


    else{
      
      $msg="<div class='container'><p class='text-danger'><strong>Hey!</strong> Information is wrong.<br> Do you want to go <a href='login.php'>back</a> ?</p></div>";
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
	
	<form method="post" style="width: 20%;border-style:dotted;margin:50px 300px 50px " action="forgetpass1.php">
		<div class="content">
		<div class="form-label-group"><label><b>Your email & Student_ID number</b></label>
                <input type="text" name="email" class="form-control" placeholder="Your email " required autofocus>
        </div><hr>
       <input type="number" name="studentid" class="form-control" placeholder="Your id" required>

        <button class="btn btn-info" type="submit" name="update">Submit</button>
        </div>
<?php  if(isset($msg)){
echo$msg;

}?>
	</form>


</body>
</html>
