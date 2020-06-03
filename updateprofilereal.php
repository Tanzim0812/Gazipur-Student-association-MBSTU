<?php
require_once("dbcon.php");
session_start();
$opp=$_SESSION['authenticated'];
if ($opp != 'true') {
 header("location:login.php");
}



if (isset($_POST['Update'])) {
	  


	$sql="UPDATE gazipurassoc SET name='$_POST[name]',studentid='$_POST[studentid]',bloodgrp='$_POST[bloodgrp]',address='$_POST[address]',mobile='$_POST[mobile]',email='$_POST[email]' WHERE mobile='$_SESSION[mobile]' ";
	mysqli_query($conn,$sql);
	
	
	header("location:updateprofile.php");

	
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gazipur Student's Association,MBSTU</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style>
  	table{
  		width: 70%;
   color: #778475;
   font-family: Comic Sans MS, cursive, sans-serif ;
   font-size: 15px;
   text-align: center;
   margin-left: 10px;
  	}
  	
  	#left{
  		border: 0.5px solid grey;
  		padding: 2px;
  		margin-left: 10px
  	}
  	#right{
  		border: 0.5px solid grey;
  		padding: 2px;
  		margin-right: 10px
  		
  	}
  </style>

</head>
<h5 class="jumbotron bg-info text-center"> <strong>Update your profile,<?php echo$_SESSION['name']?></h5>
<body>
	<div class="float-left" id="left">
		<p align="center"><u>General information</u></p>
	<form method="POST">
	<table>
		<?php
   if(isset($_GET['studentid'])&&isset($_GET['dept'])) {
   	//$mobile=$_GET['mobile'];
   	$studentid=$_GET['studentid'];
   		$dept=$_GET['dept'];

      $sql="SELECT * FROM gazipurassoc WHERE studentid='$studentid' AND dept='$dept' ";
        $result=mysqli_query($conn,$sql);
        if ($result) {   
         while($row=$result->fetch_assoc()) {
   

		 ?>
		<tr>
			<td>Name :</td><td><input type="text" name ="name" class="form-control" placeholder="Your Name" value="<?php echo $row['name']?>"></td>
		</tr>
		<tr>
			<td>ID :</td><td><input type="number" name="studentid" class="form-control" placeholder="Your id" value="<?php echo $row['studentid']?>" readonly></td>
		</tr>
		<tr>
			<td>Dept :</td><td><input type="text" name="dept" class="form-control" value="<?php echo $row['dept']?>" readonly></td>
		</tr>
		
		<tr>
			<td>Blood Group :</td><td><input type="text" name="bloodgrp" class="form-control" maxlength="3" placeholder="Your blood group" value="<?php echo $row['bloodgrp']?>"></td>
		</tr>
		<tr>
			<td>Address :</td><td><input type="textarea" name="address" class="form-control"  placeholder="Your permanent address" value="<?php echo $row['address']?>"></td>
		</tr>
		<tr>
			<td>Mobile :</td><td><input type="text" name="mobile" class="form-control" maxlength="14" placeholder="Your mobile no" value="<?php echo $row['mobile']?>"></td>
		</tr>
		<tr>
			<td>Email :</td><td><input type="email" name="email" class="form-control" placeholder="Your email" value="<?php echo $row['email']?>"></td>
		</tr>
		
		

<?php }}}?>

		<tr>
			<td></td><td><br>
		<button class="btn btn-md btn-success btn-block" type="submit" name="Update">Save</button></td>
	</tr>

	</table>
</form>
</div>


<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------->



<div class="float-right" id="right">
	<p align="center"><u>Change Profile picture</u></p>
	<form method="post" enctype="multipart/form-data">

		<table>
		<?php
   if(isset($_GET['studentid'])&&isset($_GET['dept'])) {
   	//$mobile=$_GET['mobile'];
   	$studentid=$_GET['studentid'];
   		$dept=$_GET['dept'];

      $sql="SELECT * FROM gazipurassoc WHERE studentid='$studentid' AND dept='$dept' "; 
        $result=mysqli_query($conn,$sql);
        if ($result) {
         
         // output data of each row
         
         while($row=$result->fetch_assoc()) {
   

		 ?>



		<!--<tr>
			<td>New password :</td><td><input type="password" name="password" class="form-control" placeholder="Your New password" ></td>
		</tr> -->
	  
		<tr>
			<td>Update picture :<img style='width: 40px;height: 40px' src="<?php echo "profilepic/".$row['image'] ?>"></td><td><input type="file" name="image" accept="image/*" >
			</td>
		</tr>	
	<?php }}} ?>

		<tr>
			<td></td><td><br>
		<button class="btn btn-md btn-success btn-block" type="submit" name="Update_pic_and_password">Update</button></td>
	</tr>
	</table>
	</form>


	
	<?php

		if (isset($_POST['Update_pic_and_password'])) {

			//$password=md5($_POST['password']);
			
			$file_name=$_FILES['image']['name'];
	        $file_temp=$_FILES['image']['tmp_name'];
	        $folder="profilepic/";
	        move_uploaded_file($file_temp,$folder.$file_name);
		  		


	  		$sqll="UPDATE gazipurassoc SET image='$file_name' WHERE studentid='$studentid' AND dept='$dept' ";
	  		$ress=mysqli_query($conn,$sqll);

	  		if ($ress) {

	  			header("location:updateprofile.php");
	  		}

	  		else
	  		{
	  			echo "Error";
	  		}
			
		}



	?>

</div>
<a href="firstpass.php"><button class="btn btn-secondary">Change password</button></a>	
</body>
</html>