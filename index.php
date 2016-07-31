<!DOCTYPE html>
<html>
<head>
	<title>IBM HCP List</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" href="style.css" />
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>
<font size="1">
<div class="container-fluid">
	<!--<div class="row">-->
		<!--<div class="col-md-8">
			Main content goes here.
		</div>-->
		<div class="col-md-12">
				<!--Connect to SQL DB-->
				<?php
				error_reporting(E_ALL); ini_set('display_errors', 1);

				if(isset($_POST['search'])) {
					$display = "no custom filters";
					unset($print);
					$print=[];
   					$valueToSearch = $_POST['valueToSearch'];
    				// search in all table columns
    				// using concat mysql function
    				$query = "CONCAT(`name`, `email`, `exp_with_other_2`, `exp_with_other`, `role_other`, `health_anal_org_1`, `health_anal_role_1`, `health_anal_org_2`, `health_anal_role_2`, `health_anal_org_3`, `health_anal_role_3`, `health_info_org_1`, `health_info_role_1`, `health_info_org_2`, `health_info_role_2`, `health_info_org_3`, `health_info_role_3`) LIKE '%".$valueToSearch."%'";

// Start of with some "base" or "generic" SQL which will be needed no matter which option/s are selected:
$sql_base = "SELECT * FROM persons WHERE ";

// Now check the $_POST'ed values.  By adding each checked checkbox into a temporary array ( $sql_extra ), you can then merge it into a valid SQL string later:
$sql_extra[] = $query;
if (isset ( $_POST['delivered_outpatient'] ) ) {$sql_extra[] = "delivered_outpatient='Yes'"; $print[]="Outpatient or Clinic";}
if (isset ( $_POST['delivered_inpatient'] ) ) {$sql_extra[] = "delivered_inpatient='Yes'"; $print[]="Inpatient or Hospital";}
if (isset ( $_POST['delivered_emergency_room'] ) ) {$sql_extra[] = "delivered_emergency_room='Yes'"; $print[]="Emergency Room";}
if (isset ( $_POST['delivered_retail_clinic'] ) ) {$sql_extra[] = "delivered_retail_clinic='Yes'"; $print[]="Retail Clinic";}
if (isset ( $_POST['delivered_telehealth'] ) ) {$sql_extra[] = "delivered_telehealth='Yes'"; $print[]="Telehealth";}
if (isset ( $_POST['delivered_occupational'] ) ) {$sql_extra[] = "delivered_occupational='Yes'"; $print[]="Occupational Health Clinic";}

//Degrees
if (isset ( $_POST['physician_degree'] ) ) {$sql_extra[] = "physician_degree='Yes'"; $print[]="Physician";}
if (isset ( $_POST['np_degree'] ) ) {$sql_extra[] = "np_degree='Yes'"; $print[]="Nurse Practitioner";}
if (isset ( $_POST['pa_degree'] ) ) {$sql_extra[] = "pa_degree='Yes'"; $print[]="Physician Assistant";}
if (isset ( $_POST['nurse_degree'] ) ) {$sql_extra[] = "nurse_degree='Yes'"; $print[]="Nurse";}
if (isset ( $_POST['dds_degree'] ) ) {$sql_extra[] = "dds_degree='Yes'"; $print[]="Dentist";}
if (isset ( $_POST['pharmd_degree'] ) ) {$sql_extra[] = "pharmd_degree='Yes'"; $print[]="Pharmacist";}
if (isset ( $_POST['rd_degree'] ) ) {$sql_extra[] = "rd_degree='Yes'"; $print[]="Dietition or Nutritionist";}
if (isset ( $_POST['mph_degree'] ) ) {$sql_extra[] = "mph_degree='Yes'"; $print[]="Master in Public Health or Administration";}
if (isset ( $_POST['pt_degree'] ) ) {$sql_extra[] = "pt_degree='Yes'"; $print[]="Physical/Occupational Therapist";}
if (isset ( $_POST['respiratory_degree'] ) ) {$sql_extra[] = "respiratory_degree='Yes'"; $print[]="Respiratory Therapist";}
if (isset ( $_POST['social_care_degree'] ) ) {$sql_extra[] = "social_care_degree='Yes'"; $print[]="Social Care Worker";}

//Post Degree Training
if (isset ( $_POST['anes_training'] ) ) {$sql_extra[] = "anes_training='Yes'"; $print[]="Anesthesiology";}
if (isset ( $_POST['cardiology_training'] ) ) {$sql_extra[] = "cardiology_training='Yes'"; $print[]="Cardiology";}
if (isset ( $_POST['chronic_disease_training'] ) ) {$sql_extra[] = "chronic_disease_training='Yes'"; $print[]="Chronic Disease Management";}
if (isset ( $_POST['dental_training'] ) ) {$sql_extra[] = "dental_training='Yes'"; $print[]="Dental";}
if (isset ( $_POST['emergency_medicine_training'] ) ) {$sql_extra[] = "emergency_medicine_training='Yes'"; $print[]="Emergency Medicine";}
if (isset ( $_POST['family_medicine_training'] ) ) {$sql_extra[] = "family_medicine_training='Yes'"; $print[]="Family Medicine";}
if (isset ( $_POST['gastro_training'] ) ) {$sql_extra[] = "gastro_training='Yes'"; $print[]="Gastroenterology";}
if (isset ( $_POST['genetics_training'] ) ) {$sql_extra[] = "genetics_training='Yes'"; $print[]="Genetics";}
if (isset ( $_POST['gyne_training'] ) ) {$sql_extra[] = "gyne_training='Yes'"; $print[]="Gynecology";}
if (isset ( $_POST['hema_training'] ) ) {$sql_extra[] = "hema_training='Yes'"; $print[]="Hematology";}
if (isset ( $_POST['infectious_disease_training'] ) ) {$sql_extra[] = "infectious_disease_training='Yes'"; $print[]="Infectious Disease";}
if (isset ( $_POST['internal_medicine_training'] ) ) {$sql_extra[] = "internal_medicine_training='Yes'"; $print[]="Internal Medicine";}
if (isset ( $_POST['neurology_training'] ) ) {$sql_extra[] = "neurology_training='Yes'"; $print[]="Neurology";}
if (isset ( $_POST['nursing_training'] ) ) {$sql_extra[] = "nursing_training='Yes'"; $print[]="Nursing";}
if (isset ( $_POST['nutrition_training'] ) ) {$sql_extra[] = "nutrition_training='Yes'"; $print[]="Nutrtition";}
if (isset ( $_POST['obstetrics_training'] ) ) {$sql_extra[] = "obstetrics_training='Yes'"; $print[]="Obstetrics";}
if (isset ( $_POST['occupational_medicine_training'] ) ) {$sql_extra[] = "occupational_medicine_training='Yes'"; $print[]="Occupational Medicine";}
if (isset ( $_POST['oncology_training'] ) ) {$sql_extra[] = "oncology_training='Yes'"; $print[]="Oncology";}
if (isset ( $_POST['optha_training'] ) ) {$sql_extra[] = "optha_training='Yes'"; $print[]="Ophthalmology";}
if (isset ( $_POST['pediatrics_training'] ) ) {$sql_extra[] = "pediatrics_training='Yes'"; $print[]="Pediatrics";}
if (isset ( $_POST['pharm_training'] ) ) {$sql_extra[] = "pharm_training='Yes'"; $print[]="Pharmacy";}
if (isset ( $_POST['preventive_medicine_training'] ) ) {$sql_extra[] = "preventive_medicine_training='Yes'"; $print[]="Preventive Medicine";}
if (isset ( $_POST['psych_training'] ) ) {$sql_extra[] = "psych_training='Yes'"; $print[]="Psychiatry";}
if (isset ( $_POST['public_health_training'] ) ) {$sql_extra[] = "public_health_training='Yes'"; $print[]="Public Health";}
if (isset ( $_POST['radiology_training'] ) ) {$sql_extra[] = "radiology_training='Yes'"; $print[]="Radiology";}
if (isset ( $_POST['surgery_training'] ) ) {$sql_extra[] = "surgery_training='Yes'"; $print[]="Surgery";}

//Previous Employment
if (isset ( $_POST['employed_provider'] ) ) {$sql_extra[] = "employed_provider='Yes'"; $print[]="Provider";}
if (isset ( $_POST['employed_payer'] ) ) {$sql_extra[] = "employed_payer='Yes'"; $print[]="Payer";}
if (isset ( $_POST['employed_health_analytics'] ) ) {$sql_extra[] = "employed_health_analytics='Yes'"; $print[]="Health Analytics";}
if (isset ( $_POST['employed_life_sciences'] ) ) {$sql_extra[] = "employed_life_sciences='Yes'"; $print[]="Life Sciences";}
if (isset ( $_POST['employed_medical_device'] ) ) {$sql_extra[] = "employed_medical_device='Yes'"; $print[]="Medical Device";}
if (isset ( $_POST['employed_government'] ) ) {$sql_extra[] = "employed_government='Yes'"; $print[]="Government";}
if (isset ( $_POST['employed_biotech'] ) ) {$sql_extra[] = "employed_biotech='Yes'"; $print[]="Biotech";}
if (isset ( $_POST['employed_health_it'] ) ) {$sql_extra[] = "employed_health_it='Yes'"; $print[]="Health IT";}
if (isset ( $_POST['employed_other'] ) ) {$sql_extra[] = "employed_other='Yes'"; $print[]="Other Employment";}

//Stakeholder Experience
 
if($_POST['expProvider'] !="" ) {
 $print[]="Filtered"; $varProviders = $_POST['expProvider'];

   if ($varProviders=="min"){
    $sql_extra[] = "(exp_providers='minimal experiences' OR exp_providers='some experiences' OR exp_providers='high level of experiences')";
 }
 if ($varProviders=="some"){
    $sql_extra[] = "(exp_providers='some experiences' OR exp_providers='high level of experiences')";
 }
 if ($varProviders=="high"){
    $sql_extra[] = "(exp_providers='high level of experiences')";
 }
}

if($_POST['expPharm'] !="") {
 $print[]="Filtered"; $varPharm = $_POST['expPharm'];

   if ($varPharm=="min"){
    $sql_extra[] = "(exp_pharm='minimal experiences' OR exp_pharm='some experiences' OR exp_pharm='high level of experiences')";
 }
 if ($varPharm=="some"){
    $sql_extra[] = "(exp_pharm='some experiences' OR exp_pharm='high level of experiences')";
 }
 if ($varPharm=="high"){
    $sql_extra[] = "(exp_pharm='high level of experiences')";
 }
}

if($_POST['expMedDev'] !="") {
 $print[]="Filtered"; $varMedDev = $_POST['expMedDev'];

   if ($varMedDev=="min"){
    $sql_extra[] = "(exp_medical_device='minimal experiences' OR exp_medical_device='some experiences' OR exp_medical_device='high level of experiences')";
 }
 if ($varMedDev=="some"){
    $sql_extra[] = "(exp_medical_device='some experiences' OR exp_medical_device='high level of experiences')";
 }
 if ($varMedDev=="high"){
    $sql_extra[] = "(exp_medical_device='high level of experiences')";
 }
}

if($_POST['expPrivatePayers'] !="") {
 $print[]="Filtered"; $varPrivatePayers = $_POST['expPrivatePayers'];

   if ($varPrivatePayers=="min"){
    $sql_extra[] = "(exp_private_payers='minimal experiences' OR exp_private_payers='some experiences' OR exp_private_payers='high level of experiences')";
 }
 if ($varPrivatePayers=="some"){
    $sql_extra[] = "(exp_private_payers='some experiences' OR exp_private_payers='high level of experiences')";
 }
 if ($varPrivatePayers=="high"){
    $sql_extra[] = "(exp_private_payers='high level of experiences')";
 }
}

if($_POST['expEmployers'] !="") {
 $print[]="Filtered"; $varPublicPayers = $_POST['expEmployers'];

   if ($varPublicPayers=="min"){
    $sql_extra[] = "(exp_public_payers='minimal experiences' OR exp_public_payers='some experiences' OR exp_public_payers='high level of experiences')";
 }
 if ($varPublicPayers=="some"){
    $sql_extra[] = "(exp_public_payers='some experiences' OR exp_public_payers='high level of experiences')";
 }
 if ($varPublicPayers=="high"){
    $sql_extra[] = "(exp_public_payers='high level of experiences')";
 }
}

if($_POST['expEmployers'] !="") {
 $print[]="Filtered"; $varMedEmp = $_POST['expEmployers'];

   if ($varMedEmp=="min"){
    $sql_extra[] = "(exp_medical_employers='minimal experiences' OR exp_medical_employers='some experiences' OR exp_medical_employers='high level of experiences')";
 }
 if ($varMedEmp=="some"){
    $sql_extra[] = "(exp_medical_employers='some experiences' OR exp_medical_employers='high level of experiences')";
 }
 if ($varMedEmp=="high"){
    $sql_extra[] = "(exp_medical_employers='high level of experiences')";
 }
}

if($_POST['expHIT'] !="") {
 $print[]="Filtered"; $varHIT = $_POST['expHIT'];

   if ($varHIT=="min"){
    $sql_extra[] = "(exp_health_info_tech='minimal experiences' OR exp_health_info_tech='some experiences' OR exp_health_info_tech='high level of experiences')";
 }
 if ($varHIT=="some"){
    $sql_extra[] = "(exp_health_info_tech='some experiences' OR exp_health_info_tech='high level of experiences')";
 }
 if ($varHIT="=high"){
    $sql_extra[] = "(exp_health_info_tech='high level of experiences')";
 }
}

if($_POST['expOther'] !="") {
 $print[]="Filtered"; $varOther = $_POST['expOther'];

   if ($varOther=="min"){
    $sql_extra[] = "(exp_level_other='minimal experiences' OR exp_level_other='some experiences' OR exp_level_other='high level of experiences')";
 }
 if ($varOther=="some"){
    $sql_extra[] = "(exp_level_other='some experiences' OR exp_level_other='high level of experiences')";
 }
 if ($varOther=="high"){
    $sql_extra[] = "(exp_level_other='high level of experiences')";
 }
}



//Watson Health Focus Areas
if($_POST['expOncology'] !="") {
 $print[]="Filtered"; $varOnc = $_POST['expOncology'];
   if ($varOnc=="min"){
    $sql_extra[] = "(exp_onc='minimal expertise' OR exp_onc='some expertise' OR exp_onc='high level of expertise' OR exp_onc='expert')";
 }
 if ($varOnc=="some"){
    $sql_extra[] = "(exp_onc='some expertise' OR exp_onc='high level of expertise' OR exp_onc='expert')";
 }
 if ($varOnc=="high"){
    $sql_extra[] = "(exp_onc='high level of expertise' OR exp_onc='expert')";
 }
 if ($varOnc=="expert"){
  $sql_extra[] = "(exp_onc='expert')";
 }
 }


if($_POST['expGenomics'] !="") {
 $print[]="Filtered"; $varGen = $_POST['expGenomics'];

   if ($varGen=="min"){
    $sql_extra[] = "(exp_genomics='minimal expertise' OR exp_genomics='some expertise' OR exp_genomics='high level of expertise' OR exp_genomics='expert')";
 }
 if ($varGen=="some"){
    $sql_extra[] = "(exp_genomics='some expertise' OR exp_genomics='high level of expertise' OR exp_genomics='expert')";
 }
 if ($varGen=="high"){
    $sql_extra[] = "(exp_genomics='high level of expertise' OR exp_genomics='expert')";
 }
 if ($varGen=="expert"){
  $sql_extra[] = "(exp_genomics='expert')";
 }
}

if($_POST['expClinicalTrials'] !="") {
 $print[]="Filtered"; $varCT = $_POST['expClinicalTrials'];

   if ($varCT=="min"){
    $sql_extra[] = "(exp_clinical_trials='minimal expertise' OR exp_clinical_trials='some expertise' OR exp_clinical_trials='high level of expertise' OR exp_clinical_trials='expert')";
 }
 if ($varCT=="some"){
    $sql_extra[] = "(exp_clinical_trials='some expertise' OR exp_clinical_trials='high level of expertise' OR exp_clinical_trials='expert')";
 }
 if ($varCT=="high"){
    $sql_extra[] = "(exp_clinical_trials='high level of expertise' OR exp_clinical_trials='expert')";
 }
 if ($varCT=="expert"){
  $sql_extra[] = "(exp_clinical_trials='expert')";
 }
}

if($_POST['expRadiology'] !="") {
 $print[]="Filtered"; $varRad = $_POST['expRadiology'];

   if ($varRad=="min"){
    $sql_extra[] = "(exp_radiology='minimal expertise' OR exp_radiology='some expertise' OR exp_radiology='high level of expertise' OR exp_radiology='expert')";
 }
 if ($varRad=="some"){
    $sql_extra[] = "(exp_radiology='some expertise' OR exp_radiology='high level of expertise' OR exp_radiology='expert')";
 }
 if ($varRad=="high"){
    $sql_extra[] = "(exp_radiology='high level of expertise' OR exp_radiology='expert')";
 }
 if ($varRad=="expert"){
  $sql_extra[] = "(exp_radiology='expert')";
 }
}

if($_POST['expHealthAndWellness'] !="") {
 $print[]="Filtered"; $varHAW = $_POST['expHealthAndWellness'];

   if ($varHAW=="min"){
    $sql_extra[] = "(exp_health_wellness='minimal expertise' OR exp_health_wellness='some expertise' OR exp_health_wellness='high level of expertise' OR exp_health_wellness='expert')";
 }
 if ($varHAW=="some"){
    $sql_extra[] = "(exp_health_wellness='some expertise' OR exp_health_wellness='high level of expertise' OR exp_health_wellness='expert')";
 }
 if ($varHAW=="high"){
    $sql_extra[] = "(exp_health_wellness='high level of expertise' OR exp_health_wellness='expert')";
 }
 if ($varHAW=="expert"){
  $sql_extra[] = "(exp_health_wellness='expert')";
 }
}

if($_POST['expCDM'] !="") {
 $print[]="Filtered"; $varCDM = $_POST['expCDM'];

   if ($varCDM=="min"){
    $sql_extra[] = "(exp_chronic_disease_management='minimal expertise' OR exp_chronic_disease_management='some expertise' OR exp_chronic_disease_management='high level of expertise' OR exp_chronic_disease_management='expert')";
 }
 if ($varCDM=="some"){
    $sql_extra[] = "(exp_chronic_disease_management='some expertise' OR exp_chronic_disease_management='high level of expertise' OR exp_chronic_disease_management='expert')";
 }
 if ($varCDM=="high"){
    $sql_extra[] = "(exp_chronic_disease_management='high level of expertise' OR exp_chronic_disease_management='expert')";
 }
 if ($varCDM=="expert"){
  $sql_extra[] = "(exp_chronic_disease_management='expert')";
 }
}

if($_POST['expPreventiveCare'] !="") {
 $print[]="Filtered"; $varPC = $_POST['expPreventiveCare'];

   if ($varPC=="min"){
    $sql_extra[] = "(exp_preventive_care='minimal expertise' OR exp_preventive_care='some expertise' OR exp_preventive_care='high level of expertise' OR exp_preventive_care='expert')";
 }
 if ($varPC=="some"){
    $sql_extra[] = "(exp_preventive_care='some expertise' OR exp_preventive_care='high level of expertise' OR exp_preventive_care='expert')";
 }
 if ($varPC=="high"){
    $sql_extra[] = "(exp_preventive_care='high level of expertise' OR exp_preventive_care='expert')";
 }
 if ($varPC=="expert"){
  $sql_extra[] = "(exp_preventive_care='expert')";
 }
}

if($_POST['expPopulationHealth'] !="") {
 $print[]="Filtered"; $varPop = $_POST['expPopulationHealth'];

   if ($varPop=="min"){
        $sql_extra[] = "(exp_population_health='minimal expertise' OR exp_population_health='some expertise' OR exp_population_health='high level of expertise' OR exp_population_health='expert')";
 }
 if ($varPop=="some"){
    $sql_extra[] = "(exp_population_health='some expertise' OR exp_population_health='high level of expertise' OR exp_population_health='expert')";
 }
 if ($varPop=="high"){
    $sql_extra[] = "(exp_population_health='high level of expertise' OR exp_population_health='expert')";
 }
 if ($varPop=="expert"){
  $sql_extra[] = "(exp_population_health='expert')";
 }
}

if($_POST['expSocial'] !="") {
 $print[]="Filtered"; $varSocial = $_POST['expSocial'];

   if ($varSocial=="min"){
    $sql_extra[] = "(exp_social_welfare='minimal expertise' OR exp_social_welfare='some expertise' OR exp_social_welfare='high level of expertise' OR exp_social_welfare='expert')";
 }
 if ($varSocial=="some"){
    $sql_extra[] = "(exp_social_welfare='some expertise' OR exp_social_welfare='high level of expertise' OR exp_social_welfare='expert')";
 }
 if ($varSocial=="high"){
    $sql_extra[] = "(exp_social_welfare='high level of expertise' OR exp_social_welfare='expert')";
 }
 if ($varSocial=="expert"){
  $sql_extra[] = "(exp_social_welfare='expert')";
 }
}

if($_POST['expLifeSciences'] !="") {
 $print[]="Filtered"; $varLife = $_POST['expLifeSciences'];

   if ($varLife=="min"){
    $sql_extra[] = "(exp_life_sciences='minimal expertise' OR exp_life_sciences='some expertise' OR exp_life_sciences='high level of expertise' OR exp_life_sciences='expert')";
 }
 if ($varLife=="some"){
    $sql_extra[] = "(exp_life_sciences='some expertise' OR exp_life_sciences='high level of expertise' OR exp_life_sciences='expert')";
 }
 if ($varLife=="high"){
    $sql_extra[] = "(exp_life_sciences='high level of expertise' OR exp_life_sciences='expert')";
 }
 if ($varLife=="expert"){
  $sql_extra[] = "(exp_life_sciences='expert')";
 }
}

if($_POST['expValueBasedCare'] !="") {
 $print[]="Filtered"; $varVBC = $_POST['expValueBasedCare'];

   if ($varVBC=="min"){
    $sql_extra[] = "(exp_value_based_care='minimal expertise' OR exp_value_based_care='some expertise' OR exp_value_based_care='high level of expertise' OR exp_value_based_care='expert')";
 }
 if ($varVBC=="some"){
    $sql_extra[] = "(exp_value_based_care='some expertise' OR exp_value_based_care='high level of expertise' OR exp_value_based_care='expert')";
 }
 if ($varVBC=="high"){
    $sql_extra[] = "(exp_value_based_care='high level of expertise' OR exp_value_based_care='expert')";
 }
 if ($varVBC=="expert"){
  $sql_extra[] = "(exp_value_based_care='expert')";
 }
}


//Therapeutic Areas
if($_POST['expHeartDisease'] !="") {
 $print[]="Filtered"; $varHD = $_POST['expHeartDisease'];

   if ($varHD=="min"){
    $sql_extra[] = "(exp_heart_disease='minimal expertise' OR exp_heart_disease='some expertise' OR exp_heart_disease='high level of expertise' OR exp_heart_disease='expert')";
 }
 if ($varHD=="some"){
    $sql_extra[] = "(exp_heart_disease='some expertise' OR exp_heart_disease='high level of expertise' OR exp_heart_disease='expert')";
 }
 if ($varHD=="high"){
    $sql_extra[] = "(exp_heart_disease='high level of expertise' OR exp_heart_disease='expert')";
 }
 if ($varHD=="expert"){
  $sql_extra[] = "(exp_heart_disease='expert')";
 }
}

if($_POST['expDiabetes'] !="") {
 $print[]="Filtered"; $varDiabetes = $_POST['expDiabetes'];

   if ($varDiabetes=="min"){
    $sql_extra[] = "(exp_diabetes='minimal expertise' OR exp_diabetes='some expertise' OR exp_diabetes='high level of expertise' OR exp_diabetes='expert')";
 }
 if ($varDiabetes=="some"){
    $sql_extra[] = "(exp_diabetes='some expertise' OR exp_diabetes='high level of expertise' OR exp_diabetes='expert')";
 }
 if ($varDiabetes=="high"){
    $sql_extra[] = "(exp_diabetes='high level of expertise' OR exp_diabetes='expert')";
 }
 if ($varDiabetes=="expert"){
  $sql_extra[] = "(exp_diabetes='expert')";
 }
}

if($_POST['expArthritis'] !="") {
 $print[]="Filtered"; $varArthritis = $_POST['expArthritis'];

   if ($varArthritis=="min"){
    $sql_extra[] = "(exp_arthritis='minimal expertise' OR exp_arthritis='some expertise' OR exp_arthritis='high level of expertise' OR exp_arthritis='expert')";
 }
 if ($varArthritis=="some"){
    $sql_extra[] = "(exp_arthritis='some expertise' OR exp_arthritis='high level of expertise' OR exp_arthritis='expert')";
 }
 if ($varArthritis=="high"){
    $sql_extra[] = "(exp_arthritis='high level of expertise' OR exp_arthritis='expert')";
 }
 if ($varArthritis=="expert"){
  $sql_extra[] = "(exp_arthritis='expert')";
 }
}

if($_POST['expAsthma'] !="") {
 $print[]="Filtered"; $varAsthma = $_POST['expAsthma'];

   if ($varAsthma=="min"){
    $sql_extra[] = "(exp_asthma_copd='minimal expertise' OR exp_asthma_copd='some expertise' OR exp_asthma_copd='high level of expertise' OR exp_asthma_copd='expert')";
 }
 if ($varAsthma=="some"){
    $sql_extra[] = "(exp_asthma_copd='some expertise' OR exp_asthma_copd='high level of expertise' OR exp_asthma_copd='expert')";
 }
 if ($varAsthma=="high"){
    $sql_extra[] = "(exp_asthma_copd='high level of expertise' OR exp_asthma_copd='expert')";
 }
 if ($varAsthma=="expert"){
  $sql_extra[] = "(exp_asthma_copd='expert')";
 }
}

if($_POST['expCancer'] !="") {
 $print[]="Filtered"; $varCancer = $_POST['expCancer'];

   if ($varCancer=="min"){
    $sql_extra[] = "(exp_cancer='minimal expertise' OR exp_cancer='some expertise' OR exp_cancer='high level of expertise' OR exp_cancer='expert')";
 }
 if ($varCancer=="some"){
    $sql_extra[] = "(exp_cancer='some expertise' OR exp_cancer='high level of expertise' OR exp_cancer='expert')";
 }
 if ($varCancer=="high"){
    $sql_extra[] = "(exp_cancer='high level of expertise' OR exp_cancer='expert')";
 }
 if ($varCancer=="expert"){
  $sql_extra[] = "(exp_cancer='expert')";
 }
}

if($_POST['expMentalHealth'] !="") {
 $print[]="Filtered"; $varMentalHealth = $_POST['expMentalHealth'];

   if ($varMentalHealth=="min"){
    $sql_extra[] = "(exp_mental_health='minimal expertise' OR exp_mental_health='some expertise' OR exp_mental_health='high level of expertise' OR exp_mental_health='expert')";
 }
 if ($varMentalHealth=="some"){
    $sql_extra[] = "(exp_mental_health='some expertise' OR exp_mental_health='high level of expertise' OR exp_mental_health='expert')";
 }
 if ($varMentalHealth=="high"){
    $sql_extra[] = "(exp_mental_health='high level of expertise' OR exp_mental_health='expert')";
 }
 if ($varMentalHealth=="expert"){
  $sql_extra[] = "(exp_mental_health='expert')";
 }
}

if($_POST['expOther2'] !="") {
 $print[]="Filtered"; $varOther2 = $_POST['expOther2'];

   if ($varOther2=="min"){
    $sql_extra[] = "(exp_level_other_2='minimal expertise' OR exp_level_other_2='some expertise' OR exp_level_other_2='high level of expertise' OR exp_level_other_2='expert')";
 }
 if ($varOther2=="some"){
    $sql_extra[] = "(exp_level_other_2='some expertise' OR exp_level_other_2='high level of expertise' OR exp_level_other_2='expert')";
 }
 if ($varOther2=="high"){
    $sql_extra[] = "(exp_level_other_2='high level of expertise' OR exp_level_other_2='expert')";
 }
 if ($varOther2=="expert"){
  $sql_extra[] = "(exp_level_other_2='expert')";
 }
}


//Region Experience
if($_POST['expUS'] !="") {
 $print[]="Filtered"; $varUS = $_POST['expUS'];

   if ($varUS=="min"){
    $sql_extra[] = "(exp_us_canada='minimal experiences' OR exp_us_canada='some experiences' OR exp_us_canada='high level of experiences')";
 }
 if ($varUS=="some"){
    $sql_extra[] = "(exp_us_canada='some experiences' OR exp_us_canada='high level of experiences')";
 }
 if ($varUS=="high"){
    $sql_extra[] = "(exp_us_canada='high level of experiences')";
 }
}

if($_POST['expLA'] !="") {
 $print[]="Filtered"; $varLA = $_POST['expLA'];

   if ($varLA=="min"){
    $sql_extra[] = "(exp_latin_america='minimal experiences' OR exp_latin_america='some experiences' OR exp_latin_america='high level of experiences')";
 }
 if ($varLA=="some"){
    $sql_extra[] = "(exp_latin_america='some experiences' OR exp_latin_america='high level of experiences')";
 }
 if ($varLA=="high"){
    $sql_extra[] = "(exp_latin_america='high level of experiences')";
 }
}

if($_POST['expEurope'] !="") {
 $print[]="Filtered"; $varEurope = $_POST['expEurope'];

   if ($varEurope=="min"){
    $sql_extra[] = "(exp_europe='minimal experiences' OR exp_europe='some experiences' OR exp_europe='high level of experiences')";
 }
 if ($varEurope=="some"){
    $sql_extra[] = "(exp_europe='some experiences' OR exp_europe='high level of experiences')";
 }
 if ($varEurope=="high"){
    $sql_extra[] = "(exp_europe='high level of experiences')";
 }
}

if($_POST['expME'] !="") {
 $print[]="Filtered"; $varME = $_POST['expME'];

   if ($varME=="min"){
    $sql_extra[] = "(exp_middle_east_africa='minimal experiences' OR exp_middle_east_africa='some experiences' OR exp_middle_east_africa='high level of experiences')";
 }
 if ($varME=="some"){
    $sql_extra[] = "(exp_middle_east_africa='some experiences' OR exp_middle_east_africa='high level of experiences')";
 }
 if ($varME=="high"){
    $sql_extra[] = "(exp_middle_east_africa='high level of experiences')";
 }
}

if($_POST['expAsia'] !="") {
 $print[]="Filtered"; $varAsia = $_POST['expAsia'];

   if ($varAsia=="min"){
    $sql_extra[] = "(exp_asia_pacific='minimal experiences' OR exp_asia_pacific='some experiences' OR exp_asia_pacific='high level of experiences')";
 }
 if ($varAsia=="some"){
    $sql_extra[] = "(exp_asia_pacific='some experiences' OR exp_asia_pacific='high level of experiences')";
 }
 if ($varAsia=="high"){
    $sql_extra[] = "(exp_asia_pacific='high level of experiences')";
 }
}
// Now, create the SQL string (or at least, the "WHERE" part of it.  We "implode" the array into a string, using the string " OR " to concatenate it with.
$display = implode(", ", $print);
$sql_where = implode ( " AND ", $sql_extra );
$sql = $sql_base . $sql_where.' ORDER BY name';
$search_result = filterTable($sql);

    
}
 				else {
    				$query = "SELECT * FROM persons ORDER BY name";
    				$search_result = filterTable($query);
    				$display="";
				}

				function filterTable($query)
				{
				$mysql_hostname = "us-cdbr-iron-east-04.cleardb.net";
				$mysql_user     = "bf0fbe99b3665b";
				$mysql_password = "bf7f29f2";
				$mysql_database = "ad_63dc1eebbb2aed2";
    			$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
    			$filter_Result = mysqli_query($connect, $query);
    			return $filter_Result;
				}

				
				?>
				<form action="index.php" method="post">
				</br>
				
				<Strong>Click on a professional to reveal more information about him/her. Bolded fields indicates an expert level in that specific area.</Strong><br>
				<input style="width: 91%; height:30px" type="text" name="valueToSearch" placeholder="Search by name, email, niche experience, and organization roles.">
            	<input style="position: absolute; right: 15px; width: 100px; height:30px" type="submit" name="search" value="Filter"><br>
            	<button type="button" onclick="filter()">Show Filter Options</button> 
            	<?php if (isset ($_POST['search'])){ echo"<button type='button' onclick='unfilter()'>Reset Filters</button>";}?>
            	<?php
            	if($display!="") {
            		echo "Displaying filtered results.";
            	} else {echo "Displaying entire database.";}
            	?>
            	<table id="filter1" style="display:none">
            	<tr>
              <td style="border-right: solid 1px gray" width="20%" valign="top">
              <center><u>Health Services Delivered</u><br> </center>
              <input type="checkbox" name="delivered_outpatient" value="delivered_outpatient" <?php if(isset($_POST['delivered_outpatient'])) echo "checked='checked'"; ?>>Outpatient or Clinic<br>
              <input type="checkbox" name="delivered_inpatient" value="delivered_inpatient" <?php if(isset($_POST['delivered_inpatient'])) echo "checked='checked'"; ?>>Inpatient or Hospital <br>
              <input type="checkbox" name="delivered_emergency_room" value="delivered_emergency_room" <?php if(isset($_POST['delivered_emergency_room'])) echo "checked='checked'"; ?>>Emergency Room <br>
              <input type="checkbox" name="delivered_retail_clinic" value="delivered_retail_clinic" <?php if(isset($_POST['delivered_retail_clinic'])) echo "checked='checked'"; ?>>Retail Clinic <br>
              <input type="checkbox" name="delivered_telehealth" value="delivered_telehealth" <?php if(isset($_POST['delivered_telehealth'])) echo "checked='checked'"; ?>>Telehealth <br>
              <input type="checkbox" name="delivered_occupational" value="delivered_occupational" <?php if(isset($_POST['delivered_occupational'])) echo "checked='checked'"; ?>>Occupational Health Clinic <br>
              </td>
              <td style="padding:10px; border-right:solid 1px grey;" width="20%" valign="top">
              <center><u>Degrees</u><br></center>
              <input type="checkbox" name="physician_degree" value="physician_degree" <?php if(isset($_POST['physician_degree'])) echo "checked='checked'"; ?>>Physician <br>
              <input type="checkbox" name="np_degree" value="np_degree" <?php if(isset($_POST['np_degree'])) echo "checked='checked'"; ?>>Nurse Practitioner  <br>
              <input type="checkbox" name="pa_degree" value="pa_degree" <?php if(isset($_POST['pa_degree'])) echo "checked='checked'"; ?>>Physician Assistant  <br>
              <input type="checkbox" name="nurse_degree" value="nurse_degree" <?php if(isset($_POST['nurse_degree'])) echo "checked='checked'"; ?>>Nurse <br>
              <input type="checkbox" name="dds_degree" value="dds_degree" <?php if(isset($_POST['dds_degree'])) echo "checked='checked'"; ?>>Dentist <br>
              <input type="checkbox" name="pharmd_degree" value="pharmd_degree" <?php if(isset($_POST['pharmd_degree'])) echo "checked='checked'"; ?>>Pharmacist <br>
              <input type="checkbox" name="rd_degree" value="rd_degree" <?php if(isset($_POST['rd_degree'])) echo "checked='checked'"; ?>>Dietitian or Nutritionist <br>
              <input type="checkbox" name="mph_degree" value="mph_degree" <?php if(isset($_POST['mph_degree'])) echo "checked='checked'"; ?>>Master in Public Health or Administration <br>
              <input type="checkbox" name="pt_degree" value="pt_degree" <?php if(isset($_POST['pt_degree'])) echo "checked='checked'"; ?>>Physical/Occupational Therapist <br>
              <input type="checkbox" name="respiratory_degree" value="respiratory_degree" <?php if(isset($_POST['respiratory_degree'])) echo "checked='checked'"; ?>>Respiratory Therapist <br>
              <input type="checkbox" name="social_care_degree" value="social_care_degree" <?php if(isset($_POST['social_care_degree'])) echo "checked='checked'"; ?>>Social Care Worker <br>
              </td>
              <td style="padding:10px; border-right:solid 1px grey; text-align:center;" width="40%" valign="top">

              <center><u>Post-Degree Training</u><br></center>
              <table>
              <tr>
              <td valign="top">
	              <input type="checkbox" name="anes_training" value="anes_training" <?php if(isset($_POST['anes_training'])) echo "checked='checked'"; ?>>Anesthesiology <br>
	              <input type="checkbox" name="cardiology_training" value="cardiology_training" <?php if(isset($_POST['cardiology_training'])) echo "checked='checked'"; ?>>Cardiology <br>
	              <input type="checkbox" name="chronic_disease_training" value="chronic_disease_training" <?php if(isset($_POST['chronic_disease_training'])) echo "checked='checked'"; ?>>Chronic Disease Management <br>
	              <input type="checkbox" name="dental_training" value="dental_training" <?php if(isset($_POST['dental_training'])) echo "checked='checked'"; ?>>Dental <br>
	              <input type="checkbox" name="emergency_medicine_training" value="emergency_medicine_training" <?php if(isset($_POST['emergency_medicine_training'])) echo "checked='checked'"; ?>>Emergency Medicine  <br>
	              <input type="checkbox" name="family_medicine_training" value="family_medicine_training" <?php if(isset($_POST['family_medicine_training'])) echo "checked='checked'"; ?>>Family Medicine  <br>
	              <input type="checkbox" name="gastro_training" value="gastro_training" <?php if(isset($_POST['gastro_training'])) echo "checked='checked'"; ?>>Gastroenterology <br>
	              <input type="checkbox" name="genetics_training" value="genetics_training" <?php if(isset($_POST['genetics_training'])) echo "checked='checked'"; ?>>Genetics <br>
	              <input type="checkbox" name="gyne_training" value="gyne_training" <?php if(isset($_POST['gyne_training'])) echo "checked='checked'"; ?>>Gynecology  <br>
	              <input type="checkbox" name="hema_training" value="hema_training" <?php if(isset($_POST['hema_training'])) echo "checked='checked'"; ?>>Hematology <br>
	              <input type="checkbox" name="infectious_disease_training" value="infectious_disease_training" <?php if(isset($_POST['infectious_disease_training'])) echo "checked='checked'"; ?>>Infectious Disease  <br>
	          </td>
	          <td valign="top">    
	              <input type="checkbox" name="internal_medicine_training" value="internal_medicine_training" <?php if(isset($_POST['internal_medicine_training'])) echo "checked='checked'"; ?>>Internal Medicine <br>
	              <input type="checkbox" name="neurology_training" value="neurology_training" <?php if(isset($_POST['neurology_training'])) echo "checked='checked'"; ?>>Neurology  <br>
	              <input type="checkbox" name="nursing_training" value="nursing_training" <?php if(isset($_POST['nursing_training'])) echo "checked='checked'"; ?>>Nursing <br>
	              <input type="checkbox" name="nutrition_training" value="nutrition_training" <?php if(isset($_POST['nutrition_training'])) echo "checked='checked'"; ?>>Nutrition  <br>
	              <input type="checkbox" name="obstetrics_training" value="obstetrics_training" <?php if(isset($_POST['obstetrics_training'])) echo "checked='checked'"; ?>>Obstetrics <br>
	              <input type="checkbox" name="occupational_medicine_training" value="occupational_medicine_training" <?php if(isset($_POST['occupational_medicine_training'])) echo "checked='checked'"; ?>>Occupational Medicine  <br>
	              <input type="checkbox" name="oncology_training" value="oncology_training" <?php if(isset($_POST['oncology_training'])) echo "checked='checked'"; ?>>Oncology  <br>
	              <input type="checkbox" name="optha_training" value="optha_training" <?php if(isset($_POST['optha_training'])) echo "checked='checked'"; ?>>Ophthalmology <br>
	              <input type="checkbox" name="pediatrics_training" value="pediatrics_training" <?php if(isset($_POST['pediatrics_training'])) echo "checked='checked'"; ?>>Pediatrics <br>
	              <input type="checkbox" name="pharm_training" value="pharm_training" <?php if(isset($_POST['pharm_training'])) echo "checked='checked'"; ?>>Pharmacy <br>
	              <input type="checkbox" name="preventive_medicine_training" value="preventive_medicine_training" <?php if(isset($_POST['preventive_medicine_training'])) echo "checked='checked'"; ?>>Preventive Medicine <br>
	          </td>
	          <td valign="top">
	              <input type="checkbox" name="psych_training" value="psych_training" <?php if(isset($_POST['psych_training'])) echo "checked='checked'"; ?>>Psychiatry  <br>
	              <input type="checkbox" name="public_health_training" value="public_health_training" <?php if(isset($_POST['public_health_training'])) echo "checked='checked'"; ?>>Public Health <br>
	              <input type="checkbox" name="radiology_training" value="radiology_training" <?php if(isset($_POST['radiology_training'])) echo "checked='checked'"; ?>>Radiology  <br>
	              <input type="checkbox" name="surgery_training" value="surgery_training" <?php if(isset($_POST['surgery_training'])) echo "checked='checked'"; ?>>Surgery  <br>
	              </td>
	              </tr>
	           </table>

              </td>
              <td style="padding:10px; "width="20%" valign="top">
              <center><u>Previous Employment Areas</u><br></center>
              <input type="checkbox" name="employed_provider" value="employed_provider" <?php if(isset($_POST['employed_provider'])) echo "checked='checked'"; ?>>Provider <br>
              <input type="checkbox" name="employed_payer" value="employed_payer" <?php if(isset($_POST['employed_payer'])) echo "checked='checked'"; ?>>Payer <br>
              <input type="checkbox" name="employed_health_analytics" value="employed_health_analytics" <?php if(isset($_POST['employed_health_analytics'])) echo "checked='checked'"; ?>>Health Analytics  <br>
              <input type="checkbox" name="employed_life_sciences" value="employed_life_sciences" <?php if(isset($_POST['employed_life_sciences'])) echo "checked='checked'"; ?>>Life Sciences  <br>
              <input type="checkbox" name="employed_medical_device" value="employed_medical_device" <?php if(isset($_POST['employed_medical_device'])) echo "checked='checked'"; ?>>Medical Device <br>
              <input type="checkbox" name="employed_government" value="employed_government" <?php if(isset($_POST['employed_government'])) echo "checked='checked'"; ?>>Government  <br>
              <input type="checkbox" name="employed_biotech" value="employed_biotech" <?php if(isset($_POST['employed_biotech'])) echo "checked='checked'"; ?>>Biotech  <br>
              <input type="checkbox" name="employed_health_it" value="employed_health_it" <?php if(isset($_POST['employed_health_it'])) echo "checked='checked'"; ?>>Health IT<br> 
              <input type="checkbox" name="employed_other" value="employed_other" <?php if(isset($_POST['employed_other'])) echo "checked='checked'"; ?>>Other <br>
              </td>
              </tr>
              </table>
              <br><br>
              <table id="filter2" style="display:none">
            	<tr>
            	<td width="25%" valign="top">
            	<center><u>Stakeholder Customer Experience</u><br></center>
            	At least <select name="expProvider">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expProvider']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expProvider']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expProvider']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with providers.<br>

				At least <select name="expPharm">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expPharm']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expPharm']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expPharm']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with pharmaceutical / biotechnology.<br>

				At least <select name="expMedDev">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expMedDev']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expMedDev']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expMedDev']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with medical devices.<br>

				At least <select name="expPrivatePayers">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expPrivatePayers']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expPrivatePayers']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expPrivatePayers']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with private payers.<br>

				At least <select name="expPublicPayers">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expPublicPayers']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expPublicPayers']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expPublicPayers']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with public payers.<br>

				At least <select name="expEmployers">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expEmployers']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expEmployers']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expEmployers']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with employers.<br>

				At least <select name="expHIT">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expHIT']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expHIT']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expHIT']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with health information technology.<br>

				At least <select name="expOther">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expOther']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expOther']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expOther']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience with something else.<br>
				</td>




				<td width="29%" valign='top'>
				<center><u>Watson Health Focus Areas Expertise</u><br></center>
				At least <select name="expOncology">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expOncology']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expOncology']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expOncology']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expOncology']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with oncology.<br>

				At least <select name="expGenomics">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expGenomics']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expGenomics']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expGenomics']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expGenomics']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with genomics.<br>

				At least <select name="expClinicalTrials">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expClinicalTrials']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expClinicalTrials']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expClinicalTrials']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expClinicalTrials']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with clinical trials.<br>

				At least <select name="expRadiology">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expRadiology']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expRadiology']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expRadiology']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expRadiology']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with radiology.<br>

				At least <select name="expHealthAndWellness">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expHealthAndWellness']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expHealthAndWellness']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expHealthAndWellness']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expHealthAndWellness']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with health and wellness.<br>

				At least <select name="expCDM">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expCDM']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expCDM']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expCDM']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expCDM']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with chronic disease management.<br>

				At least <select name="expPreventiveCare">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expPreventiveCare']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expPreventiveCare']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expPreventiveCare']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expPreventiveCare']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with preventive care.<br>

				At least <select name="expPopulationHealth">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expPopulationHealth']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expPopulationHealth']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expPopulationHealth']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expPopulationHealth']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with population health.<br>

				At least <select name="expSocial">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expSocial']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expSocial']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expSocial']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expSocial']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with social and welfare programs.<br>

				At least <select name="expLifeSciences">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expLifeSciences']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expLifeSciences']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expLifeSciences']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expLifeSciences']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with life sciences and real world evidence.<br>

				At least <select name="expValueBasedCare">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expValueBasedCare']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expValueBasedCare']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expValueBasedCare']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expValueBasedCare']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with value-based care.<br>
				</td>




				<td valign='top'>
				<center><u>Therapeutic Areas Expertise</u><br></center>
				At least <select name="expHeartDisease">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expHeartDisease']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expHeartDisease']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expHeartDisease']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expHeartDisease']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with heart disease.<br>

				At least <select name="expDiabetes">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expDiabetes']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expDiabetes']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expDiabetes']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expDiabetes']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with diabetes.<br>

				At least <select name="expArthritis">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expArthritis']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expArthritis']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expArthritis']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expArthritis']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with arthritis.<br>

				At least <select name="expAsthma">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expAsthma']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expAsthma']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expAsthma']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expAsthma']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with asthma/COPD.<br>

				At least <select name="expCancer">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expCancer']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expCancer']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expCancer']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expCancer']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with cancer.<br>

				At least <select name="expMentalHealth">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expMentalHealth']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expMentalHealth']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expMentalHealth']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expMentalHealth']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with mental health.<br>

				At least <select name="expOther2">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expOther2']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expOther2']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expOther2']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				  <option value="expert" <?php if (isset ($_POST['search'])&&$_POST['expOther2']=='expert') {echo "selected='selected'"; }?>>an expert level of</option>
				</select>
				expertise with something else.<br>
				</td>

				<td valign="top">
				<center><u>Region Experience</u><br></center>
            	At least <select name="expUS">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expUS']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expUS']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expUS']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience in the United States and Canada.<br>

				At least <select name="expLA">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expLA']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expLA']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expLA']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience in Latin America.<br>

				At least <select name="expEurope">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expEurope']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expEurope']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expEurope']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience in Europe.<br>

				At least <select name="expME">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expME']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expME']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expME']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience in the Middle East/Africa.<br>

				At least <select name="expAsia">
				  <option value="">Select...</option>
				  <option value="min" <?php if (isset ($_POST['search'])&&$_POST['expAsia']=='min') {echo "selected='selected'"; }?>>minimal</option>
				  <option vlaue="some"<?php if (isset ($_POST['search'])&&$_POST['expAsia']=='some') {echo "selected='selected'"; }?>>some</option>
				  <option value="high"<?php if (isset ($_POST['search'])&&$_POST['expAsia']=='high') {echo "selected='selected'"; }?>>a high level of</option>
				</select>
				experience in Pacific Asia.<br>

				</td>
				</tr>
				</table>

				<table id="theTable" class="table table-striped">
                <thead class="thead-default">
                <tr align="center">
                    <th class="my-table-center">Name</th>
                    <th class="my-table-center">Health Services Delivered</th>
                    <th class="my-table-center">Degrees</th>
                    <th class="my-table-center">Post Degree Training</th>
                    <th class="my-table-center">Previous Employment</th>
                    <th class="my-table-center">Stakeholders Exeperienced With</th>
                    <th class="my-table-center">Expertise in Watson Health Focus Areas</th>
                    <th class="my-table-center">Expertise in Therapeutic Areas</th>
                    <th class="my-table-center">Regions with Experience</th>
                </tr>
                </thead>
            	<?php
					//Make Table Here//
                	while($row = mysqli_fetch_array($search_result)): 
                ?>
                <tr class="shownextrow">
                    <td style="vertical-align: center;"><?php //name
                    echo $row['name'];?></td>
                    
                    <td>
                    <ul>
                    <?php 
                    //Health Services Delivered
                    if($row['delivered_outpatient']=="Yes"){echo '<li>Outpatient or Clinic</li>';}
                    if($row['delivered_inpatient']=="Yes"){echo '<li>Inpatient or Hospital</li>';}
                    if($row['delivered_emergency_room']=="Yes"){echo '<li>Emergency Room</li>';}
                    if($row['delivered_retail_clinic']=="Yes"){echo '<li>Retail Clinic</li>';}
                    if($row['delivered_telehealth']=="Yes"){echo '<li>Telehealth</li>';}
                    if($row['delivered_occupational']=="Yes"){echo '<li>Occupational Health Clinic</li>';}
                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Degrees
                    if($row['physician_degree']=="Yes"){echo '<li>Physician (MD, DO)</li>';}
                    if($row['np_degree']=="Yes"){echo '<li>Nurse Practitioner</li>';}
                    if($row['pa_degree']=="Yes"){echo '<li>Physician Assistant (PA)</li>';}
                    if($row['nurse_degree']=="Yes"){echo '<li>Nurse</li>';}
                    if($row['dds_degree']=="Yes"){echo '<li>Dentist (DDS)</li>';}
                    if($row['pharmd_degree']=="Yes"){echo '<li>Pharmaceutical Degree (PharmD)</li>';}
                    if($row['rd_degree']=="Yes"){echo '<li>Dietition or Nutritionist (RD)</li>';}
                    if($row['mph_degree']=="Yes"){echo '<li>Master in Public Health or Administration (MPH or MPA)</li>';}
                    if($row['pt_degree']=="Yes"){echo '<li>Physical/Occupational Therapist (PT/OT)</li>';}
                    if($row['respiratory_degree']=="Yes"){echo '<li>Despiratory Therapist</li>';}
                    if($row['social_care_degree']=="Yes"){echo '<li>Social Care Worker</li>';}
                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Post Degree Training
                    if($row['anes_training']=="Yes"){echo '<li>Anesthesiology</li>';}
                    if($row['cardiology_training']=="Yes"){echo '<li>Cardiology</li>';}
                    if($row['chronic_disease_training']=="Yes"){echo '<li>Chronic Disease Management</li>';}
                    if($row['dental_training']=="Yes"){echo '<li>Dental</li>';}
                    if($row['emergency_medicine_training']=="Yes"){echo '<li>Emergency Medicine</li>';}
                    if($row['family_medicine_training']=="Yes"){echo '<li>Family Medicine</li>';}
                    if($row['gastro_training']=="Yes"){echo '<li>Gastroenterology</li>';}
                    if($row['genetics_training']=="Yes"){echo '<li>Genetics</li>';}
                    if($row['gyne_training']=="Yes"){echo '<li>Gynecology</li>';}
                    if($row['hema_training']=="Yes"){echo '<li>Hematology</li>';}
                    if($row['infectious_disease_training']=="Yes"){echo '<li>Infectious Disease</li>';}
                    if($row['internal_medicine_training']=="Yes"){echo '<li>Internal Medicine</li>';}
                    if($row['neurology_training']=="Yes"){echo '<li>Neurology</li>';}
                    if($row['nursing_training']=="Yes"){echo '<li>Nursing</li>';}
                    if($row['nutrition_training']=="Yes"){echo '<li>Nutrition</li>';}
                    if($row['obstetrics_training']=="Yes"){echo '<li>Obstetrics</li>';}
                    if($row['occupational_medicine_training']=="Yes"){echo '<li>Occupational Medicine</li>';}
                    if($row['oncology_training']=="Yes"){echo '<li>Oncology</li>';}
                    if($row['optha_training']=="Yes"){echo '<li>Ophthalmology</li>';}
                    if($row['pediatrics_training']=="Yes"){echo '<li>Pediatrics</li>';}
                    if($row['pharm_training']=="Yes"){echo '<li>Pharmacy</li>';}
                    if($row['preventive_medicine_training']=="Yes"){echo '<li>Preventive Medicine</li>';}
                    if($row['psych_training']=="Yes"){echo '<li>Psychiatry</li>';}
                    if($row['public_health_training']=="Yes"){echo '<li>Public Health</li>';}
                    if($row['radiology_training']=="Yes"){echo '<li>Radiology</li>';}
                    if($row['surgery_training']=="Yes"){echo '<li>Surgery</li>';}

                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Previous Employment
                    if($row['employed_provider']=="Yes"){echo '<li>Provider</li>';}
                    if($row['employed_payer']=="Yes"){echo '<li>Payer</li>';}
                    if($row['employed_health_analytics']=="Yes"){echo '<li>Health Analytics</li>';}
                    if($row['employed_life_sciences']=="Yes"){echo '<li>Life Sciences</li>';}
                    if($row['employed_medical_device']=="Yes"){echo '<li>Medical Device</li>';}
                    if($row['employed_government']=="Yes"){echo '<li>Government</li>';}
                    if($row['employed_biotech']=="Yes"){echo '<li>Biotech</li>';}
                    if($row['employed_health_it']=="Yes"){echo '<li>Health IT</li>';}
                    if($row['employed_other']!="Not applicable"){echo '<li>'.$row['employed_other'].'</li>';}
                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Stakeholders Exeperienced With
                    
                    if($row['exp_providers']=="high level of experiences" || $row['exp_providers']=="some experiences"){echo '<li>Providers</li>'; }else {echo '<li>Providers</li>';}
                    if($row['exp_pharm']=="high level of experiences" || $row['exp_pharm']=="some experiences"){echo '<li>Pharmaceutical / Biotechnology</li>';}
                    if($row['exp_medical_device']=="high level of experiences" || $row['exp_medical_device']=="some experiences"){echo '<li>Medical Device</li>';}
                    if($row['exp_private_payers']=="high level of experiences" || $row['exp_private_payers']=="some experiences"){echo '<li>Private Payers</li>';}
                    if($row['exp_public_payers']=="high level of experiences" || $row['exp_public_payers']=="some experiences"){echo '<li>Public Payers</li>';}
                    if($row['exp_medical_employers']=="high level of experiences" || $row['exp_medical_employers']=="some experiences"){echo '<li>Medical Employers</li>';}
                    if($row['exp_health_info_tech']=="high level of experiences" || $row['exp_health_info_tech']=="some experiences"){echo '<li>Health Information Technology</li>';}
                    if($row['exp_level_other']!="Not applicable" && $row['exp_level_other']=="high level of experiences" || $row['exp_level_other']=="some experiences"){echo '<li>'.$row['exp_with_other'].'</li>';}

                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Expertise in Watson Health Focus Areas
                    if($row['exp_onc']=="expert"){
                    	echo "<strong><li>Oncology</strong></li>";
                    } elseif ($row['exp_onc']=="high level of expertise" || $row['exp_onc']=="some expertise"){echo '<li>Oncology</li>';}
                    if($row['exp_genomics']=="expert"){
                    	echo "<strong><li>Genomics</strong></li>";
                    } elseif ($row['exp_genomics']=="high level of expertise" || $row['exp_genomics']=="some expertise"){echo '<li>Genomics</li>';}
                    if($row['exp_clinical_trials']=="expert"){
                    	echo "<strong><li>Clinical Trials</strong></li>";
                    } elseif ($row['exp_clinical_trials']=="high level of expertise" || $row['exp_clinical_trials']=="some expertise"){echo '<li>Clinical Trials</li>';}
                    if($row['exp_radiology']=="expert"){
                    	echo "<strong><li>Radiology</strong></li>";
                    } elseif ($row['exp_radiology']=="high level of expertise" || $row['exp_radiology']=="some expertise"){echo '<li>Radiology</li>';}
                    if($row['exp_health_wellness']=="expert"){
                    	echo "<strong><li>Health and Wellness</strong></li>";
                    } elseif ($row['exp_health_wellness']=="high level of expertise"){echo '<li>Health and Wellness</li>';}
                    if($row['exp_chronic_disease_management']=="expert"){
                    	echo "<strong><li>Chronic Disease Management</strong></li>";
                    } elseif ($row['exp_chronic_disease_management']=="high level of expertise"){echo '<li>Chronic Disease Management</li>';}
                    if($row['exp_preventive_care']=="expert"){
                    	echo "<strong><li>Preventive Care</strong></li>";
                    } elseif ($row['exp_preventive_care']=="high level of expertise"){echo '<li>Preventive Care</li>';}
                    if($row['exp_population_health']=="expert"){
                    	echo "<strong><li>Population Health</strong></li>";
                    } elseif ($row['exp_population_health']=="high level of expertise" || $row['exp_population_health']=="some expertise"){echo '<li>Population Health</li>';}
                    if($row['exp_social_welfare']=="expert"){
                    	echo "<strong><li>Social and Welfare Programs</strong></li>";
                    } elseif ($row['exp_social_welfare']=="high level of expertise" || $row['exp_social_welfare']=="some expertise"){echo '<li>Social and Welfare Programs</li>';}
                    if($row['exp_life_sciences']=="expert"){
                    	echo "<strong><li>Life Sciences Real World Evidence</strong></li>";
                    } elseif ($row['exp_life_sciences']=="high level of expertise" || $row['exp_life_sciences']=="some expertise"){echo '<li>Life Science Real World Evidence</li>';}
                     if($row['exp_value_based_care']=="expert"){
                    	echo "<strong><li>Value Based Care</strong></li>";
                    } elseif ($row['exp_value_based_care']=="high level of expertise" || $row['exp_value_based_care']=="some expertise"){echo '<li>Value Based Care</li>';}




                    
                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Expertise in Therapeutic
                   if($row['exp_heart_disease']=="expert"){
                    	echo "<strong><li>Heart Disease</strong></li>";
                    } elseif ($row['exp_heart_disease']=="high level of expertise"){echo '<li>Heart Disease</li>';}
                   if($row['exp_diabetes']=="expert"){
                    	echo "<strong><li>Diabetes</strong></li>";
                    } elseif ($row['exp_diabetes']=="high level of expertise"){echo '<li>Diabetes</li>';}
                    if($row['exp_arthritis']=="expert"){
                    	echo "<strong><li>Arthritis</strong></li>";
                    } elseif ($row['exp_arthritis']=="high level of expertise" || $row['exp_arthritis']=="some expertise"){echo '<li>Arthritis</li>';}
                    if($row['exp_asthma_copd']=="expert"){
                    	echo "<strong><li>Asthma/COPD</strong></li>";
                    } elseif ($row['exp_asthma_copd']=="high level of expertise" || $row['exp_asthma_copd']=="some expertise"){echo '<li>Asthma/COPD</li>';}
                    if($row['exp_cancer']=="expert"){
                    	echo "<strong><li>Cancer</strong></li>";
                    } elseif ($row['exp_cancer']=="high level of expertise" || $row['exp_cancer']=="some expertise"){echo '<li>Cancer</li>';}
                    if($row['exp_mental_health']=="expert"){
                    	echo "<strong><li>Mental Health</strong></li>";
                    } elseif ($row['exp_mental_health']=="high level of expertise" || $row['exp_mental_health']=="some expertise"){echo '<li>Mental Health</li>';}
                    if($row['exp_with_other_2']!="Not applicable" && $row['exp_level_other_2']=="expert")
                    {echo "<strong><li>".$row["exp_with_other_2"]."</strong></li>";} elseif ($row['exp_level_other_2']=="high level of expertise" || $row['exp_level_other_2']=="some expertise"){echo '<li>'.$row["exp_with_other_2"].'</li>';}

                     ?>
                     </ul>
                    </td>

                    <td>
                    <ul>
                    <?php 
                    //Experienced in Regions
                    //Stakeholders Exeperienced With
                    if($row['exp_us_canada']=="high level of experiences" || $row['exp_us_canada']=="some experiences" || $row['exp_us_canada']=="minimal experiences"){echo '<li>United States and Canada</li>';}
                    if($row['exp_latin_america']=="high level of experiences" || $row['exp_latin_america']=="some experiences" || $row['exp_latin_america']=="minimal experiences"){echo '<li>Latin America</li>';}
                    if($row['exp_europe']=="high level of experiences" || $row['exp_europe']=="some experiences" || $row['exp_europe']=="minimal experiences"){echo '<li>Europe</li>';}
                    if($row['exp_middle_east_africa']=="high level of experiences" || $row['exp_middle_east_africa']=="some experiences" || $row['exp_middle_east_africa']=="minimal experiences"){echo '<li>Middle East/Africa</li>';}
                    if($row['exp_asia_pacific']=="high level of experiences" || $row['exp_asia_pacific']=="some experiences" || $row['exp_asia_pacific']=="minimal experiences"){echo '<li>Pacific Asia</li>';}
                     ?>
                     </ul>
                    </td>
                </tr>
                <tr style="display:none" class="extra-rows">
                <td colspan="9">
                	<table width="100%">
                	<tr>
	                	<td style="padding-bottom:10px;" colspan="3" class="my-table-center">
		                	<font size="6">
		                	<?php

		                	echo $row['name'].'</br>';
		                	echo '</font><font size="1">';
		                	echo '<a href =https://faces.tap.ibm.com/bluepages/profile.html?email='.$row['email'].'>Bluepages Profile</a><br>';
		                	echo '<a href="mailto:'.$row['email'].'"target="_top">email: '.$row['email'].'</a><br>';
		                	?>
		                	</font>
	                	</td>
                	</tr>
                	<tr>
                		<td width="33%" valign="top">
                		<font size="3">
                			<?php
                				//List if currently licensed to practice
                				if($row['licensed'] == 'Yes') {echo "Currently licensed to practice.<br><br>";}
                				//List previous employment organzations and roles
                				if($row['employed_org_1']!='Not applicable' && $row['employed_role_1']!='Not applicable')
                				{
                					echo "Previously employed at:<ul>";
                					echo "<li>".$row['employed_org_1'].' as a '.strtolower($row['employed_role_1'])."</li>";
                				}
                				if($row['employed_org_2']!='Not applicable' && $row['employed_role_2']!='Not applicable')
                				{
                					echo "<li>".$row['employed_org_2'].' as a '.strtolower($row['employed_role_2'])."</li>";
                				}
                				if($row['employed_org_3']!='Not applicable' && $row['employed_role_3']!='Not applicable')
                				{
                					echo "<li>".$row['employed_org_3'].' as a '.strtolower($row['employed_role_3'])."</li>";
                				}
                				if($row['employed_org_1']!='Not applicable' && $row['employed_role_1']!='Not applicable')
                				{
                				echo "</ul><br>";
                				}

                				//List if author and if so what their focus areas were
                				if($row['author']=='Yes')
                				{
                					echo "Abstracts and/or publications author.";
                				}
                				if($row['focus_area_1']!="Not applicable")
                				{
                					echo " Focused in:<br><ul><li>".$row['focus_area_1'].'</li>';
                				}
                				if($row['focus_area_2']!="Not applicable")
                				{
                					echo "<li>".$row['focus_area_2'].'</li>';
                				}
                				if($row['focus_area_3']!="Not applicable")
                				{
                					echo "<li>".$row['focus_area_3'].'</li>';
                				}
                				if($row['focus_area_1']!="Not applicable")
                				{
                					echo "</ul><br><br>";
                				}
                			?>
                			</font>
                		</td>
                		<td class="my-table-center" style="padding-left:10px;border-top:1px solid gray;" width="33%" valign="top">
                		<font size="3">
                		<?php
                			if($row['role_outpatient']=='Yes'||$row['role_inpatient']='Yes'||$row['role_emergency_room']=='Yes'||$row['role_retail_clinic']=='Yes'||$row['role_telehealth']=='Yes'||$row['role_occupational_health']=='Yes'||$row['role_pharm']=='Yes'|$row['role_other']!='Not applicable')
                			{
                				echo "Administration/Operational Roles Held In:<ul>";
                				if($row['role_outpatient']=='Yes')
                				{
                					echo "<li>Outpatient or Clinic</li>";
                				}
                				if($row['role_inpatient']=='Yes')
                				{
                					echo "<li>Inpatient or Hospital</li>";
                				}
                				if($row['role_emergency_room']=='Yes')
                				{
                					echo "<li>Emergency Room</li>";
                				}
                				if($row['role_retail_clinic']=='Yes')
                				{
                					echo "<li>Retail Clinic</li>";
                				}
                				if($row['role_telehealth']=='Yes')
                				{
                					echo "<li>Telehealth</li>";
                				}
                				if($row['role_occupational_health']=='Yes')
                				{
                					echo "<li>Occupational Health Clinic</li>";
                				}
                				if($row['role_pharm']=='Yes')
                				{
                					echo "<li>Pharmacy</li>";
                				}
                				if($row['role_other']!='Not applicable')
                				{
                					echo "<li>".$row['role_other']."</li>";
                				}
                				echo "</ul><br>";
                			}
                		?>
                		</font>
                		</td>
                		<td style="padding-left:10px;" width="33%" valign="top" class="my-table-right">
                		<font size="3">
                			<?php
                				if($row['health_anal_org_1']!='Not applicable'||$row['health_anal_org_2']='Not applicable'||$row['health_anal_org_3']='Not applicable')
                				{
                					echo "Previous Health Analytics/Informatics Roles At:<ul>";
                				if($row['health_anal_org_1']!='Not applicable')
                				{
                					echo "<li>".$row['health_anal_org_1'];
                					if($row['health_anal_role_1']!='Not applicable')
                					{
                						echo " as a ".strtolower($row['health_anal_role_1']);
                					}
                					echo"</li>";
                				}
                				if($row['health_anal_org_2']!='Not applicable')
                				{
                					echo "<li>".$row['health_anal_org_2'];
                					if($row['health_anal_role_2']!='Not applicable')
                					{
                						echo " as a ".strtolower($row['health_anal_role_2']);
                					}
                					echo"</li>";
                				}
                				if($row['health_anal_org_3']!='Not applicable')
                				{
                					echo "<li>".$row['health_anal_org_3'];
                					if($row['health_anal_role_3']!='Not applicable')
                					{
                						echo " as a ".strtolower($row['health_anal_role_3']);
                					}
                					echo"</li>";
                				}
                				echo "</ul><br>";
                				}

		                		if($row['health_info_org_1']!='Not applicable'||$row['health_info_org_2']='Not applicable'||$row['health_info_org_3']='Not applicable')
		                        {
		                          echo "Previous Health Information Technology Roles At:<ul>";
		                        if($row['health_info_org_1']!='Not applicable')
		                        {
		                          echo "<li>".$row['health_info_org_1'];
		                          if($row['health_info_role_1']!='Not applicable')
		                          {
		                            echo " as a ".strtolower($row['health_info_role_1']);
		                          }
		                          echo"</li>";
		                        }
		                        if($row['health_info_org_2']!='Not applicable')
		                        {
		                          echo "<li>".$row['health_info_org_2'];
		                          if($row['health_info_role_2']!='Not applicable')
		                          {
		                            echo " as a ".strtolower($row['health_info_role_2']);
		                          }
		                          echo"</li>";
		                        }
		                        if($row['health_info_org_3']!='Not applicable')
		                        {
		                          echo "<li>".$row['health_info_org_3'];
		                          if($row['health_info_role_3']!='Not applicable')
		                          {
		                            echo " as a ".strtolower($row['health_info_role_3']);
		                          }
		                          echo"</li>";
		                        }
		                        echo "</ul><br>";
		                        }

                			?>
                			
                		</font>
                		</td>
                	</tr>
                	</table>

                </td>
                </tr>
                <?php endwhile;?>
            	</table>

		</div>
	<!--</div>-->
</div>


<!-- minifed jQuery -->
		<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
   <script type="text/javascript">  
        jQuery(function($) {
  
   $('#theTable').delegate("tr.shownextrow", "click", function() {
    if($(this).closest("tr").next("tr").is(":hidden")) {
    $(this).closest("tr").next("tr").show();
                } else
    $(this).closest("tr").next("tr").hide();

  });
  
});



    </script>     
    <script type="text/javascript">
    function filter() {
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
