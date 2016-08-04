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
<font size="3">
<form action="submit.php" method="post">
<div class="container">
    <center><h1>New HCP Survey</h1></center>
    Please answer every question.<br><br>
    <table class="submitTable">
    <tr>
    <td width="100px">Full Name:</td><td width="auto"><input style="width:80%; height:30px" type="text" name="name" placeholder="(e.g. John Doe)"><td>
    </tr>
    <tr>
    <td width="100px">Email: </td><td width="auto"><input style="width:80%; height:30px" type="text" name="email" placeholder="(e.g. john.doe@us.ibm.com)"></td>
    </tr>
    </table>
    <br>
    <p>The World Health Organization defines “health/healthcare professionals as people who study, advise on and/or provide preventive, curative, rehabilitative, and promotional health services based on an extensive body of theoretical and factual knowledge in diagnosis and treatment of disease and other health problems.  The knowledge and skills required are usually obtained as a result of study at a higher educational institution in a health-related field for a period of 3-6 years leading to the award of a first degree or higher qualification.”

    This survey is for health/healthcare professionals, who have “accomplished these studies in preventive, curative, rehabilitative, and/or promotional health services.”
    <br><br>
    1.  Would you consider yourself a health/healthcare professional as defined above? 
    <select name="considers_self_hcp">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
    </select>
    <br><br>
    2. Have you delivered “health services” directly to individuals? 
    <select id="2" name="delivered_health_solutions" onclick="show21()">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
    </select>
    <div style="display:none" id="21">
    2.1. In what type of setting did you deliver "health services"? (Select all that apply)<br>
        <input type="checkbox" name="delivered_outpatient" value="delivered_outpatient">Outpatient or Clinic<br>
        <input type="checkbox" name="delivered_inpatient" value="delivered_inpatient">Inpatient or Hospital <br>
        <input type="checkbox" name="delivered_emergency_room" value="delivered_emergency_room">Emergency Room <br>
        <input type="checkbox" name="delivered_retail_clinic" value="delivered_retail_clinic">Retail Clinic <br>
        <input type="checkbox" name="delivered_telehealth" value="delivered_telehealth">Telehealth <br>
        <input type="checkbox" name="delivered_occupational" value="delivered_occupational">Occupational Health Clinic<br><br>
    </div>
    3A. What type of health/healthcare professional <strong>degree(s)</strong> do you have? Select all that apply.<br>
        <input type="checkbox" name="physician_degree" value="physician_degree">Physician <br>
        <input type="checkbox" name="np_degree" value="np_degree">Nurse Practitioner  <br>
        <input type="checkbox" name="pa_degree" value="pa_degree">Physician Assistant  <br>
        <input type="checkbox" name="nurse_degree" value="nurse_degree">Nurse <br>
        <input type="checkbox" name="dds_degree" value="dds_degree">Dentist <br>
        <input type="checkbox" name="pharmd_degree" value="pharmd_degree">Pharmacist <br>
        <input type="checkbox" name="rd_degree" value="rd_degree">Dietitian or Nutritionist <br>
        <input type="checkbox" name="mph_degree" value="mph_degree">Master in Public Health or Administration <br>
        <input type="checkbox" name="pt_degree" value="pt_degree">Physical/Occupational Therapist <br>
        <input type="checkbox" name="respiratory_degree" value="respiratory_degree">Respiratory Therapist <br>
        <input type="checkbox" name="social_care_degree" value="social_care_degree">Social Care Worker <br><br>  
    3B. What type of health/healthcare professional <strong>practice/post-degreee training</strong> do you have? Select all that apply.<br>
        <input type="checkbox" name="anes_training" value="anes_training">Anesthesiology <br>
        <input type="checkbox" name="cardiology_training" value="cardiology_training">Cardiology <br>
        <input type="checkbox" name="chronic_disease_training" value="chronic_disease_training">Chronic Disease Management <br>
        <input type="checkbox" name="dental_training" value="dental_training">Dental <br>
        <input type="checkbox" name="emergency_medicine_training" value="emergency_medicine_training">Emergency Medicine  <br>
        <input type="checkbox" name="family_medicine_training" value="family_medicine_training">Family Medicine  <br>
        <input type="checkbox" name="gastro_training" value="gastro_training">Gastroenterology <br>
        <input type="checkbox" name="genetics_training" value="genetics_training">Genetics <br>
        <input type="checkbox" name="gyne_training" value="gyne_training">Gynecology  <br>
        <input type="checkbox" name="hema_training" value="hema_training">Hematology <br>
        <input type="checkbox" name="infectious_disease_training" value="infectious_disease_training">Infectious Disease  <br>
        <input type="checkbox" name="internal_medicine_training" value="internal_medicine_training">Internal Medicine <br>
        <input type="checkbox" name="neurology_training" value="neurology_training">Neurology  <br>
        <input type="checkbox" name="nursing_training" value="nursing_training">Nursing <br>
        <input type="checkbox" name="nutrition_training" value="nutrition_training">Nutrition  <br>
        <input type="checkbox" name="obstetrics_training" value="obstetrics_training">Obstetrics <br>
        <input type="checkbox" name="occupational_medicine_training" value="occupational_medicine_training">Occupational Medicine  <br>
        <input type="checkbox" name="oncology_training" value="oncology_training">Oncology  <br>
        <input type="checkbox" name="optha_training" value="optha_training">Ophthalmology <br>
        <input type="checkbox" name="pediatrics_training" value="pediatrics_training">Pediatrics <br>
        <input type="checkbox" name="pharm_training" value="pharm_training">Pharmacy <br>
        <input type="checkbox" name="preventive_medicine_training" value="preventive_medicine_training">Preventive Medicine <br>
        <input type="checkbox" name="psych_training" value="psych_training">Psychiatry  <br>
        <input type="checkbox" name="public_health_training" value="public_health_training">Public Health <br>
        <input type="checkbox" name="radiology_training" value="radiology_training">Radiology  <br>
        <input type="checkbox" name="surgery_training" value="surgery_training">Surgery  <br><br>
    4.  Are you currently licensed in your field to practice or deliver care?
    <select name="licensed">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
    </select>
    (Select "No" if not applicable)
    <br><br>

    5. Have you been employed by any of the following types of organizations? <br>
        <input type="checkbox" id="employed_provider" onclick="show51();" value="employed_provider">Provider <br>
        <input type="checkbox" onclick="show51();" id="employed_payer" value="employed_payer">Payer <br>
        <input type="checkbox" onclick="show51();" id="employed_health_analytics" value="employed_health_analytics">Health Analytics  <br>
        <input type="checkbox" onclick="show51();" id="employed_life_sciences" value="employed_life_sciences">Life Sciences  <br>
        <input type="checkbox" onclick="show51();" id="employed_medical_device" value="employed_medical_device">Medical Device <br>
        <input type="checkbox" onclick="show51();" id="employed_government" value="employed_government">Government  <br>
        <input type="checkbox" onclick="show51();" id="employed_biotech" value="employed_biotech">Biotech  <br>
        <input type="checkbox" onclick="show51();" id="employed_health_it" value="employed_health_it">Health IT<br> 
        <input type="checkbox" onclick="show51();" id="checkOther1" value="employed_other_checkbox">Other: <input onclick="checkOther();"style="width:40%; height:25px" type="text" name="employed_other" placeholder=""><br><br>

    <div style="display:none" id="51">

    5.1. Optional: Based on your response to question 5 above, please list up to 3 organizations and/or roles.<br><br>
        1.
         <input style="width:40%; height:40px" type="text" name="employed_org_1" placeholder="Organization Name">
         <input style="width:40%; height:40px" type="text" name="employed_role_1" placeholder="Organization Role"><br><br>
        2.
         <input style="width:40%; height:40px" type="text" name="employed_org_2" placeholder="Organization Name">
         <input style="width:40%; height:40px" type="text" name="employed_role_2" placeholder="Organization Role"><br><br>
        3.
         <input style="width:40%; height:40px" type="text" name="employed_org_3" placeholder="Organization Name">
         <input style="width:40%; height:40px" type="text" name="employed_role_3" placeholder="Organization Role"><br><br>
    </div>

    6. Please rate your experiences in having the following healthcare stakeholder as a customer you have provided solutions/services to. <br>
    a. Providers (e.g., hospitals, clinics, healthcare systems)
    <select name="exp_providers">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>     
    b. Pharmaceutical / Biotechnology
    <select name="exp_pharm">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>
    c. Medical Device
    <select name="exp_medical_device">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>
    d. Private Payers (e.g., health insurance companies)
    <select name="exp_private_payers">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>  
    e. Public Payers (e.g., government)
    <select name="exp_public_payers">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>
    f. Employers – Health & Benefits
    <select name="exp_medical_employers">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>
    g. Health Information Technology (e.g., EMR, digital health)
    <select name="exp_health_info_tech">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences"experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br> 
    h. Other (please explain)
    <select name="exp_level_other">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">a high level of</option>
    </select>
    with <input style="width:40%; height:25px" type="text" name="exp_with_other" placeholder=""><br><br>

    7. Please rate your experiences working in the following geographies. <br>
    a. United States and Canada    
    <select name="exp_us_canada">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br> 
    b. Latin America   
    <select name="exp_latin_america">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>      
    c. Europe  
    <select name="exp_europe">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>        
    d. Middle East, Africa  
    <select name="exp_middle_east_africa">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br>       
    e. Pacific Asia
    <select name="exp_asia_pacific">
    <option value="no experience">no experience</option>
    <option value="minimal experiences">minimal experiences</option>
    <option vlaue="some experiences">some experiences</option>
    <option value="high level of experiences">high level of experiences</option>
    </select><br> <br>

    8. In what location/setting did you hold “operations/administrative” roles? <br>
        <input type="checkbox" id="role_outpatient" onclick="show51();" value="role_outpatient">Outpatient or Clinic <br>
        <input type="checkbox" onclick="show51();" id="role_outpatient" value="role_inpatient">Inpatient or Hospital <br>
        <input type="checkbox" onclick="show51();" id="role_emergency_room" value="role_emergency_room">Emergency Room  <br>
        <input type="checkbox" onclick="show51();" id="role_retail_clinic" value="role_retail_clinic">Retail Clinic <br>
        <input type="checkbox" onclick="show51();" id="role_telehealth" value="role_telehealth">Telehealth  <br>
        <input type="checkbox" onclick="show51();" id="role_occupational_health" value="role_occupational_health">Occupational Health  <br>
        <input type="checkbox" onclick="show51();" id="role_pharm" value="role_pharm">Pharmacy<br> 
        <input type="checkbox" onclick="show51();" id="checkOther2" value="employed_other_checkbox">Other: <input style="width:40%; height:25px" onclick="roleOther();" type="text" name="role_other" placeholder=""><br><br>

    9. Please list up to 3 organizations and/or roles you have experience in <strong>health analytics/informatics</strong>. Leave blank if no experience. <br>
    1.
     <input style="width:40%; height:40px" type="text" name="health_anal_org_1" placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_anal_role_1" placeholder="Organization Role"><br><br>
    2.
     <input style="width:40%; height:40px" type="text" name="health_anal_org_2" placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_anal_role_2" placeholder="Organization Role"><br><br>
    3.
     <input style="width:40%; height:40px" type="text" name="health_anal_org_3" placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_anal_role_3" placeholder="Organization Role"><br><br>

    10. Please list up to 3 organizations and/or roles you have experience with <strong>health information technology</strong>. <br>
    1.
     <input style="width:40%; height:40px" type="text" name="health_info_org_1" placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_info_role_1" placeholder="Organization Role"><br><br>
    2.
     <input style="width:40%; height:40px" type="text" name="health_info_org_2" placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_info_role_2" placeholder="Organization Role"><br><br>
    3.
     <input style="width:40%; height:40px" type="text" name="health_info_org_3" placeholder="Organization Name">
     <input style="width:40%; height:40px" type="text" name="health_info_role_3" placeholder="Organization Role"><br><br>

    11. Please rate your experience in the following Watson Health focus areas. <br>
    a. Oncology    
    <select name="exp_onc">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>          
    b. Genomics  
    <select name="exp_genomics">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>            
    c. Clinical Trials
    <select name="exp_clinical_trials">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>             
    d. Radiology  
    <select name="exp_radiology">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>           
    e. Health and Wellness     
    <select name="exp_health_wellness">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>        
    f. Chronic Disease Management    
    <select name="exp_chronic_disease_management">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>          
    g. Preventive Care (e.g., vaccinations, cancer screenings)   
    <select name="exp_preventive_care">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>          
    h. Population Health  
    <select name="exp_population_health">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>           
    i. Social and Welfare Programs/Social Determinants of Health
    <select name="exp_social_welfare">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>             
    j. Life Sciences Real World Evidence   
    <select name="exp_life_sciences">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>          
    k. Value-Based Care
    <select name="exp_value_based_care">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>  <br> 

    12. Please rate your market experience in the following therapeutic areas. <br>
    a. Heart Disease   
    <select name="exp_heart_disease">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>                 
    b. Diabetes         
    <select name="exp_diabetes">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>            
    c. Arthritis      
    <select name="exp_arthritis">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>              
    d. Asthma/COPD  
    <select name="exp_asthma_copd">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>                  
    e. Cancer   
    <select name="exp_cancer">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>                  
    f. Mental Health    
    <select name="exp_mental_health">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select><br>                
    g. Other (please explain)
    <select name="exp_level_other_2">
    <option value="no expertise">no expertise</option>
    <option value="minimal expertise">minimal expertise</option>
    <option vlaue="some expertise">some expertise</option>
    <option value="high level of expertise">high level of expertise</option>
    <option value="expert">expert</option>
    </select>
    with <input style="width:40%; height:25px" type="text" name="exp_with_other_2" placeholder=""><br><br>

    13. Are you an author on any peer-reviewed abstracts and/or publications?
    <select id="author" onclick="show131();" name="author">
          <option value="No">No</option>
          <option value="Yes">Yes</option>
    </select><br>

    <div style="display:none;" id='131'>
    13.1. Please list top 3 focus areas of research. <br>
    1.<input style="width:40%; height:40px" type="text" name="focus_area_1" placeholder=""><br><br>
    2.<input style="width:40%; height:40px" type="text" name="focus_area_2" placeholder=""><br><br>
    3. <input style="width:40%; height:40px" type="text" name="focus_area_3" placeholder=""><br><br>

    </div>
    <input type="checkbox" id="showSubmit" onclick="checkSubmit();" value="showSubmit">By clicking here you ackowledge that the answers you have submitted on this survey will be displayed for public visibility on the HCP List for people to see and contact you. You further agree that you have answered each question to the best of your ability and that in order to remove or change any information an administrator must be contacted.  <br>
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
<!-- minifed jQuery -->
<script type="text/javascript" src="js/jquery-3.1.0.min.js"></script>
<script type="text/javascript">
    function show21() {
    var e = document.getElementById("2");
    var strUser = e.options[e.selectedIndex].value;
    if (strUser == "Yes"){
    document.getElementById("21").style.display="inline";
    } else {
    document.getElementById("21").style.display="none";
    }
    }

    function show51() {
      if (document.getElementById("employed_provider").checked == true || document.getElementById("employed_payer").checked == true || document.getElementById("employed_health_analytics").checked == true || document.getElementById("employed_life_sciences").checked == true || document.getElementById("employed_medical_device").checked == true || document.getElementById("employed_government").checked == true || document.getElementById("employed_biotech").checked == true || document.getElementById("employed_health_it").checked == true || document.getElementById("checkOther1").checked == true) {
        document.getElementById("51").style.display="inline";
      } else {
        document.getElementById("51").style.display="none";
      }
    }

    function checkOther() {
      document.getElementById("checkOther1").checked = true;
    }

    function roleOther() {
      document.getElementById("checkOther2").checked = true;
    }

    function show131() {
      if (document.getElementById("author").value == 'Yes')
      {
        document.getElementById('131').style.display="inline";
      } else
      {
        document.getElementById('131').style.display="none";
      }
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