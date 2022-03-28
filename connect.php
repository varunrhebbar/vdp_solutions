  <?php
 	$firstName = $_POST['firstName'];
 	$lastName = $_POST['lastName'];
 	$email = $_POST['email'];
	$company = $_POST['company'];
	$subject = $_POST['subject'];
 	$number = $_POST['number'];
	$message = $_POST['message'];

 	// Database connection
 	$conn = new mysqli('localhost','root','','test');
 	if($conn->connect_error){
 		echo "$conn->connect_error";
 		die("Connection Failed : ". $conn->connect_error);
 	} else {
 		$stmt = $conn->prepare("insert into registration(firstName, lastName, email, company, subject, number, message) values(?, ?, ?, ?, ?, ?, ?)");
 		$stmt->bind_param("sssssis", $firstName, $lastName, $email, $company, $subject, $number, $message);
 		$execval = $stmt->execute();
		header("Location: /Project/#works"); 
	    exit();
 		$stmt->close();
 		$conn->close();
 	}
 ?>
