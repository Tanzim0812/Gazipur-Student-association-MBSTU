<?php 
	include "dbcon.php";
	session_start();
	$msg;

	if (isset($_POST['Submit'])) {
	$name=$_POST['name'];
	$password=$_POST['password'];
	
	$sql="SELECT * FROM adminpanel WHERE name='$name' AND password='$password' ";
	$result=mysqli_query($conn,$sql);
	$row=$result->fetch_assoc();

	if ($row) {
		session_start();
		$_SESSION['name']=$row['name'];
		$_SESSION['authenticated']='true';
		header("location:admin.php");
		
	}

	else{
		$msg="Wrong password !!!!";
	}
}

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

</head>
<style>
	body{
		background-color: #373525;
	}
form{
	margin-top: 100px;
	margin-left: 200px;
}
.card-body{
  background-color: #8E8D7D;

}
.card-title {
  color: #21A22E;
}
.form-control{
  background-color: #E1F7E1;
}
</style>


<h3 style="text-align: center;padding: 30px;color:white ;background-color: #89887E">Admin Login</h3>
<h3 style="text-align: center;padding: 30px;color:white ;background-color: #A5A382"><?php if (isset($msg)) {
	echo"<p style='color:red'>". $msg."</p>";
} ?></h3>



<body>
	<div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
	<div class="container">
	<div class="card card-signin my-5">
    <div class="card-body" >
    
	
	<form method="post">
		<div class="form-label-group">
		<p>Username</p>	
		<input type="text" name="name" placeholder="Username"></div>
		<br>
		<div class="form-label-group">
			<p>Password</p>
		<input type="password" name="password" placeholder="password"></div>
		<br>

		<button class="btn btn-secondary" type="Submit" name="Submit" >Login</button>
		</div>
		

	</form>
	</div>
</div>
</div>
</div>
</div>


</body>
</html>