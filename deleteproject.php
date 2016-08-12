<html>
<?php
   include "connection.php";
   session_start();
$id = $_GET['id'];
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 

      $id = intval($_GET['id']);
      $sql = "SELECT salt, password FROM projects WHERE id = '$id'";
      $result = mysqli_query($connect,$sql);
      $row = mysqli_fetch_array($result);
      $match=$row['password'];
      $salt = $row['salt'];
      $password = hash("sha256", $_POST['password'] . $salt);
      $password=md5($password);
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1 && $password == $match) {
         $query= "DELETE FROM projects WHERE password='$password'";
         mysqli_query($connect, $query);
         header("location: marketplacehome.php");
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>


   <head>

        <title>Confirm Delete</title>
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
   <h1 style="font-family:sans-serif; font-size:50px; color:#black;"><strong>Enter Password to Delete<strong></h1>
   </div>
      <div align = "center">
         <div style = "margin-top:175px; background-color: gray; width:300px; border: solid 1px #333333; " align = "left">

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Password  <?php echo $id ?>:</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Delete "/><br /></br>
               </form>

            </div>

         </div>

      </div>

   </body>
</html> 