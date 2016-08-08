<?php 
session_start();
	if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
	header ("Location: login.php");
	}
// output headers so that the file is downloaded rather than displayed


// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');
// fetch the data
$mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
$mysql_user     = "bf0fbe99b3665b";
$mysql_password = "bf7f29f2";
$mysql_database = "ad_63dc1eebbb2aed2";
$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
$query = "SELECT email FROM persons";
$rows = mysqli_query($connect, $query);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) echo $row['email'].', <br>';

?>