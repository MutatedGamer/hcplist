<?php
	include "connection.php";
	if($connect->connect_error)
	{
	    die("Connection failed: " . $db->connect_error);
	}
	$expected_category = array('oncology_and_genomics', 'life_sciences', 'imaging', 'value_based_care', 'government', 'watson_health_cloud');
	$name=mysqli_escape_string($connect, $_POST['name']);
	$name_old=mysqli_escape_string($connect, $_POST['name_old']);
	$email=mysqli_escape_string($connect, $_POST['email']);
	$description=mysqli_escape_string($connect, $_POST['description']);
	if(in_array($_POST['category'], $expected_category)) {$category=$_POST['category']; } else {$category = 'Not available';}
	$commitment = intval($_POST['commitment']);
	$duration = intval($_POST['duration']);
if(isset($_POST['submit'])) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL) && $name!="" && $description!="" && $category!="Not available" && $commitment>=0 && $duration>=0) {

		

		$query = "UPDATE projects SET name='$name', email='$email', description='$description', category='$category', commitment='$commitment', duration='$duration' WHERE name='$name_old'";
		$input = mysqli_query($connect, $query);
		if ($input) {
			header("location: marketplacehome.php");
		} else {
			echo "Something went wrong.";
		}
	} else {
		echo "Please make sure you filled out every section and used a valid email.";
	}
}

if(isset($_POST['delete'])) {
	$name_old=$_POST['name_old'];
		$query = "DELETE FROM projects WHERE name = '$name_old'";
		$input= mysqli_query($connect,$query);
		if ($input) {
			header("location: marketplacehome.php");
		} else {
			echo "Something went wrong.";
		}
}
?>