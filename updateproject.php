<!DOCTYPE html>
<html>
<head>
    <title>Update Project Marketplace</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="style.css" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <?php 
    session_start();
	if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
	header ("Location: login.php");
	}

	if($_POST['valueToSearch'] != "") {
	include "connection.php";
	$valueToSearch = $_POST['valueToSearch'];
	$valueToSearch = mysqlI_escape_string($connect, $valueToSearch);
	$sql = "SELECT * FROM projects WHERE `name` LIKE '%$valueToSearch'";
	$search_result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($search_result);
	} else {
		header("Location: selecthcp.php");

	}

	// $count = mysqli_num_rows($search_result);
	// if($count != 1) {
	// 	header("Location: selectproject.php");
	// }
	
    ?>
</head>
<body>

<div class="nav" dir="ltr" style="list-style: none;margin: 0;padding: 0;background: #262626;display: flex;flex-flow: row wrap;-webkit-flex-flow: row nowrap;">
<div class="navtitle" style="width: 500px;list-style: none;margin: 0;padding: 0;background: #262626;display: flex;flex-flow: row wrap;-webkit-flex-flow: row wrap;justify-content: flex-start;padding-top:10px; padding-left: 15px;">



<p><span style="font-size:20px;font-family:helvetica;color:#ffffff;">IBM </span><span style="font-size:20px;font-family:helvetica;color:#7dbc3c;">Watson Health </span><span style="font-size:20px;font-family:helvetica;color:#ffffff;"></span></p>
</div>

<p><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span>&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>


</div>

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
</div>
<form action="submitprojectupdate.php" method="POST">
<div style="padding-left:10%;padding-right:10%; padding-top:20px;background-color:#3b4b54; color:white;">
<center><h1>Update Project</h1><br>
<button type="submit" class="btn btn-primary btn-large" onclick="return confirm('Are you sure? This action CANNOT be undone and the user will have to re-take the survey to be added to the list again.')" width="30px" height="60px" type="button" name="delete">DELETE HCP</button></center>
    <br><br>
    
    <input style="width:40%; height:30px; display:none;" type="text" name="name_old" value='<?php echo $row['name']; ?>'>
    Project Name: <input style="color:black; width:80%; height:30px" type="text" name="name" value='<?php echo $row['name']; ?>'>
    <br>
    <br>
    Contact Email: <input style="color:black; width:80%; height:30px" type="text" name="email" value='<?php echo $row['email']; ?>'">
	<br>
	<br>
	Project Description: <br><br> <textarea style="color:black; width:100%; height:90px" rows="5" type="text" name='description'> <?php echo $row['description']; ?></textarea>
    <br>
    <br>
    Project Category: 
    <select style="width:300px; color:black" name="category">
	<option value="">Select...</option>
	<option value="oncology_and_genomics" <?php if ($row['category'] == 'oncology_and_genomics') echo ' selected="selected"'; ?>>Oncology & Genomics</option>
	<option value="life_sciences" <?php if ($row['category'] == 'life_sciences') echo ' selected="selected"'; ?>>Life Sciences</option>
	<option value="imaging" <?php if ($row['category'] == 'imaging') echo ' selected="selected"'; ?>>Imaging</option>
	<option value="value_based_care" <?php if ($row['category'] == 'value_based_care') echo ' selected="selected"'; ?>>Value-Based Care</option>
	<option value="government" <?php if ($row['category'] == 'government') echo ' selected="selected"'; ?>>Government</option>
	<option value="watson_health_cloud" <?php if ($row['category'] == 'watson_health_cloud') echo ' selected="selected"'; ?>>Watson Health Cloud</option>

</select>
<br><br>
	Hours requested each week: <input value='<?php echo $row['commitment']; ?>' style="color:black" name="commitment" type="number" onkeypress="return isNumberKey(event)"/>
	<br><br>
	Number of weeks requested: <input value='<?php echo $row['duration']; ?>' style="color:black" name="duration" type="number" onkeypress="return isNumberKey(event)"/>
	<br><br>
    <div id="255">
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
</form>
</div>
</body>
</html>