<?php

session_start();
	if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
	header ("Location: login.php");
	}
// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
$date = date('m_j_Y');
header('Content-Disposition: attachment; filename=HCP_export_'.$date.'.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('name', 'email', 'considers_self_hcp', 'delivered_health_solutions', 'delivered_outpatient', 'delivered_inpatient', 'delivered_emergency_room', 'delivered_retail_clinic', 'delivered_telehealth', 'delivered_occupational', 'physician_degree', 'np_degree', 'pa_degree', 'nurse_degree', 'dds_degree', 'pharmd_degree', 'rd_degree', 'mph_degree', 'pt_degree', 'respiratory_degree', 'social_care_degree', 'anes_training', 'cardiology_training', 'chronic_disease_training', 'dental_training', 'emergency_medicine_training', 'family_medicine_training', 'gastro_training', 'genetics_training', 'gyne_training', 'hema_training', 'infectious_disease_training', 'internal_medicine_training', 'neurology_training', 'nursing_training', 'nutrition_training', 'obstetrics_training', 'occupational_medicine_training', 'oncology_training', 'optha_training', 'pediatrics_training', 'pharm_training', 'preventive_medicine_training', 'psych_training', 'public_health_training', 'radiology_training', 'surgery_training', 'licensed', 'employed_provider', 'employed_payer', 'employed_health_analytics', 'employed_life_sciences', 'employed_medical_device', 'employed_government', 'employed_biotech', 'employed_health_it', 'employed_other', 'employed_org_1', 'employed_role_1', 'employed_org_2', 'employed_role_2', 'employed_org_3', 'employed_role_3', 'exp_providers', 'exp_pharm', 'exp_medical_device', 'exp_private_payers', 'exp_public_payers', 'exp_medical_employers', 'exp_health_info_tech', 'exp_level_other', 'exp_with_other', 'exp_us_canada', 'exp_latin_america', 'exp_europe', 'exp_middle_east_africa', 'exp_asia_pacific', 'role_outpatient', 'role_inpatient', 'role_emergency_room', 'role_retail_clinic', 'role_telehealth', 'role_occupational_health', 'role_pharm', 'role_other', 'health_anal_org_1', 'health_anal_role_1', 'health_anal_org_2', 'health_anal_role_2', 'health_anal_org_3', 'health_anal_role_3', 'health_info_org_1', 'health_info_role_1', 'health_info_org_2', 'health_info_role_2', 'health_info_org_3', 'health_info_role_3', 'exp_onc', 'exp_genomics', 'exp_clinical_trials', 'exp_radiology', 'exp_health_wellness', 'exp_chronic_disease_management', 'exp_preventive_care', 'exp_population_health', 'exp_social_welfare', 'exp_life_sciences', 'exp_value_based_care', 'exp_heart_disease', 'exp_diabetes', 'exp_arthritis', 'exp_asthma_copd', 'exp_cancer', 'exp_mental_health', 'exp_level_other_2', 'exp_with_other_2', 'author', 'focus_area_1', 'focus_area_2', 'focus_area_3'));

// fetch the data
include "connection.php";
$query = "SELECT * FROM persons";
$rows = mysqli_query($connect, $query);

// loop over the rows, outputting them
while ($row = mysqli_fetch_assoc($rows)) fputcsv($output, $row);

?>