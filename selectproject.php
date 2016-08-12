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
   <h1 style="font-family:sans-serif; font-size:50px; color:#black;"><strong>Search for Project to Edit/Delete<strong></h1>
   </div>
      <div align = "center">
         <div style = "margin-top:10px; background-color: gray; width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:0px;"><b></b>
               <center>
               <br>
               <a href="selecthcp.php" style="color:white">Click here to go to the health expert directory admin page.</a>
               <br><br>
               </center>
            </div>

            <div style = "margin:30px">
               <form action="updateproject.php" method="post">
            <input style="width: 100%; height:30px" type="text" name="valueToSearch" placeholder="Search by EXACT project name ONLY."> <br><br>
            <center>
            <input style="width: 100px; height:30px" type="submit" name="search" value="Search"><br>
            </center>
            </form>
            <br>
               </center>
            </form>
            </div>

         </div>

      </div>

   </body>
</html> 
