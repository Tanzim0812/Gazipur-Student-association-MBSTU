<?php
	include "dbcon.php";
	session_start();

	$opp=$_SESSION['authenticated'];
	if ($opp != 'true') {
	 header("location:login.php");
	}

	if (isset($_POST['update'])) {
		$studentid=$_SESSION['studentid'];
		$dept=$_SESSION['dept'];

		$password=md5($_POST['password']);


		$sql="UPDATE gazipurassoc SET password='$password' where studentid='$studentid' AND dept='$dept' ";
		$ok=mysqli_query($conn,$sql);

		if ($ok) {
			
			header("location:updateprofile.php");
		}
		else{
			echo "error ";
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
  <h6 style="text-align: center;">Login as : <?php echo $_SESSION['name'].$_SESSION['dept']; ?></h6>
</head>

<body>
	
	<form method="post" style="width: 20%;border-style:inset;margin:50px 100px 50px ">
		<div class="content">
		<div class="form-label-group"><label><b>New password</b></label>
                <input type="password" name="password" class="form-control" placeholder="Your New Password" required autofocus>
        </div><hr>
        <button class="btn btn-success" type="submit" name="update" onclick="return confirm('Are you sure want to update?')">Update</button>
        </div>

	</form>

</body>
</html>
