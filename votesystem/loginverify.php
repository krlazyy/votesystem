<?php
session_start();
include("dbconnect.php");

$email=$_SESSION['email'];
$user_otp=$_POST['user_otp'];
$sql="Select * from voters where email='$email' and user_otp='$user_otp'";
$rs=mysqli_query($con,$sql)or die(mysqli_error($con));
if(mysqli_num_rows($rs)>0){
    $sql="update voters set user_otp='0' where email='$email'";
    $rs=mysqli_query($con,$sql)or die(mysqli_error($con));
    echo  '<script>
                    window.location.href = "index.php";
                    alert("OTP Success '.$email.' can now Login!")
                </script>';
}
else{
        header("location:verify.php?msg=OTP is invalid please try again");
}
?>