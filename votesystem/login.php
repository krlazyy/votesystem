<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = sha1($_POST['password']);
		
		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the ID';
		}
		else{
			$row = $query->fetch_assoc();

		/* OTP Checker			
			$sql = "SELECT * FROM voters WHERE user_otp='$user_otp'";
			$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			if ($row['user_otp']>=1){
				verify password here and login
			}
			else{
				$_SESSION['error'] = 'OTP INVALID';
				header('location: otp.php');
			}
			}*/

			if(password_verify($password, $row['password'])){
				$_SESSION['voter'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}
	header('location: tutorial.php');
?>