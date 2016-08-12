<?php
	include "connection.php";
	if($connect->connect_error)
	{
	    die("Connection failed: " . $db->connect_error);
	}
	$expected_category = array('oncology_and_genomics', 'life_sciences', 'imaging', 'value_based_care', 'government', 'watson_health_cloud');

	$name=mysqli_escape_string($connect, $_POST['name']);
	$email=mysqli_escape_string($connect, $_POST['email']);
	$description=mysqli_escape_string($connect, $_POST['description']);
	if(in_array($_POST['category'], $expected_category)) {$category=$_POST['category']; } else {$category = 'Not available';}
	$commitment = intval($_POST['commitment']);
	$duration = intval($_POST['duration']);
	$query = "SELECT name FROM projects WHERE name='$name'";
	$result = mysqli_query($connect,$query);
	$count = mysqli_num_rows($result);
	if ($count==0){

		if (filter_var($email, FILTER_VALIDATE_EMAIL) && $name!="" && $description!="" && $category!="Not available" && $commitment>=0 && $duration>=0) {

			$mypassword = $_POST['password'];
                     $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
                     $mypassword = hash("sha256", $_POST['password'] . $salt); 
                     $mypassword = md5($mypassword);
			

			$query = "INSERT INTO projects (name, email, description, category, commitment, duration, password, salt) VALUES ('$name', '$email', '$description', '$category', '$commitment', '$duration', '$mypassword', '$salt')";
			$input = mysqli_query($connect, $query);
			if ($input) {
				header("location: marketplacehome.php");
			} else {
				echo "Something went wrong.";
			}
		} else {
			echo "Please make sure you filled out every section and used a valid email.";
		}

	} else {
		echo ("Project name already exists in database. If you want to update the information, please contact an administrator from the community homepage.");
	}
?>