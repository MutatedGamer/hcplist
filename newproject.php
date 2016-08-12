<?php include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Project Marketplace</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<style>
	#container-fluid{
	  height:auto;
	}
	</style>
</head>
<body>
<div class="nav" dir="ltr" style="list-style: none;margin: 0;padding: 0;background: #262626;display: flex;flex-flow: row wrap;-webkit-flex-flow: row nowrap;">
<div class="navtitle" style="width: 100%; height:20px;list-style: none;margin: 0;padding: 0;background: #262626;display: flex;flex-flow: row wrap;-webkit-flex-flow: row wrap;justify-content: flex-start;padding-top:10px; padding-left: 15px;">



<p><span style="font-size:20px;font-family:helvetica;color:#ffffff;">IBM </span><span style="font-size:20px;font-family:helvetica;color:#7dbc3c;">Watson Health </span><span style="font-size:20px;font-family:helvetica;color:#ffffff;"> <center><span style="padding-left:10px;font-size:20px;font-family:helvetica;color:#ffffff;">Project Marketplace -<a href="marketplacehome.php"> Back </a></span></center></span></p>
</div>

<p><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span>&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>


</div>
<!-- 
<div class="header" dir="ltr" style="width:100%; background-image: url(http://i.imgur.com/Yp9QCIa.png);height: auto;text-align: center;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;font-weight: 400;font-size: 42px;color: white;display: flex;align-items: center;justify-content: center;padding-bottom: 9px;margin: 0px 0 0px;">
<div class="title" style="flex: 1;">
<h1 id="title" style="margin: .67em 0;font-size: 1em;margin-bottom: 10px;color: white;">Project Marketplace<br>
<small style="color: white;margin-top: -10px;font-weight: normal;line-height: 1;font-size: 50%;">
<ul class="navigation" style="width:100%; list-style: none;margin: 0;padding: 0;display: flex;flex-flow: row wrap;-webkit-flex-flow: row wrap;justify-content: space-around; align-items:center;">
<li style="flex:1">Home</li>
<li style="flex:1">Submit Project</li>
<li style="flex:1">Test</li>
</ul>
</small>
</h1>
</div>
</div> -->
<div style="padding-left:10%;padding-right:10%; padding-top:20px;background-color:#3b4b54; color:white;">
<center><h1>Submit New Project</h1></center>
    Please answer every field.<br><br>
    <form action="submitproject.php" method="POST">
    
    Project Name: <input style="color:black; width:80%; height:30px" type="text" name="name" placeholder="">
    <br>
    <br>
    Contact Email: <input style="color:black; width:80%; height:30px" type="text" name="email" placeholder="(e.g. john.doe@us.ibm.com)">
	<br>
	<br>
	Project Description: <br><br> <textarea style="color:black; width:100%; height:90px" rows="5" type="text" name="description" placeholder=""></textarea>
    <br>
    <br>
    Project Category: 
    <select style="width:300px; color:black" name="category">
	<option value="">Select...</option>
	<option value="oncology_and_genomics">Oncology & Genomics</option>
	<option value="life_sciences">Life Sciences</option>
	<option value="imaging">Imaging</option>
	<option value="value_based_care">Value-Based Care</option>
	<option value="government">Government</option>
    <option value="watson_health_cloud">Watson Health Cloud</option>
</select>
<br><br>
	Hours requested each week: <input style="color:black" name="commitment" type="number" onkeypress="return isNumberKey(event)"/>
	<br><br>
	Number of weeks requested: <input style="color:black" name="duration" type="number" onkeypress="return isNumberKey(event)"/>
	<br><br>
    
	<input type="checkbox" id="showSubmit" onclick="checkSubmit();" value="showSubmit">By clicking here you ackowledge that the answers you have submitted on this form will be displayed for public visibility on the Project Marketplace for people to see and contact you. You further agree that you have answered each question to the best of your knowledge and that in order to remove or change any information an administrator must be contacted.  <br>
    <div id="255" style="display:none">
    <center>
    <br>
        <button type="submit" class="btn btn-primary btn-large" width="30px" height="60px" type="button" name="submit">SUBMIT</button>
    </center>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>


</body>
<!-- minifed jQuery -->
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>   
<script type="text/javascript">
function unfilter(){for(var i of document.querySelectorAll('[type=checkbox]')) { i.checked = false; } $("select").each(function() { this.selectedIndex = 0 });}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function checkSubmit() {
      if (document.getElementById('showSubmit').checked== true){
        document.getElementById('255').style.display="inline";   
      } else {
        document.getElementById('255').style.display="none";
      }
    }
</script>   
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</form>
</font>
</body>
</html>
