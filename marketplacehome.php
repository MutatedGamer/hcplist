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



<p><span style="font-size:20px;font-family:helvetica;color:#ffffff;">IBM </span><span style="font-size:20px;font-family:helvetica;color:#7dbc3c;">Watson Health </span><span style="font-size:20px;font-family:helvetica;color:#ffffff;"> <center><span style="padding-left:10px;font-size:20px;font-family:helvetica;color:#ffffff;">Project Marketplace - Click<a href="newproject.php"> here </a> to submit a new project.</span></center></span></p>
</div>

<p><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span><span>&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></p>


</div>
<!-- <div class="header" dir="ltr" style="width:100%; background-image: url(http://i.imgur.com/Yp9QCIa.png);height: 70px;text-align: center;font-family: &quot;HelveticaNeue-Light&quot;, &quot;Helvetica Neue Light&quot;, &quot;Helvetica Neue&quot;, Helvetica, Arial, &quot;Lucida Grande&quot;, sans-serif;font-weight: 400;font-size: 42px;color: white;display: flex;align-items: center;justify-content: center;padding-bottom: 9px;margin: 0px 0 0px;">
<div class="title" style="flex: 1;">
<h1 id="title" style="margin: .3em 0;font-size: 1em;margin-bottom: 10px;color: white;">Project Marketplace<br>
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
<!--Filter PHP-->
<?php
$filtered="No";
//commitment_1 is 0-2hrs, 2 is 3-5hrs, 3 is 6-10, 4 is >10
$expected_commitment=array('commitment_1', 'commitment_2', 'commitment_3', 'commitment_4',);
$expected_duration=array('duration_1', 'duration_2', 'duration_3', 'duration_4',);
$filtered="No";
if(isset($_POST['filter'])) {
	$sql_base = "SELECT * FROM projects WHERE ";
	$valueToSearch = $_POST['valueToSearch'];
    $valueToSearch = mysqlI_escape_string($connect, $valueToSearch);
	$query = "CONCAT(`name`, `email`, `description`) LIKE '%".$valueToSearch."%'";
	$sql_extra[] = $query;
	if (isset ( $_POST['category_1'] ) ) {$sql_extra[] = "category='category_1'"; $filtered="Yes";}
	if (isset ( $_POST['category_2'] ) ) {$sql_extra[] = "category='category_2'"; $filtered="Yes";}
	if (isset ( $_POST['category_3'] ) ) {$sql_extra[] = "category='category_3'"; $filtered="Yes";}
	if (isset ( $_POST['category_4'] ) ) {$sql_extra[] = "category='category_4'"; $filtered="Yes";}
	if (isset ( $_POST['category_5'] ) ) {$sql_extra[] = "category='category_5'"; $filtered="Yes";}

	if(in_array($_POST['commitment'], $expected_commitment)) {
  		$filtered="Yes"; 
  		$varCommitment = $_POST['commitment'];

   		if ($varCommitment=="commitment_1"){
    		$sql_extra[] = "(commitment<=2)";
    	}
		if ($varCommitment=="commitment_2"){
		    $sql_extra[] = "(commitment<=5 AND commitment>=3)";
		}
		if ($varCommitment=="commitment_3"){
		    $sql_extra[] = "(commitment<=10 AND commitment>=5)";
		}
		if ($varCommitment=="commitment_4"){
		    $sql_extra[] = "(commitment>=10)";
		}
}
	if(in_array($_POST['duration'], $expected_duration)) {
  		$filtered="Yes"; 
  		$varDuration = $_POST['duration'];

   		if ($varDuration=="duration_1"){
    		$sql_extra[] = "(duration<=1)";
    	}
		if ($varDuration=="duration_2"){
		    $sql_extra[] = "(commitment<=3)";
		}
		if ($varDuration=="duration_3"){
		    $sql_extra[] = "(commitment<=5)";
		}
		if ($varDuration=="duration_4"){
		    $sql_extra[] = "(commitment<=10)";
		}
}
$sql_where = implode ( " AND ", $sql_extra );
$sql = $sql_base . $sql_where.' ORDER BY name';
$search_result = filterTable($sql);
} else {
	include "connection.php";
	$query = "SELECT * FROM projects ORDER BY id DESC";
	$search_result = filterTable($query);
	$filtered='No';
}

function filterTable($query)
{
	include "connection.php";
	$filter_Result = mysqli_query($connect, $query);
	return $filter_Result;
}
?>

<!--End Filter PHP-->


<!--content-->
<div style="background-color:#3b4b54; padding-top:10px;padding-bottom:10px;">
<form aciton="" method="POST">
<input style="margin-left:3px;width: 84%; height:30px" type="text" name="valueToSearch" placeholder="Search by name, email, or description.">
<input style="width:15%; padding-left:1%;height:30px; float:right;margin-right:3px" type="submit" name="filter" value="Filter">
<div style="padding-top:5px"><button type="button" onclick="showFilter()">Show Filter Options</button> 
<?php if (isset ($_POST['filter'])){ echo"<button type='button' onclick='unfilter()'>Reset Filters</button>";}?>
<?php
if($filtered=="Yes") {
	echo "<span style='color:white'> Displaying filtered results.</span>";
} else {echo "<span style='color:white'> Displaying entire database.</span>";}
?>
</div>
<table id="filter1" style="color:white; display:none">
<tr>
<td style="border-right: solid 1px gray; padding-left:10px;" width="20%" valign="top">
	<center><u>Categories</u><br>
	<input type="checkbox" name="category_1" value="category_1" <?php if(isset($_POST['category_1'])) echo "checked='checked'"; ?>>Category 1<br>
	<input type="checkbox" name="category_2" value="category_2" <?php if(isset($_POST['category_2'])) echo "checked='checked'"; ?>>Category 2<br>
	<input type="checkbox" name="category_3" value="category_3" <?php if(isset($_POST['category_3'])) echo "checked='checked'"; ?>>Category 3<br>
	<input type="checkbox" name="category_4" value="category_4" <?php if(isset($_POST['category_4'])) echo "checked='checked'"; ?>>Category 4<br>
	<input type="checkbox" name="category_5" value="category_5" <?php if(isset($_POST['category_5'])) echo "checked='checked'"; ?>>Category 5<br>
	</center>
	
</td>
<td style="border-right: solid 1px gray; padding-left:10px;" width="60%" valign="top">
<center><u>Time Commitment</u><br>
Restrict to <select style="color:black" name="commitment">
	<option value="">Select...</option>
	<option value="commitment_1" <?php if (isset ($_POST['filter'])&&$_POST['commitment']=='commitment_1') {echo "selected='selected'"; }?>>0-2</option>
	<option value="commitment_2" <?php if (isset ($_POST['filter'])&&$_POST['commitment']=='commitment_2') {echo "selected='selected'"; }?>>3-5</option>
	<option value="commitment_3" <?php if (isset ($_POST['filter'])&&$_POST['commitment']=='commitment_3') {echo "selected='selected'"; }?>>6-10</option>
	<option value="commitment_4" <?php if (isset ($_POST['filter'])&&$_POST['commitment']=='commitment_4') {echo "selected='selected'"; }?>>10</option>
</select> hours per week.
</center>
</td>
<td style="padding:10px;" valign="top">
<center><u>Commitment Duration</u><br>
No more than <select style="color:black" name="duration">
	<option value="">Select...</option>
	<option value="duration_1" <?php if (isset ($_POST['filter'])&&$_POST['duration']=='duration_1') {echo "selected='selected'"; }?>>1</option>
	<option value="duration_2" <?php if (isset ($_POST['filter'])&&$_POST['duration']=='duration_2') {echo "selected='selected'"; }?>>3</option>
	<option value="duration_3" <?php if (isset ($_POST['filter'])&&$_POST['duration']=='duration_3') {echo "selected='selected'"; }?>>5</option>
	<option value="duration_4" <?php if (isset ($_POST['filter'])&&$_POST['duration']=='duration_4') {echo "selected='selected'"; }?>>more than 10</option>
</select> weeks of commitment.
</center>

</tr>
</table>
</form>
</div>
<table id="theTable" style="background-color:#ededed" class="table table-striped">
                <thead class="thead-default" style="background-color:#262626; color:white;">
                <tr align="center">
                    <th class="my-table-center">Name</th>
                    <th class="my-table-center">Category</th>
                    <th class="my-table-center">Description</th>
                    <th class="my-table-center">Time Commitment <small>(hrs/week)</small></th>
                    <th class="my-table-center">Duration (weeks)</th>
                    <th class="my-table-center">Email Contact</th>
                </tr>
                </thead>
                <?php
					//Make Table Here//
                	while($row = mysqli_fetch_array($search_result)): 
                ?>
                <tr class="shownextrow">
                    <td style="text-align:center; vertical-align: center;"><?php //name
                    echo htmlentities($row['name'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?></td>
                    <td style="text-align:center; vertical-align: center;"><?php //name
                    echo htmlentities($row['category'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?></td>
                     <td style="text-align:center; vertical-align: center;"><?php //name
                    echo htmlentities($row['description'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?></td>
                     <td style="text-align:center; vertical-align: center;"><?php //name
                    echo htmlentities($row['commitment'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?></td>
                     <td style="text-align:center; vertical-align: center;"><?php //name
                    echo htmlentities($row['duration'], ENT_QUOTES | ENT_HTML5, 'UTF-8');?></td>
                     <td style="text-align:center; vertical-align: center;"><?php //name
                    echo '<a href="mailto:'.htmlentities($row['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8').'?subject=[Project Marketplace] Request to Work on '. $row['name'].'"">'.htmlentities($row['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8').'</a></td>';?>
                  </tr>
              <?php endwhile ?>
</table>
<!--end content-->


<!-- minifed jQuery -->
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>   
<script type="text/javascript">
    function showFilter() {
    if (document.getElementById('filter1').style.display == "none"){
    document.getElementById("filter1").style.display="table";
    document.getElementById("filter2").style.display="table";
	} else {
	document.getElementById("filter1").style.display="none";
    document.getElementById("filter2").style.display="none";
	}
}

	function unfilter(){for(var i of document.querySelectorAll('[type=checkbox]')) { i.checked = false; } $("select").each(function() { this.selectedIndex = 0 });}
</script>     
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</form>
</font>
</body>
</html>
