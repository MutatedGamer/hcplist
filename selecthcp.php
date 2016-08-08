<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
header ("Location: login.php");
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
				<input style="width: 100%; height:30px" type="text" name="valueToSearch" placeholder="Search by email ONLY."> <br><br>
				<center>
				<input style="width: 100px; height:30px" type="submit" name="search" value="Search"><br>
				</center>
				</form>
				<br>
				<form action="export.php" method="post">
					<center>
					<input style="width: 200px; height:30px" type="submit" name="export" value="Export Current Directory to CSV"><br>
					</center>
				</form>
            <form action="emails.php" method="post">
               <center>
               <input style="width: 200px; height:30px" type="submit" name="export" value="Display Current Email List"><br>
               </center>
            </form>
            </div>

         </div>

      </div>

   </body>
</html> 
