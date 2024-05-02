<?php
include 'includes/conn.php';
session_start();
    if (isset($_POST['submit'])) {
        $voters_id = $_POST['voters_id'];
        $email = $_POST['email'];
        $_SESSION['email']=$email;
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $password = sha1($_POST['password']);
        $cpassword = sha1($_POST['confirm_password']);
        $fphoto = $_FILES['fphoto']['name'];
        move_uploaded_file($_FILES['fphoto']['tmp_name'], 'images/'.$fphoto);
        $bphoto = $_FILES['bphoto']['name'];
        move_uploaded_file($_FILES['bphoto']['tmp_name'], 'images/'.$bphoto);
        
        //for checking username and email
        $sql = "Select * from voters where voters_id='$voters_id'";
        $result = mysqli_query($conn, $sql);        
        $count_voter = mysqli_num_rows($result);

        $sql = "Select * from voters where email='$email'";
        $result = mysqli_query($conn, $sql);        
        $count_email = mysqli_num_rows($result);

        if ($count_voter==0 && $count_email==0) {
            if($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
 
            // insert in users table
            $sql = "INSERT INTO voters (voters_id, email, firstname, lastname, password, fphoto, bphoto) VALUES ('$voters_id', '$email', '$firstname', '$lastname', '$hash' ,'$fphoto','$bphoto')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo  '<script>
                    window.location.href = "otp.php";
                    alert("Registered Successfully")
                </script>';
                }
            }
            else{
                echo  '<script>
                    window.location.href = "reg.php";
                    alert("Passwords did not match")
                </script>';
                }
    }
        elseif($count_voter>0){
            echo  '<script>
                    window.location.href = "reg.php";
                    alert("Voter ID Duplicate!")
                </script>';
            }
        elseif ($count_email>0){
            echo  '<script>
                    window.location.href = "reg.php";
                    alert("Email Already Registered!")
                </script>';
            }    
}
    
    
    ?>