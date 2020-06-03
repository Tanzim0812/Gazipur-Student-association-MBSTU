<?php
include "dbcon.php";

if(isset($_GET['mobile'])){
    $mobile=$_GET['mobile'];
      $sql="SELECT * FROM gazipurassoc WHERE mobile=$mobile ";
        $result=mysqli_query($conn,$sql);
        if ($result) {
         
         while($row=$result->fetch_assoc()) {
   


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gazipur Student's Association,MBSTU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
</head>
<style>
  
  div.main{
    border: 1px solid black;
    margin-right: 30px;
    margin-left: 30px;
    margin-top: 30px;
    margin-bottom: 30px;
  }
  table{
      width: 70%;
   color: black;
   font-family: Comic Sans MS, cursive, sans-serif ;
   font-size: 15px;
   text-align: center;
   margin-left: 10px;
    }
</style>

<body>

<div class="main">
  <h4 style="text-align: center;">Gazipur Student's Association, MBSTU</h4>
  
  <div class="float-right"> 
      <img style='width: 200px;height: 200px' src="<?php echo $row['image'] ?>">
  </div>
  
  
  
<ul class="list-group">
  <li class="list-group-item"><p style="color: red">Full Name : </p><?php echo $row['name']?></li>
  <li class="list-group-item"><p style="color: red">Student ID : </p><?php echo $row['studentid']?></li>
    <li class="list-group-item">Address :  <?php echo $row['address']?></li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
  </ul>


  
</div>



</body>  
<?php
}}}
?>
</html>


/* <?php

// This will return all files in that folder
$files = scandir("uploads");

// If you are using windows, first 2 indexes are "." and "..",
// if you are using Mac, you may need to start the loop from 3,
// because the 3rd index in Mac is ".DS_Store" (auto-generated file by Mac)
for ($a = 2; $a < count($files); $a++)
{
    ?>
    <p>
      <!-- Displaying file name !-->
        <?php echo $files[$a]; ?>

        <!-- href should be complete file path !-->
        <!-- download attribute should be the name after it downloads !-->
        <a href="uploads/<?php echo $files[$a]; ?>" style="color: white" download="<?php echo $files[$a]; ?>">
            Download
        </a>
    </p>
    <?php
} ?> */