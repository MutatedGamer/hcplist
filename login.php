<html>
<?php
   $mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
   $mysql_user     = "bf0fbe99b3665b";
   $mysql_password = "bf7f29f2";
   $mysql_database = "ad_63dc1eebbb2aed2";
   $db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = $_POST['password']; 

      $sql = "SELECT salt, password FROM hcpusers WHERE username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      $match=$row['password'];
      $salt = $row['salt'];
      $password = hash("sha256", $_POST['password'] . $salt);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
        $db->close();
      if($count == 1) {

         $_SESSION['login_user'] = $myusername;

         header("location: selecthcp.php");
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>


   <head>

        <title>HCP Admin - Log In</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-custom.css">
<link rel="stylesheet" href="css/style.css">

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
            background-color:lightgray;
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
   <h1 style="font-family:sans-serif; font-size:50px; color:#black;"><strong>Login to Edit Database<strong></h1>
   </div>
      <div align = "center">
         <div style = "margin-top:175px; background-color: gray; width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
            
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br /></br>
                  <a href="register.php">Not registered? Click here!</a>
               </form>

            </div>

         </div>

      </div>

   </body>
</html> 