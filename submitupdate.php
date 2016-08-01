<?php
session_start();
if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
header ("Location: login.php");
}
	$mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
	$mysql_user   = "bf0fbe99b3665b";
	$mysql_password = "bf7f29f2";
	$mysql_database = "ad_63dc1eebbb2aed2";
	$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
	if($connect->connect_error)
	{
	  die("Connection failed: " . $db->connect_error);
	}
	if(isset($_POST['submit'])) {
		//store all values
		$email_old=$_POST['email_old'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$considers_self_hcp=$_POST['considers_self_hcp'];
		$delivered_health_solutions=$_POST['delivered_health_solutions'];
		if (isset ($_POST['delivered_outpatient'])) {$delivered_outpatient='Yes';} else {$delivered_outpatient='No';}
		if (isset ($_POST['delivered_inpatient'])) {$delivered_inpatient='Yes';} else {$delivered_inpatient='No';}
		if (isset ($_POST['delivered_emergency_room'])) {$delivered_emergency_room='Yes';} else {$delivered_emergency_room='No';}
		if (isset ($_POST['delivered_retail_clinic'])) {$delivered_retail_clinic='Yes';} else {$delivered_retail_clinic='No';}
		if (isset ($_POST['delivered_telehealth'])) {$delivered_telehealth='Yes';} else {$delivered_telehealth='No';}
		if (isset ($_POST['delivered_occupational'])) {$delivered_occupational='Yes';} else {$delivered_occupational='No';}
		if (isset ($_POST['physician_degree'])) {$physician_degree='Yes';} else {$physician_degree='No';}
		if (isset ($_POST['np_degree'])) {$np_degree='Yes';} else {$np_degree='No';}
		if (isset ($_POST['pa_degree'])) {$pa_degree='Yes';} else {$pa_degree='No';}
		if (isset ($_POST['nurse_degree'])) {$nurse_degree='Yes';} else {$nurse_degree='No';}
		if (isset ($_POST['dds_degree'])) {$dds_degree='Yes';} else {$dds_degree='No';}
		if (isset ($_POST['pharmd_degree'])) {$pharmd_degree='Yes';} else {$pharmd_degree='No';}
		if (isset ($_POST['rd_degree'])) {$rd_degree='Yes';} else {$rd_degree='No';}
		if (isset ($_POST['mph_degree'])) {$mph_degree='Yes';} else {$mph_degree='No';}
		if (isset ($_POST['pt_degree'])) {$pt_degree='Yes';} else {$pt_degree='No';}
		if (isset ($_POST['respiratory_degree'])) {$respiratory_degree='Yes';} else {$respiratory_degree='No';}
		if (isset ($_POST['social_care_degree'])) {$social_care_degree='Yes';} else {$social_care_degree='No';}
		if (isset ($_POST['anes_training'])) {$anes_training='Yes';} else {$anes_training='No';}
		if (isset ($_POST['cardiology_training'])) {$cardiology_training='Yes';} else {$cardiology_training='No';}
		if (isset ($_POST['chronic_disease_training'])) {$chronic_disease_training='Yes';} else {$chronic_disease_training='No';}
		if (isset ($_POST['dental_training'])) {$dental_training='Yes';} else {$dental_training='No';}
		if (isset ($_POST['emergency_medicine_training'])) {$emergency_medicine_training='Yes';} else {$emergency_medicine_training='No';}
		if (isset ($_POST['family_medicine_training'])) {$family_medicine_training='Yes';} else {$family_medicine_training='No';}
		if (isset ($_POST['gastro_training'])) {$gastro_training='Yes';} else {$gastro_training='No';}
		if (isset ($_POST['genetics_training'])) {$genetics_training='Yes';} else {$genetics_training='No';}
		if (isset ($_POST['gyne_training'])) {$gyne_training='Yes';} else {$gyne_training='No';}
		if (isset ($_POST['hema_training'])) {$hema_training='Yes';} else {$hema_training='No';}
		if (isset ($_POST['infectious_disease_training'])) {$infectious_disease_training='Yes';} else {$infectious_disease_training='No';}
		if (isset ($_POST['internal_medicine_training'])) {$internal_medicine_training='Yes';} else {$internal_medicine_training='No';}
		if (isset ($_POST['neurology_training'])) {$neurology_training='Yes';} else {$neurology_training='No';}
		if (isset ($_POST['nursing_training'])) {$nursing_training='Yes';} else {$nursing_training='No';}
		if (isset ($_POST['nutrition_training'])) {$nutrition_training='Yes';} else {$nutrition_training='No';}
		if (isset ($_POST['obstetrics_training'])) {$obstetrics_training='Yes';} else {$obstetrics_training='No';}
		if (isset ($_POST['occupational_medicine_training'])) {$occupational_medicine_training='Yes';} else {$occupational_medicine_training='No';}
		if (isset ($_POST['oncology_training'])) {$oncology_training='Yes';} else {$oncology_training='No';}
		if (isset ($_POST['optha_training'])) {$optha_training='Yes';} else {$optha_training='No';}
		if (isset ($_POST['pediatrics_training'])) {$pediatrics_training='Yes';} else {$pediatrics_training='No';}
		if (isset ($_POST['pharm_training'])) {$pharm_training='Yes';} else {$pharm_training='No';}
		if (isset ($_POST['preventive_medicine_training'])) {$preventive_medicine_training='Yes';} else {$preventive_medicine_training='No';}
		if (isset ($_POST['psych_training'])) {$psych_training='Yes';} else {$psych_training='No';}
		if (isset ($_POST['public_health_training'])) {$public_health_training='Yes';} else {$public_health_training='No';}
		if (isset ($_POST['radiology_training'])) {$radiology_training='Yes';} else {$radiology_training='No';}
		if (isset ($_POST['surgery_training'])) {$surgery_training='Yes';} else {$surgery_training='No';}
		$licensed=$_POST['licensed'];
		if (isset ($_POST['employed_provider'])) {$employed_provider='Yes';} else {$employed_provider='No';}
		if (isset ($_POST['employed_payer'])) {$employed_payer='Yes';} else {$employed_payer='No';}
		if (isset ($_POST['employed_health_analytics'])) {$employed_health_analytics='Yes';} else {$employed_health_analytics='No';}
		if (isset ($_POST['employed_life_sciences'])) {$employed_life_sciences='Yes';} else {$employed_life_sciences='No';}
		if (isset ($_POST['employed_medical_device'])) {$employed_medical_device='Yes';} else {$employed_medical_device='No';}
		if (isset ($_POST['employed_government'])) {$employed_government='Yes';} else {$employed_government='No';}
		if (isset ($_POST['employed_biotech'])) {$employed_biotech='Yes';} else {$employed_biotech='No';}
		if (isset ($_POST['employed_health_it'])) {$employed_health_it='Yes';} else {$employed_health_it='No';}
		if (isset ($_POST['employed_other_checkbox'])) {$empoyed_other=$POST['employed_other'];} else {$employed_other='Not applicable';}
		if($_POST['employed_org_1']!=""){$employed_org_1=$_POST['employed_org_1'];} else {$employed_org_1='Not applicable';}
		if($_POST['employed_role_1']!=""){$employed_role_1=$_POST['employed_role_1'];} else {$employed_role_1='Not applicable';}
		if($_POST['employed_org_2']!=""){$employed_org_2=$_POST['employed_org_2'];} else {$employed_org_2='Not applicable';}
		if($_POST['employed_role_2']!=""){$employed_role_2=$_POST['employed_role_2'];} else {$employed_role_2='Not applicable';}
		if($_POST['employed_org_3']!=""){$employed_org_3=$_POST['employed_org_3'];} else {$employed_org_3='Not applicable';}
		if($_POST['employed_role_3']!=""){$employed_role_3=$_POST['employed_role_3'];} else {$employed_role_3='Not applicable';}
		$exp_providers=$_POST['exp_providers'];
		$exp_pharm=$_POST['exp_pharm'];
		$exp_medical_device=$_POST['exp_medical_device'];
		$exp_private_payers=$_POST['exp_private_payers'];
		$exp_public_payers=$_POST['exp_public_payers'];
		$exp_medical_employers=$_POST['exp_medical_employers'];
		$exp_health_info_tech=$_POST['exp_health_info_tech'];
		$exp_level_other=$_POST['exp_level_other'];
		if($_POST['exp_with_other']!=""){$exp_with_other=$_POST['exp_with_other'];} else {$exp_with_other='Not applicable';}
		$exp_us_canada=$_POST['exp_us_canada'];
		$exp_latin_america=$_POST['exp_latin_america'];
		$exp_europe=$_POST['exp_europe'];
		$exp_middle_east_africa=$_POST['exp_middle_east_africa'];
		$exp_asia_pacific=$_POST['exp_asia_pacific'];
		if (isset ($_POST['role_outpatient'])) {$role_outpatient='Yes';} else {$role_outpatient='No';}
		if (isset ($_POST['role_inpatient'])) {$role_inpatient='Yes';} else {$role_inpatient='No';}
		if (isset ($_POST['role_emergency_room'])) {$role_emergency_room='Yes';} else {$role_emergency_room='No';}
		if (isset ($_POST['role_retail_clinic'])) {$role_retail_clinic='Yes';} else {$role_retail_clinic='No';}
		if (isset ($_POST['role_telehealth'])) {$role_telehealth='Yes';} else {$role_telehealth='No';}
		if (isset ($_POST['role_occupational_health'])) {$role_occupational_health='Yes';} else {$role_occupational_health='No';}
		if (isset ($_POST['role_pharm'])) {$role_pharm='Yes';} else {$role_pharm='No';}
		if (isset ($_POST['checkOther2'])) {$role_other=$_POST['role_other'];} else {$role_other='Not applicable';}
		if($_POST['health_anal_org_1']!=""){$health_anal_org_1=$_POST['health_anal_org_1'];} else {$health_anal_org_1='Not applicable';}
		if($_POST['health_anal_role_1']!=""){$health_anal_role_1=$_POST['health_anal_role_1'];} else {$health_anal_role_1='Not applicable';}
		if($_POST['health_anal_org_2']!=""){$health_anal_org_2=$_POST['health_anal_org_2'];} else {$health_anal_org_2='Not applicable';}
		if($_POST['health_anal_role_2']!=""){$health_anal_role_2=$_POST['health_anal_role_2'];} else {$health_anal_role_2='Not applicable';}
		if($_POST['health_anal_org_3']!=""){$health_anal_org_3=$_POST['health_anal_org_3'];} else {$health_anal_org_3='Not applicable';}
		if($_POST['health_anal_role_3']!=""){$health_anal_role_3=$_POST['health_anal_role_3'];} else {$health_anal_role_3='Not applicable';}
		if($_POST['health_info_org_1']!=""){$health_info_org_1=$_POST['health_info_org_1'];} else {$health_info_org_1='Not applicable';}
		if($_POST['health_info_role_1']!=""){$health_info_role_1=$_POST['health_info_role_1'];} else {$health_info_role_1='Not applicable';}
		if($_POST['health_info_org_2']!=""){$health_info_org_2=$_POST['health_info_org_2'];} else {$health_info_org_2='Not applicable';}
		if($_POST['health_info_role_2']!=""){$health_info_role_2=$_POST['health_info_role_2'];} else {$health_info_role_2='Not applicable';}
		if($_POST['health_info_org_3']!=""){$health_info_org_3=$_POST['health_info_org_3'];} else {$health_info_org_3='Not applicable';}
		if($_POST['health_info_role_3']!=""){$health_info_role_3=$_POST['health_info_role_3'];} else {$health_info_role_3='Not applicable';}
		$exp_onc=$_POST['exp_onc'];
		$exp_genomics=$_POST['exp_genomics'];
		$exp_clinical_trials=$_POST['exp_clinical_trials'];
		$exp_radiology=$_POST['exp_radiology'];
		$exp_health_wellness=$_POST['exp_health_wellness'];
		$exp_chronic_disease_management=$_POST['exp_chronic_disease_management'];
		$exp_preventive_care=$_POST['exp_preventive_care'];
		$exp_population_health=$_POST['exp_population_health'];
		$exp_social_welfare=$_POST['exp_social_welfare'];
		$exp_life_sciences=$_POST['exp_life_sciences'];
		$exp_value_based_care=$_POST['exp_value_based_care'];
		$exp_heart_disease=$_POST['exp_heart_disease'];
		$exp_diabetes=$_POST['exp_diabetes'];
		$exp_arthritis=$_POST['exp_arthritis'];
		$exp_asthma_copd=$_POST['exp_asthma_copd'];
		$exp_cancer=$_POST['exp_cancer'];
		$exp_mental_health=$_POST['exp_mental_health'];
		$exp_level_other_2=$_POST['exp_level_other_2'];
		if($_POST['exp_with_other_2']!=""){$exp_with_other_2=$_POST['exp_with_other_2'];} else {$exp_with_other_2='Not applicable';}
		$author=$_POST['author'];
		if($_POST['focus_area_1']!=""){$focus_area_1=$_POST['focus_area_1'];} else {$focus_area_1='Not applicable';}
		if($_POST['focus_area_2']!=""){$focus_area_2=$_POST['focus_area_2'];} else {$focus_area_2='Not applicable';}
		if($_POST['focus_area_3']!=""){$focus_area_3=$_POST['focus_area_3'];} else {$focus_area_3='Not applicable';}

		$query="UPDATE persons SET name='$name', email='$email', considers_self_hcp='$considers_self_hcp', delivered_health_solutions='$delivered_health_solutions', delivered_outpatient='$delivered_outpatient', delivered_inpatient='$delivered_inpatient', delivered_emergency_room='$delivered_emergency_room', delivered_retail_clinic='$delivered_retail_clinic', delivered_telehealth='$delivered_telehealth', delivered_occupational='$delivered_occupational', physician_degree='$physician_degree', np_degree='$np_degree', pa_degree='$pa_degree', nurse_degree='$nurse_degree', dds_degree='$dds_degree', pharmd_degree='$pharmd_degree', rd_degree='$rd_degree', mph_degree='$mph_degree', pt_degree='$pt_degree', respiratory_degree='$respiratory_degree', social_care_degree='$social_care_degree', anes_training='$anes_training', cardiology_training='$cardiology_training', chronic_disease_training='$chronic_disease_training', dental_training='$dental_training', emergency_medicine_training='$emergency_medicine_training', family_medicine_training='$family_medicine_training', gastro_training='$gastro_training', genetics_training='$genetics_training', gyne_training='$gyne_training', hema_training='$hema_training', infectious_disease_training='$infectious_disease_training', internal_medicine_training='$internal_medicine_training', neurology_training='$neurology_training', nursing_training='$nursing_training', nutrition_training='$nutrition_training', obstetrics_training='$obstetrics_training', occupational_medicine_training='$occupational_medicine_training', oncology_training='$oncology_training', optha_training='$optha_training', pediatrics_training='$pediatrics_training', pharm_training='$pharm_training', preventive_medicine_training='$preventive_medicine_training', psych_training='$psych_training', public_health_training='$public_health_training', radiology_training='$radiology_training', surgery_training='$surgery_training', licensed='$licensed', employed_provider='$employed_provider', employed_payer='$employed_payer', employed_health_analytics='$employed_health_analytics', employed_life_sciences='$employed_life_sciences', employed_medical_device='$employed_medical_device', employed_government='$employed_government', employed_biotech='$employed_biotech', employed_health_analytics='$employed_health_it', employed_other='$employed_other', employed_org_1='$employed_org_1', employed_role_1='$employed_role_1', employed_org_2='$employed_org_2', employed_role_2='$employed_role_2', employed_org_3='$employed_org_3', employed_role_3='$employed_role_3', exp_providers='$exp_providers', exp_pharm='$exp_pharm', exp_medical_device='$exp_medical_device', exp_private_payers='$exp_private_payers', exp_public_payers='$exp_public_payers', exp_medical_employers='$exp_medical_employers', exp_health_info_tech='$exp_health_info_tech', exp_level_other='$exp_level_other', exp_with_other='$exp_with_other', exp_us_canada='$exp_us_canada', exp_latin_america='$exp_latin_america', exp_europe='$exp_europe', exp_middle_east_africa='$exp_middle_east_africa', exp_asia_pacific='$exp_asia_pacific', role_outpatient='$role_outpatient', role_inpatient='$role_inpatient', role_emergency_room='$role_emergency_room', role_retail_clinic='$role_retail_clinic', role_telehealth='$role_telehealth', role_occupational_health='$role_occupational_health', role_pharm='$role_pharm', role_other='$role_other', health_anal_org_1='$health_anal_org_1', health_anal_role_1='$health_anal_role_1', health_anal_org_2='$health_anal_org_2', health_anal_role_2='$health_anal_role_2', health_anal_org_3='$health_anal_org_3', health_anal_role_3='$health_anal_role_3', health_info_org_1='$health_info_org_1', health_info_role_1='$health_info_role_1', health_info_org_2='$health_info_org_2', health_info_role_2='$health_info_role_2', health_info_org_3='$health_info_org_3', health_info_role_3='$health_info_role_3', exp_onc='$exp_onc', exp_genomics='$exp_genomics', exp_clinical_trials='$exp_clinical_trials', exp_radiology='$exp_radiology', exp_health_wellness='$exp_health_wellness', exp_chronic_disease_management='$exp_chronic_disease_management', exp_preventive_care='$exp_preventive_care', exp_population_health='$exp_population_health', exp_social_welfare='$exp_social_welfare', exp_life_sciences='$exp_life_sciences', exp_value_based_care='$exp_value_based_care', exp_heart_disease='$exp_heart_disease', exp_diabetes='$exp_diabetes', exp_arthritis='$exp_arthritis', exp_asthma_copd='$exp_asthma_copd', exp_cancer='$exp_cancer', exp_mental_health='$exp_mental_health', exp_level_other_2='$exp_level_other_2', exp_with_other_2='$exp_with_other_2', author='$author', focus_area_1='$focus_area_1', focus_area_2='$focus_area_2', focus_area_3='$focus_area_3' WHERE email='$email_old'";


		mysqli_query($connect,$query);

		echo "Submitted successfully!";
} else {
	if(isset($_POST['delete']))
		$email_old=$_POST['email_old'];
		$query = "DELETE FROM persons WHERE email = '$email_old'";
		mysqli_query($connect,$query);
		echo "Deleted successfully!";
}

	
?>
<a href=index.php>Return to database to search for your profile!</a>

