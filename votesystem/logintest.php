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

			$sql = "SELECT user_otp FROM voters;";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) === 1) {
    			$row = mysqli_fetch_assoc($result);
    		// Check if user_otp is 1
    		if ($row['user_otp'] == 0) {
        		if(password_verify($password, $row['password'])){
				$_SESSION['voter'] = $row['id'];
				header('location: tutorial.php');
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
    		} 		elseif ($row['user_otp'] <= 1) {
        			$_SESSION['error'] = 'OTP INVALID';
        			header('location: otp.php');
    	}
     		else {
        // Handle other cases if needed
        $_SESSION['error'] = 'OTP INVALID';
        header('location: otp.php');
    	}
		} 
		else {
    	// Handle the case where no user is found or multiple users are found
    	$_SESSION['error'] = 'Error fetching OTP';
    	header('location: otp.php');
}
}
}

?>