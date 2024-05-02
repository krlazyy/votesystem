<?php
  	session_start();
  	if(isset($_SESSION['admin'])){
    	header('location: admin/home.php');
  	}

    if(isset($_SESSION['voter'])){
      header('location: home.php');
    }
?>
<?php include 'includes/header.php'; ?>
<style type="text/css">
  body {
            background-image: url("head.jpg");
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .container {
    padding: 30px;
    width: 430px;
    height: 750px;
    background-color: rgba(0, 0, 0, 0.2); /* Black with 20% opacity */
    border-radius: 10px; /* Rounded corners for a glass effect */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    backdrop-filter: blur(10px); /* Blur effect (for modern browsers) */
  }
</style>
<div class="container">
   <center> <img src="adamson logo.png" alt="logo" style="height: 200px; width: 200px;"></center>
<div class="login-box">

  	<div class="login-logo">
  		<b style="color: whitesmoke;">University Election Online Ballot</b>
  	</div>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="text" class="form-control" name="voter" placeholder="Voter's ID" required>
        		<span class="glyphicon glyphicon-user form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          			<button type="submit" class="btn form-control" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
                <div class="g-recaptcha" data-sitekey="6Ld7TJMpAAAAAIAvmH7dba1ABwCv5IgO8bbInpiD"></div><br>
            <a href="reg.php" style="color: whitesmoke;" class="ca btn btn-primary form-control"><i class="fa fa-sign-up"></i>Create an account</a>
            <p style="color: whitesmoke; margin-top: 30px;">For reset or reactivation concern on your eVote account, send an e-mail to <a href="#">webmaster@adamson.edu.ph</a> your ID and Name from 8am-5pm Monday-Friday ONLY.</p>
          

    	</form>
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