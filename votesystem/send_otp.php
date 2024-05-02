<?php
session_start();
include("dbconnect.php");
include("email.php");

$email=$_POST["email"];
$sql="Select * from voters where email='$email'";
$rs=mysqli_query($con,$sql)or die(mysqli_error($con));
if(mysqli_num_rows($rs)>0){
  $_SESSION['email']=$email;
  $otp=rand(11111,99999);
   send_otp($email,"PHP OTP LOGIN",$otp);
  $sql="update voters set user_otp='$otp' where email='$email'";
  $rs=mysqli_query($con,$sql)or die(mysqli_error($con));
  header("location:verify.php?msg=Check your email for OTP and verify");
}
else{
    header("location:index.php?msg=Email is invalid please try again");
}
?>