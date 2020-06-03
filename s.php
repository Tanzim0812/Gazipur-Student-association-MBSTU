<?php
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
  
  
  $sql1="select * from gazipurassoc where studentid='$studentid' AND mobile='$mobile' ";
  $res=mysqli_query($conn,$sql1);

  if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        
        if($studentid==$row['studentid'] && $mobile==$row['mobile']) // change it to just else
        {
            $_SESSION['message']="student_id/mobile no already exists";
            
        }
        header("location:aha.php");
    }
    else{

    }

}


?>