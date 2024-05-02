<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$ffilename = $_FILES['fphoto']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['fphoto']['tmp_name'], '../images/'.$ffilename);	
		}

		$bfilename = $_FILES['bphoto']['name'];
		if(!empty($filename)){
			move_uploaded_file($_FILES['bphoto']['tmp_name'], '../images/'.$bfilename);	
		}
		//generate voters id
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$voter = substr(str_shuffle($set), 0, 15);

		$sql = "INSERT INTO voters (voters_id, email, password, firstname, lastname, fphoto, bphoto) VALUES ('$voter', '$email','$password', '$firstname', '$lastname', '$ffilename', '$bfilename')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Voter added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: voters.php');
?>