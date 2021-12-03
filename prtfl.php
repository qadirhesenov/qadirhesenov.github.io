<?php
	$firstName=$_POST['firstName'];
	$email= $_POST['email'];
	$subject = $_POST['subject'];
	$textarea = $_POST['textarea'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','gadir');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into hasanov(firstName, email, subject, textarea) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $firstName, $email,$subject,$textarea);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>