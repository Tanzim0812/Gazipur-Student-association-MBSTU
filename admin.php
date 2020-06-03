<?php
  // Create database connection
  session_start();
  include "dbcon.php";
  $opp=$_SESSION['authenticated'];
if ($opp != 'true') {
 header("location:adminpanel.php");
}
 
  //if ($_SESSION['authenticated'] != 'true') {
    //header("location:loginpg.php");
  
   

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($conn, $_POST['image_text']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO tbl_uploads (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($conn, "SELECT * FROM tbl_uploads");
?>
<!DOCTYPE html>
<html>
<head>

<title>Image Upload</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 80%;
   	padding: 2px;
   	margin: 5px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   .footer{position: fixed;
   left: 0;
   bottom: 0;
   width: 25%;
   background-color: #DF3C23;
   color: white;
   text-align: center;

   }
   h5{
   	right: 20;
   	text-align: right; 
   }
   .wrapper {
    display: flex;
    align-items: stretch;
}

.sidebar {
    min-width: 250px;
    max-width: 250px;
}


</style>
</head>
<body>
  <div class="wrapper">

    <!-- Sidebar -->
    <nav id="sidebar">
      <li class="nav-item">
        <a class="nav-link " href="adminphoto.php">AdminPhoto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="adminuser.php">AdminUser</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="logout.php">logout</a>
      </li>
        
    </nav>

    <!-- Page Content -->
   

</div>       



<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      echo $row['id'];
      	echo "<img src=images/".$row['image'].">";?>
        <a onclick="return confirm('Are you sure you want to delete this item?');" href="delete.php?image=<?php echo $row['id'] ?>">Delete</a>
      	<?php echo "<p>".$row['image_text']."</p>";
      echo "</div>";

    }
  ?>
  <form method="POST" action="" enctype="multipart/form-data">
  	
  	<div class="footer">
  	<div>
  	  <input type="file" name="image" multiple/>
      
  	</div>
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="2" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
  	</div>
  
  	<div>
  		<button type="submit" name="upload">POST</button>
    </div>
  	
    
  </form>
  

  </div>

</body>
</html>
