<?php
$msg;

include "dbcon.php";


if (isset($_POST['submit'])) {

  $name=($_POST['name']);
  $studentid=($_POST['studentid']);
  $dept=($_POST['dept']);
  $password=md5($_POST['password']);
  

  $sql="SELECT * FROM gazipurassoc WHERE studentid='$studentid' AND password='$password' AND dept='$dept' ";
  $result=mysqli_query($conn,$sql);
  $row=$result->fetch_assoc();

  
        if($row){
              session_start();
              $_SESSION['name']=$row['name'];
              $_SESSION['studentid']=$row['studentid'];
              $_SESSION['mobile']=$row['mobile'];
              $_SESSION['dept']=$row['dept'];
              $_SESSION['bloodgrp']=$row['bloodgrp'];
              $_SESSION['address']=$row['address'];
             

              $_SESSION['authenticated']='true';
            
              
              header("location:userprofile.php");
              
              
          }


        else{
              $msg="<div class='container'><p class='text-danger'><strong>Oops!</strong> The Name/Id/Password is wrong.<br> Do you <a href='forgetpass.php'>Forget Password</a>?</p></div>";
        }

  }

?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Gazipur Student's Association,MBSTU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>

    body{
      background-color: #74D47D;
    }
.card-body{
  background-color: #BAE9A6;

}
.card-title {
  color: #21A22E;
}
.form-control{
  background-color: #E1F7E1;
}

  </style>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body" >
              <h5 class="card-title text-center">Login</h5>
              <form class="" method="post" action="">
               
                <div class="form-label-group">
                  <input type="Text" name="name" class="form-control" placeholder="Your Name" required autofocus>
                </div>
               
                  <br>
                  <div class="form-label-group">
                  <input type="number" name="studentid" class="form-control" placeholder="Your id" required autofocus>
                </div>
               
                  <br>

                 <!-- <div class="form-label-group">
                  <input type="text" name="dept" class="form-control" placeholder="Your dept" required autofocus>
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
               
                <div class="form-label-group">
                  <input type="password" name="password" class="form-control" placeholder="Your Password" required>
                </div>
               
                  <br>
               
                <button class="btn btn-lg btn-success btn-block" type="submit" name="submit">Login</button>
                <?php 
                if (isset($msg)) {
                  echo $msg; 
                }
                
                ?>
                <br>
                <p>Didn't Join us yet? <a href="javascript:void(0)" onclick="location.href='signup.php'"> Sign up </a>now</p>
                <p>Back to <a href="index.php">Home </a>page</p>
                </form>
              </div>                 
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
  </head>
  </html>


