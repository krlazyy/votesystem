<?php
include 'includes/conn.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
     <!--Fonts CDN-->

    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Internal CSS -->
    <style>
            body {
            background-image: url("head.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        *{
            font-family: sans-serif;
            box-sizing: border-box;
        }


        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #whitesmoke;
            padding: 12px 35px;
            color: black;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
        button:hover{
            opacity: .7;
        }
        .error {
         background: #F2DEDE;
         color: #A94442;
         padding: 10px;
         width: 95%;
         border-radius: 5px;
         margin: 20px auto;
     }

     .success {
         background: #D4EDDA;
         color: #40754C;
         padding: 10px;
         width: 95%;
         border-radius: 5px;
         margin: 20px auto;
     }

     h1 {
        text-align: center;
        color: #fff;
    }

    .ca {
        font-size: 14px;
        display: inline-block;
        padding: 10px;
        text-decoration: none;
        color: #444;
    }
    .ca:hover {
        text-decoration: underline;
    } 

    .container {
    padding: 30px;
    width: 430px;
    height: 650px;
    background-color: rgba(0, 0, 0, 0.2); /* Black with 20% opacity */
    border-radius: 10px; /* Rounded corners for a glass effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    backdrop-filter: blur(10px); /* Blur effect (for modern browsers) */
  }
    </style>
</head>
<body>
    <div class="container">
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <h2 style="margin-bottom: 15px; color: whitesmoke;">Registration Form</h2>
            <input type="text" id="voters_id" name="voters_id" placeholder="Voter ID" required>
            <div class="form-group has-feedback">
            <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
            <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
            <input type="text" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <label for="photo" style="margin:0px; color: whitesmoke;">ID Photo (Front):</label>
            <input style="margin-top:0px;" type="file" id="fphoto" name="fphoto" required>
            <label for="photo" style="margin:0px; color: whitesmoke;">ID Photo (Back):</label>
            <input style="margin-top:0px;" type="file" id="bphoto" name="bphoto" required>
            <button type="submit" name="submit" value="submit">SignUp</button>

            <div class="acon">
            <a href="index.php" class="ca" style="color: whitesmoke;">Already have an Account?</a>
        </div>
        </form>
</div>
    <script>
        function closeWindow() {
            window.close(); // Close the current window or tab
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="js/jquery-3.2.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>    
    <script src="js/bootstrap.min.js"></script> 
 
</body>
</html>