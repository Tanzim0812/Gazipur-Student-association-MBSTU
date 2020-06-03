<?php
 $ms; $ms1;
include "dbcon.php";
session_start();

if (isset($_POST['submit'])) {

  $name= ($_POST['name']);
  $studentid= ($_POST['studentid']);
  $dept=($_POST['dept']);
  $bloodgrp=($_POST['bloodgrp']);
  $address=($_POST['address']);
  $mobile=($_POST['mobile']);
  $password=md5($_POST['password']);
  
  //$permitted=array ('jpg','jpeg','png','gif');
      $file_name=$_FILES['image_file']['name'];
      $file_temp=$_FILES['image_file']['tmp_name'];
      $f=$file_name.date("mjYHis");
      
 
 
  
  
  $sql1="select * from gazipurassoc where studentid='$studentid' AND dept='$dept' ";
  $res=mysqli_query($conn,$sql1);

  if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        
        
        if($studentid==$row['studentid'] AND $dept==$row['dept']) // change it to just else
        {
            $ms= "Sorry!! This ID is already exists.";
            
        }
        
    }
    else{

      
      $folder="profilepic/";
      move_uploaded_file($file_temp,$folder.$f);
      

     
      $sql="INSERT INTO gazipurassoc(name, studentid, dept, bloodgrp,address,mobile,password,image) VALUES ('$name','$studentid','$dept','$bloodgrp','$address','$mobile','$password','$f')";
   
   mysqli_query($conn,$sql);
   

    $ms1="Registration Successful"."<br>Go to : <a href='login.php'>Login page</a>";
    
    
    
  }

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
  h5 {
   color: #318D0F;
  
}
body {
background-image: url("mbss.jpg");
background-size: cover;
background-attachment: fixed;
opacity: 0.8;

}
.card-body{
background-color: #CAF6C1;
}
</style>
</head>
<br>


<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign up</h5>
     

            <form class="form-signin" method="Post" action="signup.php" enctype="multipart/form-data">
              <div>
                <?php
            if(isset($ms)){
           echo "<div class='container'><h3 style='color: red'>".$ms."</h3></div>";
              } ?>

              <?php
               if(isset($ms1)){
           echo "<div class='container'><h4 style='color: green'>".$ms1."</h4></div>";
              }
           ?>
              </div>
             <div class="form-label-group">
                <input type="text" name ="name" class="form-control" placeholder="Your Name" required>
              </div>

                <br>
              
                <div class="form-label-group">
                <input type="number" name="studentid" class="form-control" placeholder="Your id" required>
                *Type only integer part of your ID. (example: 16001)
                
              </div><br>
             
             <!-- <div>
                <input type="text" name="dept" class="form-control" min="1" max="20" placeholder="Your Dept" required>
              </div> -->
              <div>
                Dept :
              <select name="dept" required>
                  <option value="">Select Dept</option>
                  <option value="ICT">ICT</option>
                  <option value="CSE">CSE</option>
                  <option value="TE">TE</option>
                  <option value="PHARMACY">PHARMACY</option>
                  <option value="BGE">BGE</option>
                  <option value="BMB">BMB</option>
                  <option value="FTNS">FTNS</option>
                  <option value="ESRM">ESRM</option>
                  <option value="CPS">CPS</option>
                  <option value="CHEMISTRY">CHEMISTRY</option>
                  <option value="PHYSICS">PHYSICS</option>
                  <option value="MATHEMATICS">MATHEMATICS</option>
                  <option value="STATISTICS">STATISTICS</option>
                  <option value="BBA">BBA</option>
                  <option value="ECONOMICS">ECONOMICS</option>


              </select>
            </div>
              
              <br>
              <div>
                <input type="text" name="bloodgrp" class="form-control" maxlength="3" placeholder="Your blood group" required>
              </div>
              
              <br>
              <div>
                <input type="textarea" name="address" class="form-control"  placeholder="Your permanent address">
              </div>
              
              <br>
              <div>
                <input type="text" name="mobile" class="form-control" maxlength="14" placeholder="Your mobile no" required>
              </div>
              
              <br>
              
              <div class="form-label-group">
                <input type="password" name="password" class="form-control" placeholder="Your password" required>
              </div>

              <div class="form-label-group">
                  Profile Pic:
                <input type="file" name="image_file" required>
              </div>
              

              
              <br>
              
              <div>
                <input type="Reset" name="reset" value="Clear all">
              </div>
              
              <br>
              
              <button class="btn btn-md btn-success btn-block" type="submit" name="submit">Submit</button>
              
              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>




</body>
</html>