<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location:home.php');
  	}
?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
   body {
            background-image: url("../head.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
         .container {
    padding: 30px;
    width: 430px;
    height: 550px;
    background-color: rgba(0, 0, 0, 0.2); /* Black with 20% opacity */
    border-radius: 10px; /* Rounded corners for a glass effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    backdrop-filter: blur(10px); /* Blur effect (for modern browsers) */
  }
   .ca {
        font-size: 14px;
        display: inline-block;
        text-decoration: none;
        color: #444;
    }
    .ca:hover {
        text-decoration: underline;
    } 
</style>
<div class="container">
     <center> <img src="../adamson logo.png" alt="logo" style="height: 200px; width: 200px;"></center>
  	<div class="login-logo">
  		<b style="color: whitesmoke;">University Election Online Ballot</b>
    </div>
    <div class="login-box">
    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="username" placeholder="Username" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          			<button type="submit" class="ca btn btn-primary form-control" style="color:whitesmoke;" name="login"><i class="fa fa-sign-in"></i> Sign in as Admin</button>
    	</form>
  	</div>
  </div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>