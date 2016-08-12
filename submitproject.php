<?php
	include "connection.php";
	if($connect->connect_error)
	{
	    die("Connection failed: " . $db->connect_error);
	}
	$expected_category = array('category_1', 'category_2', 'category_3', 'category_4', 'category_5');

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

			

			$query = "INSERT INTO projects (name, email, description, category, commitment, duration) VALUES ('$name', '$email', '$description', '$category', '$commitment', '$duration')";
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