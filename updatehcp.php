

<!DOCTYPE html>
<html>
<head>
    <title>Update HCP List</title>
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
	$mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
	$mysql_user     = "bf0fbe99b3665b";
	$mysql_password = "bf7f29f2";
	$mysql_database = "ad_63dc1eebbb2aed2";
	$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
	$valueToSearch = $_POST['valueToSearch'];
	$valueToSearch = mysqlI_escape_string($connect, $valueToSearch);
	$sql = "SELECT * FROM persons WHERE `email` LIKE '%".$valueToSearch."%'";
	$search_result = mysqli_query($connect, $sql);
	$row = mysqli_fetch_array($search_result);
	} else {
		header("Location: selecthcp.php");
		
	}

	$count = mysqli_num_rows($search_result);
	if($count != 1) {
		header("Location: selecthcp.php");
	}
    ?>
</head>
<body>
<font size="3">
<form action="submitupdate.php" method="post">
<div class="container">
    <center><h1>Update HCP</h1><br>
    <button type="submit" class="btn btn-primary btn-large" onclick="return confirm('Are you sure? This action CANNOT be undone and the user will have to re-take the survey to be added to the list again.')" width="30px" height="60px" type="button" name="delete">DELETE HCP</button></center>
    Please answer every question.<br><br>
    <table class="submitTable">
    <tr>
    <td width="100px">Full Name: </td><td width="auto"><input style="width:40%; height:30px" type="text" name="name" value='<?php echo $row['name']; ?>'><td>
    </tr>
    <tr>
    <td width="100px">Email: </td><td width="auto"><input style="width:40%; height:30px" type="text" name="email" value='<?php echo $row['email']; ?>'>
    <input style="width:40%; height:30px; display:none;" type="text" name="email_old" value='<?php echo $row['email']; ?>'></td>
    </tr>
    </table>
    <br>
    
    1.  Would you consider yourself a health/healthcare professional as defined above? 
    <select name="considers_self_hcp">
          <option value="No"<?php if ($row['considers_self_hcp'] == 'No') echo ' selected="selected"'; ?>>No</option>
          <option value="Yes"<?php if ($row['considers_self_hcp'] == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
    </select>
    <br><br>
    2. Have you delivered “health services” directly to individuals? 
    <select id="2" name="delivered_health_solutions">
           <option value="No"<?php if ($row['delivered_health_solutions'] == 'No') echo ' selected="selected"'; ?>>No</option>
          <option value="Yes"<?php if ($row['delivered_health_solutions'] == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
    </select>
    <div id="21">
    2.1. In what type of setting did you deliver "health services"? (Select all that apply)<br>
        <input type="checkbox" <?php if ($row['delivered_outpatient'] == 'Yes') echo 'checked'; ?> name="delivered_outpatient" value="delivered_outpatient">Outpatient or Clinic<br>
        <input type="checkbox" <?php if ($row['delivered_inpatient'] == 'Yes') echo 'checked'; ?> name="delivered_inpatient" value="delivered_inpatient">Inpatient or Hospital <br>
        <input type="checkbox" <?php if ($row['delivered_emergency_room'] == 'Yes') echo 'checked'; ?> name="delivered_emergency_room" value="delivered_emergency_room">Emergency Room <br>
        <input type="checkbox" <?php if ($row['delivered_retail_clinic'] == 'Yes') echo 'checked'; ?> name="delivered_retail_clinic" value="delivered_retail_clinic">Retail Clinic <br>
        <input type="checkbox" <?php if ($row['delivered_telehealth'] == 'Yes') echo 'checked'; ?> name="delivered_telehealth" value="delivered_telehealth">Telehealth <br>
        <input type="checkbox" <?php if ($row['delivered_occupational'] == 'Yes') echo 'checked'; ?> name="delivered_occupational" value="delivered_occupational">Occupational Health Clinic<br><br>
    </div>
    3A. What type of health/healthcare professional <strong>degree(s)</strong> do you have? Select all that apply.<br>
        <input type="checkbox" <?php if ($row['physician_degree'] == 'Yes') echo 'checked'; ?> name="physician_degree" value="physician_degree">Physician <br>
        <input type="checkbox" <?php if ($row['np_degree'] == 'Yes') echo 'checked'; ?> name="np_degree" value="np_degree">Nurse Practitioner  <br>
        <input type="checkbox" <?php if ($row['pa_degree'] == 'Yes') echo 'checked'; ?> name="pa_degree" value="pa_degree">Physician Assistant  <br>
        <input type="checkbox" <?php if ($row['nurse_degree'] == 'Yes') echo 'checked'; ?> name="nurse_degree" value="nurse_degree">Nurse <br>
        <input type="checkbox" <?php if ($row['dds_degree'] == 'Yes') echo 'checked'; ?> name="dds_degree" value="dds_degree">Dentist <br>
        <input type="checkbox" <?php if ($row['pharmd_degree'] == 'Yes') echo 'checked'; ?> name="pharmd_degree" value="pharmd_degree">Pharmacist <br>
        <input type="checkbox" <?php if ($row['rd_degree'] == 'Yes') echo 'checked'; ?> name="rd_degree" value="rd_degree">Dietitian or Nutritionist <br>
        <input type="checkbox" <?php if ($row['mph_degree'] == 'Yes') echo 'checked'; ?> name="mph_degree" value="mph_degree">Master in Public Health or Administration <br>
        <input type="checkbox" <?php if ($row['pt_degree'] == 'Yes') echo 'checked'; ?> name="pt_degree" value="pt_degree">Physical/Occupational Therapist <br>
        <input type="checkbox" <?php if ($row['respiratory_degree'] == 'Yes') echo 'checked'; ?> name="respiratory_degree" value="respiratory_degree">Respiratory Therapist <br>
        <input type="checkbox" <?php if ($row['social_care_degree'] == 'Yes') echo 'checked'; ?> name="social_care_degree" value="social_care_degree">Social Care Worker <br><br>  
    3B. What type of health/healthcare professional <strong>practice/post-degreee training</strong> do you have? Select all that apply.<br>
        <input type="checkbox" <?php if ($row['anes_training'] == 'Yes') echo 'checked'; ?> name="anes_training" value="anes_training">Anesthesiology <br>
        <input type="checkbox" <?php if ($row['cardiology_training'] == 'Yes') echo 'checked'; ?> name="cardiology_training" value="cardiology_training">Cardiology <br>
        <input type="checkbox" <?php if ($row['chronic_disease_training'] == 'Yes') echo 'checked'; ?> name="chronic_disease_training" value="chronic_disease_training">Chronic Disease Management <br>
        <input type="checkbox" <?php if ($row['dental_training'] == 'Yes') echo 'checked'; ?> name="dental_training" value="dental_training">Dental <br>
        <input type="checkbox" <?php if ($row['emergency_medicine_training'] == 'Yes') echo 'checked'; ?> name="emergency_medicine_training" value="emergency_medicine_training">Emergency Medicine  <br>
        <input type="checkbox" <?php if ($row['family_medicine_training'] == 'Yes') echo 'checked'; ?> name="family_medicine_training" value="family_medicine_training">Family Medicine  <br>
        <input type="checkbox" <?php if ($row['gastro_training'] == 'Yes') echo 'checked'; ?> name="gastro_training" value="gastro_training">Gastroenterology <br>
        <input type="checkbox" <?php if ($row['genetics_training'] == 'Yes') echo 'checked'; ?> name="genetics_training" value="genetics_training">Genetics <br>
        <input type="checkbox" <?php if ($row['gyne_training'] == 'Yes') echo 'checked'; ?> name="gyne_training" value="gyne_training">Gynecology  <br>
        <input type="checkbox" <?php if ($row['hema_training'] == 'Yes') echo 'checked'; ?> name="hema_training" value="hema_training">Hematology <br>
        <input type="checkbox" <?php if ($row['infectious_disease_training'] == 'Yes') echo 'checked'; ?> name="infectious_disease_training" value="infectious_disease_training">Infectious Disease  <br>
        <input type="checkbox" <?php if ($row['internal_medicine_training'] == 'Yes') echo 'checked'; ?> name="internal_medicine_training" value="internal_medicine_training">Internal Medicine <br>
        <input type="checkbox" <?php if ($row['neurology_training'] == 'Yes') echo 'checked'; ?> name="neurology_training" value="neurology_training">Neurology  <br>
        <input type="checkbox" <?php if ($row['nursing_training'] == 'Yes') echo 'checked'; ?> name="nursing_training" value="nursing_training">Nursing <br>
        <input type="checkbox" <?php if ($row['nutrition_training'] == 'Yes') echo 'checked'; ?> name="nutrition_training" value="nutrition_training">Nutrition  <br>
        <input type="checkbox" <?php if ($row['obstetrics_training'] == 'Yes') echo 'checked'; ?> name="obstetrics_training" value="obstetrics_training">Obstetrics <br>
        <input type="checkbox" <?php if ($row['occupational_medicine_training'] == 'Yes') echo 'checked'; ?> name="occupational_medicine_training" value="occupational_medicine_training">Occupational Medicine  <br>
        <input type="checkbox" <?php if ($row['oncology_training'] == 'Yes') echo 'checked'; ?> name="oncology_training" value="oncology_training">Oncology  <br>
        <input type="checkbox" <?php if ($row['optha_training'] == 'Yes') echo 'checked'; ?> name="optha_training" value="optha_training">Ophthalmology <br>
        <input type="checkbox" <?php if ($row['pediatrics_training'] == 'Yes') echo 'checked'; ?> name="pediatrics_training" value="pediatrics_training">Pediatrics <br>
        <input type="checkbox" <?php if ($row['pharm_training'] == 'Yes') echo 'checked'; ?> name="pharm_training" value="pharm_training">Pharmacy <br>
        <input type="checkbox" <?php if ($row['preventive_medicine_training'] == 'Yes') echo 'checked'; ?> name="preventive_medicine_training" value="preventive_medicine_training">Preventive Medicine <br>
        <input type="checkbox" <?php if ($row['psych_training'] == 'Yes') echo 'checked'; ?> name="psych_training" value="psych_training">Psychiatry  <br>
        <input type="checkbox" <?php if ($row['public_health_training'] == 'Yes') echo 'checked'; ?> name="public_health_training" value="public_health_training">Public Health <br>
        <input type="checkbox" <?php if ($row['radiology_training'] == 'Yes') echo 'checked'; ?> name="radiology_training" value="radiology_training">Radiology  <br>
        <input type="checkbox" <?php if ($row['surgery_training'] == 'Yes') echo 'checked'; ?> name="surgery_training" value="surgery_training">Surgery  <br><br>
    4.  Are you currently licensed in your field to practice or deliver care?
    <select name="licensed">
           <option value="No"<?php if ($row['licensed'] == 'No') echo ' selected="selected"'; ?>>No</option>
          <option value="Yes"<?php if ($row['licensed'] == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
    </select>
    (Select "No" if not applicable)
    <br><br>

    5. Have you been employed by any of the following types of organizations? <br>
        <input type="checkbox" <?php if ($row['employed_provider'] == 'Yes') echo 'checked'; ?> id="employed_provider" onclick="show51();" value="employed_provider">Provider <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_payer'] == 'Yes') echo 'checked'; ?> id="employed_payer" value="employed_payer">Payer <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_health_analytics'] == 'Yes') echo 'checked'; ?> id="employed_health_analytics" value="employed_health_analytics">Health Analytics  <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_life_sciences'] == 'Yes') echo 'checked'; ?> id="employed_life_sciences" value="employed_life_sciences">Life Sciences  <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_medical_device'] == 'Yes') echo 'checked'; ?> id="employed_medical_device" value="employed_medical_device">Medical Device <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_government'] == 'Yes') echo 'checked'; ?> id="employed_government" value="employed_government">Government  <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_biotech'] == 'Yes') echo 'checked'; ?> id="employed_biotech" value="employed_biotech">Biotech  <br>
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_health_it'] == 'Yes') echo 'checked'; ?> id="employed_health_it" value="employed_health_it">Health IT<br> 
        <input type="checkbox" onclick="show51();" <?php if ($row['employed_other'] != 'Not applicable') echo 'checked'; ?> id="checkOther1" value="employed_other_checkbox">Other: <input onclick="checkOther()" value='<?php echo $row['employed_other']; ?>' width:40%; height:25px" type="text" name="employed_other" placeholder=""><br><br>

    <div id="51">

    5.1. Optional: Based on your response to question 5 above, please list up to 3 organizations and/or roles.<br><br>
        1.
         <input style="width:40%; height:40px" value='<?php echo $row['employed_org_1']; ?>' type="text" name="employed_org_1" placeholder="Organization Name">
         <input style="width:40%; height:40px" type="text" value='<?php echo $row['employed_role_1']; ?>' name="employed_role_1" placeholder="Organization Role"><br><br>
        2.
         <input style="width:40%; height:40px" type="text" value='<?php echo $row['employed_org_2']; ?>' name="employed_org_2" placeholder="Organization Name">
         <input style="width:40%; height:40px" type="text" value='<?php echo $row['employed_role_2']; ?>' name="employed_role_2" placeholder="Organization Role"><br><br>
        3.
         <input style="width:40%; height:40px" type="text" value='<?php echo $row['employed_org_3']; ?>' name="employed_org_3" placeholder="Organization Name">
         <input style="width:40%; height:40px" type="text" value='<?php echo $row['employed_role_3']; ?>' name="employed_role_3" placeholder="Organization Role"><br><br>
    </div>

    6. Please rate your experiences in having the following healthcare stakeholder as a customer you have provided solutions/services to. <br>
    a. Providers (e.g., hospitals, clinics, healthcare systems)
    <select name="exp_providers">
    <option value="no experience"<?php if ($row['exp_providers'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_providers'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_providers'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_providers'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>     
    b. Pharmaceutical / Biotechnology
    <select name="exp_pharm">
    <option value="no experience"<?php if ($row['exp_pharm'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_pharm'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_pharm'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_pharm'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>
    c. Medical Device
    <select name="exp_medical_device">
    <option value="no experience"<?php if ($row['exp_medical_device'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_medical_device'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_medical_device'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_medical_device'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>
    d. Private Payers (e.g., health insurance companies)
    <select name="exp_private_payers">
    <option value="no experience"<?php if ($row['exp_private_payers'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_private_payers'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_private_payers'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_private_payers'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>  
    e. Public Payers (e.g., government)
    <select name="exp_public_payers">
    <option value="no experience"<?php if ($row['exp_public_payers'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_public_payers'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_public_payers'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_public_payers'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>
    f. Employers – Health & Benefits
    <select name="exp_medical_employers">
    <option value="no experience"<?php if ($row['exp_medical_employers'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_medical_employers'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_medical_employers'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_medical_employers'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>
    g. Health Information Technology (e.g., EMR, digital health)
    <select name="exp_health_info_tech">
    <option value="no experience"<?php if ($row['exp_health_info_tech'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_health_info_tech'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_health_info_tech'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_health_info_tech'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br> 
    h. Other (please explain)
    <select name="exp_level_other">
   <option value="no experience"<?php if ($row['exp_level_other'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_level_other'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_level_other'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_level_other'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select>
    with <input style="width:40%; height:25px" type="text" name="exp_with_other" value='<?php echo $row['exp_with_other']; ?>' ><br><br>

    7. Please rate your experiences working in the following geographies. <br>
    a. United States and Canada    
    <select name="exp_us_canada">
      <option value="no experience"<?php if ($row['exp_us_canada'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_us_canada'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_us_canada'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_us_canada'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br> 
    b. Latin America   
    <select name="exp_latin_america">
     <option value="no experience"<?php if ($row['exp_latin_america'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_latin_america'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_latin_america'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_latin_america'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>      
    c. Europe  
    <select name="exp_europe">
    <option value="no experience"<?php if ($row['exp_europe'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_europe'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_europe'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_europe'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>        
    d. Middle East, Africa  
    <select name="exp_middle_east_africa">
     <option value="no experience"<?php if ($row['exp_middle_east_africa'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_middle_east_africa'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_middle_east_africa'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_middle_east_africa'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br>       
    e. Pacific Asia
    <select name="exp_asia_pacific">
     <option value="no experience"<?php if ($row['exp_asia_pacific'] == 'no experience') echo ' selected="selected"'; ?>>no experience</option>
    <option value="minimal experiences"<?php if ($row['exp_asia_pacific'] == 'minimal experiences') echo ' selected="selected"'; ?>>minimal experiences</option>
    <option vlaue="some experiences"<?php if ($row['exp_asia_pacific'] == 'some experiences') echo ' selected="selected"'; ?>>some experiences</option>
    <option value="high level of experiences"<?php if ($row['exp_asia_pacific'] == 'high level of experiences') echo ' selected="selected"'; ?>>high level of experiences</option>
    </select><br> <br>

    8. In what location/setting did you hold “operations/administrative” roles? <br>
       <input type="checkbox" id="employed_provider" onclick="show51();"  <?php if ($row['role_outpatient'] == 'Yes') echo 'checked'; ?> value="role_outpatient">Outpatient or Clinic <br>
        <input type="checkbox" onclick="show51();" id="role_outpatient"  <?php if ($row['role_inpatient'] == 'Yes') echo 'checked'; ?> value="role_inpatient">Inpatient or Hospital <br>
        <input type="checkbox" onclick="show51();" id="role_emergency_room"  <?php if ($row['role_emergency_room'] == 'Yes') echo 'checked'; ?> value="role_emergency_room">Emergency Room  <br>
        <input type="checkbox" onclick="show51();" id="role_retail_clinic"  <?php if ($row['role_retail_clinic'] == 'Yes') echo 'checked'; ?> value="role_retail_clinic">Retail Clinic <br>
        <input type="checkbox" onclick="show51();" id="role_telehealth"  <?php if ($row['role_telehealth'] == 'Yes') echo 'checked'; ?> value="role_telehealth">Telehealth  <br>
        <input type="checkbox" onclick="show51();" id="role_occupational_health"  <?php if ($row['role_occupational_health'] == 'Yes') echo 'checked'; ?> value="role_occupational_health">Occupational Health  <br>
        <input type="checkbox" onclick="show51();" id="role_pharm" value="role_pharm">Pharmacy<br> 
        <input type="checkbox" onclick="show51();" id="checkOther2"  <?php if ($row['role_other'] != 'Not applicable') echo 'checked'; ?> value="employed_other_checkbox">Other: <input style="width:40%; height:25px" onclick="roleOther();" type="text" name="role_other" value='<?php echo $row['role_other']; ?>'><br><br>

    9. Please list up to 3 organizations and/or roles you have experience in <strong>health analytics/informatics</strong>. Leave blank if no experience. <br>
    1.
     <input style="width:40%; height:40px" type="text" name="health_anal_org_1" value='<?php echo $row['health_anal_org_1']; ?>'placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_anal_role_1" value='<?php echo $row['health_anal_role_1']; ?>'placeholder="Organization Role"><br><br>
    2.
     <input style="width:40%; height:40px" type="text" name="health_anal_org_2" value='<?php echo $row['health_anal_org_2']; ?>'placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_anal_role_2" value='<?php echo $row['health_anal_role_2']; ?>'placeholder="Organization Role"><br><br>
    3.
     <input style="width:40%; height:40px" type="text" name="health_anal_org_3" value='<?php echo $row['health_anal_org_3']; ?>'placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_anal_role_3" value='<?php echo $row['health_anal_role_3']; ?>'placeholder="Organization Role"><br><br>

    10. Please list up to 3 organizations and/or roles you have experience with <strong>health information technology</strong>. <br>
    1.
     <input style="width:40%; height:40px" type="text" name="health_info_org_1" value='<?php echo $row['health_info_org_1']; ?>'placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_info_role_1" value='<?php echo $row['health_info_role_1']; ?>'placeholder="Organization Role"><br><br>
    2.
     <input style="width:40%; height:40px" type="text" name="health_info_org_2" value='<?php echo $row['health_info_org_2']; ?>'placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_info_role_2" value='<?php echo $row['health_info_role_2']; ?>'placeholder="Organization Role"><br><br>
    3.
     <input style="width:40%; height:40px" type="text" name="health_info_org_3" value='<?php echo $row['health_info_org_3']; ?>'placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_info_role_3" value='<?php echo $row['health_info_role_3']; ?>'placeholder="Organization Role"><br><br>

    11. Please rate your experience in the following Watson Health focus areas. <br>
    a. Oncology    
    <select name="exp_onc">
    <option value="no expertise"<?php if ($row['exp_onc'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_onc'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_onc'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_onc'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_onc'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>          
    b. Genomics  
    <select name="exp_genomics">
    <option value="no expertise"<?php if ($row['exp_genomics'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_genomics'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_genomics'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_genomics'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_genomics'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>            
    c. Clinical Trials
    <select name="exp_clinical_trials">
   <option value="no expertise"<?php if ($row['exp_clinical_trials'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_clinical_trials'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_clinical_trials'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_clinical_trials'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_clinical_trials'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>             
    d. Radiology  
    <select name="exp_radiology">
   <option value="no expertise"<?php if ($row['exp_radiology'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_radiology'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_radiology'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_radiology'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_radiology'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>           
    e. Health and Wellness     
    <select name="exp_health_wellness">
    <option value="no expertise"<?php if ($row['exp_health_wellness'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_health_wellness'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_health_wellness'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_health_wellness'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_health_wellness'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>        
    f. Chronic Disease Management    
    <select name="exp_chronic_disease_management">
    <option value="no expertise"<?php if ($row['exp_chronic_disease_management'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_chronic_disease_management'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_chronic_disease_management'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_chronic_disease_management'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_chronic_disease_management'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>          
    g. Preventive Care (e.g., vaccinations, cancer screenings)   
    <select name="exp_preventive_care">
    <option value="no expertise"<?php if ($row['exp_preventive_care'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_preventive_care'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_preventive_care'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_preventive_care'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_preventive_care'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>          
    h. Population Health  
    <select name="exp_population_health">
    <option value="no expertise"<?php if ($row['exp_population_health'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_population_health'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_population_health'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_population_health'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_population_health'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>           
    i. Social and Welfare Programs/Social Determinants of Health
    <select name="exp_social_welfare">
    <option value="no expertise"<?php if ($row['exp_social_welfare'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_social_welfare'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_social_welfare'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_social_welfare'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_social_welfare'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>             
    j. Life Sciences Real World Evidence   
    <select name="exp_life_sciences">
    <option value="no expertise"<?php if ($row['exp_life_sciences'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_life_sciences'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_life_sciences'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_life_sciences'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_life_sciences'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>          
    k. Value-Based Care
    <select name="exp_value_based_care">
    <option value="no expertise"<?php if ($row['exp_value_based_care'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_value_based_care'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_value_based_care'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_value_based_care'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_value_based_care'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>  <br> 

    12. Please rate your market experience in the following therapeutic areas. <br>
    a. Heart Disease   
    <select name="exp_heart_disease">
   <option value="no expertise"<?php if ($row['exp_heart_disease'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_heart_disease'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_heart_disease'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_heart_disease'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_heart_disease'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>                 
    b. Diabetes         
    <select name="exp_diabetes">
    <option value="no expertise"<?php if ($row['exp_diabetes'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_diabetes'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_diabetes'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_diabetes'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_diabetes'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>            
    c. Arthritis      
    <select name="exp_arthritis">
    <option value="no expertise"<?php if ($row['exp_arthritis'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_arthritis'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_arthritis'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_arthritis'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_arthritis'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>              
    d. Asthma/COPD  
    <select name="exp_asthma_copd">
    <option value="no expertise"<?php if ($row['exp_asthma_copd'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_asthma_copd'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_asthma_copd'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_asthma_copd'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_asthma_copd'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>                  
    e. Cancer   
    <select name="exp_cancer">
   <option value="no expertise"<?php if ($row['exp_cancer'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_cancer'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_cancer'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_cancer'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_cancer'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>                  
    f. Mental Health    
    <select name="exp_mental_health">
    <option value="no expertise"<?php if ($row['exp_mental_health'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_mental_health'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_mental_health'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_mental_health'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_mental_health'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select><br>                
    g. Other (please explain)
    <select name="exp_level_other_2">
    <option value="no expertise"<?php if ($row['exp_level_other_2'] == 'no expertise') echo ' selected="selected"'; ?>>no expertise</option>
    <option value="minimal expertise"<?php if ($row['exp_level_other_2'] == 'minimal expertise') echo ' selected="selected"'; ?>>minimal expertise</option>
    <option vlaue="some expertise"<?php if ($row['exp_level_other_2'] == 'some expertise') echo ' selected="selected"'; ?>>some expertise</option>
    <option value="high level of expertise"<?php if ($row['exp_level_other_2'] == 'high level of expertise') echo ' selected="selected"'; ?>>high level of expertise</option>
    <option value="expert"<?php if ($row['exp_level_other_2'] == 'expert') echo ' selected="selected"'; ?>>expert</option>
    </select>
    with <input style="width:40%; height:25px" type="text" name="exp_with_other_2" value='<?php echo $row['exp_with_other_2']; ?>' ><br><br>

    13. Are you an author on any peer-reviewed abstracts and/or publications?
    <select id="author" onclick="show131();" name="author">
           <option value="No"<?php if ($row['author'] == 'No') echo ' selected="selected"'; ?>>No</option>
          <option value="Yes"<?php if ($row['author'] == 'Yes') echo ' selected="selected"'; ?>>Yes</option>
    </select><br>

    <div id='131'>
    13.1. Please list top 3 focus areas of research. <br>
    1.<input style="width:40%; height:40px" type="text" name="focus_area_1" value='<?php echo $row['focus_area_1']; ?>' ><br><br>
    2.<input style="width:40%; height:40px" type="text" name="focus_area_2" value='<?php echo $row['focus_area_2']; ?>' ><br><br>
    3. <input style="width:40%; height:40px" type="text" name="focus_area_3" value='<?php echo $row['focus_area_3']; ?>' ><br><br>

    </div>
    <input type="checkbox" id="showSubmit" onclick="checkSubmit();" value="showSubmit">Clicking submit will replace the HCP entry entirely with what you have updated.<br>
    <div style="display: n" id="255">
    <center>
    <br>
        <button  type="submit" class="btn btn-primary btn-large" width="30px" height="60px" type="button" name="submit">SUBMIT</button>
    </center>
    </div>
    <br>
    <br>
    <br>
    <br>
</div>
<!-- minifed jQuery -->
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
 

    function checkOther() {
      document.getElementById("checkOther1").checked = true;
    }

    function roleOther() {
      document.getElementById("checkOther2").checked = true;
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
</font>
</body>
</html>