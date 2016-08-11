<?php 
session_start();
	if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
	header ("Location: login.php");
	}
// output headers so that the file is downloaded rather than displayed


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// fetch the data
include "connection.php";
$query = "SELECT email FROM persons WHERE email_list='Yes' ORDER BY name";
$rows = mysqli_query($connect, $query);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) echo $row['email'].', <br>';

?>