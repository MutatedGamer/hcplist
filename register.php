<html>

   <head>
      <title>HCP List - Register as Admin</title>
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

   <body bgcolor = "#FFFFFF">
   <div style="padding-top:50px;" class="col-xs-12" align='center'>
   <h1 style="font-family:sans-serif; font-size:50px; color:#black;"><strong>IBM Watson for Psychology<strong></h1>
   </div>
      <div align = "center">
         <div style = "margin-top:175px; background-color: gray; width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Username  :</label><br><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Registration Key  :</label><br><input type = "text" name = "key" class = "box"/><br /><br>
                  <label>Password  :</label><br><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Register "/><br />


               </form>
               <?php
                  $mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
                  $mysql_user     = "bf0fbe99b3665b";
                  $mysql_password = "bf7f29f2";
                  $mysql_database = "ad_63dc1eebbb2aed2";
                  $db = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

                  if($_SERVER["REQUEST_METHOD"] == "POST") {
                     // username and password sent from form 
                     $key = $_POST['key'];
                     $myusername = mysqli_escape_string($db, $_POST['username']);
                     $mypassword = $_POST['password'];
                     $salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
                        function generateHashWithSalt($password) {
                         
                         return hash("sha256", $password . $salt);
                        }  
                     $mypassword = md5($mypassword);
                     if($key=="Y8ff3zxu1pWcqU2sncTi"){
                        if ($myusername!='' && $mypassword!=''&& $key!=''){
                           $sql = "INSERT INTO hcpusers (username, password, salt) VALUES ('$myusername', '$mypassword', '$salt')";
                           $query = mysqli_query($db,$sql);
                        

                           if (($query)) {
                             
                              echo  "<p>Registration succesful. Redirecting you to the login page...</p>";
                              
                              header("location: login.php");

                           
                        } else {

                           echo "There was a problem!";
                           die('Invalid query: ' . mysql_error());
                        }
                     } else {
                        echo "Please make sure the fields are filled out correctly.";
                     }
                     }else {
                        echo "Your key was invalid.";
                     }
                     } 
               ?>

            </div>

         </div>

      </div>

   </body>
</html> 