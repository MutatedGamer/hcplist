<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
header ("Location: login.php");
}
if(isset($_POST['search'])) {
	$display = "no custom filters";
	unset($print);
	$print=[];
		$valueToSearch = $_POST['valueToSearch'];
	// search in all table columns
	// using concat mysql function

// Start of with some "base" or "generic" SQL which will be needed no matter which option/s are selected:
$sql = "SELECT * FROM persons WHERE `email` LIKE '%".$_POST['valueToSearch']."%'";
$mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
$mysql_user     = "bf0fbe99b3665b";
$mysql_password = "bf7f29f2";
$mysql_database = "ad_63dc1eebbb2aed2";
$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
$search_result = mysqli_query($connect, $sql);
$row = mysqli_fetch_array($search_result);
$_POST['name'] = $row['name'];
}
?>
<style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            background-color: lightgray;
            background-repeat: no-repeat;
            background-size: cover;
         }

         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }

         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body>
   <div style="padding-top:50px;" class="col-xs-12" align='center'>
   <h1 style="font-family:sans-serif; font-size:50px; color:#black;"><strong>Search for HCP to Edit/Delete<strong></h1>
   </div>
      <div align = "center">
         <div style = "margin-top:175px; background-color: gray; width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b></b></div>

            <div style = "margin:30px">
	            <form action="updatehcp.php" method="post">
				<input style="width: 91%; height:30px" type="text" name="valueToSearch" placeholder="Search by email ONLY."> <br><br>
				<center>
				<input style="width: 100px; height:30px" type="submit" name="search" value="Filter"><br>
				</center>
				</form>
            </div>

         </div>

      </div>

   </body>
</html> 
