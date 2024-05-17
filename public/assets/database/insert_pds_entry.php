<?php
include 'sql_statements.php';
include 'insert_functions.php';
include 'validate_functions.php';
include 'image-upload.php';

// insertion of employee details
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$suffix_id = $_POST['suffix'];
$bdate = $_POST['bdate'];
$birthplace = $_POST['birthplace'];
$sex = $_POST['sex'];
$civil_status_id = $_POST['civil-status'];

$height = $_POST['height'];
$weight = $_POST['weight'];
$blood_type_id = $_POST['blood-type'];

$gsis_id = $_POST['gsis-id'];
$pagibig_id = $_POST['pagibig-id'];
$philhealth_id = $_POST['philhealth-id'];
$sss_id = $_POST['sss-id'];
$tin_id = $_POST['tin-id'];
$agency_no = $_POST['agency-no'];

$citizenship = $_POST['nationality'];
$citizenship_method = $_POST['citizenship-category'];
$country_id = $_POST['citizenship-country'];

$tel_no = $_POST['tel-no'];
$mobile_no = $_POST['mobile-no'];
$email = $_POST['email'];

// echo $permanent_entry_id;

$query = "INSERT INTO employee (last_name, first_name, middle_name, suffix_id, birthdate, birthplace, sex, civil_status_id, height, weight, blood_type_id, gsis_no, pagibig_no, philhealth_no, sss_no, tin_no, agency_emp_no, citizenship, citizenship_method, country_id, telephone_no, mobile_no, email) VALUES ('$lastname', '$firstname', '$middlename', '$suffix_id', '$bdate', '$birthplace', '$sex', '$civil_status_id', '$height', '$weight', '$blood_type_id', '$gsis_id', '$pagibig_id', '$philhealth_id', '$sss_id', '$tin_id', '$agency_no', '$citizenship', '$citizenship_method', '$country_id', '$tel_no', '$mobile_no', '$email')";

// employee id
$employee_id = insert_update_delete($query);

$residential_address = [
    'emp_id' => $employee_id,
    'house' => $_POST['res-house-no'],
    'street' => $_POST['res-street'],
    'village' => $_POST['res-village'],
    'brgy_id' => $_POST['res-brgy'],
    'municipality_id' => $_POST['res-municipality'],
    'province_id' => $_POST['res-province'],
    'zip' => $_POST['res-zip']
];

echo $residential_address['emp_id'];

$permanent_address = [
    'emp_id' => $employee_id,
    'house' => $_POST['permanent-house-no'],
    'street' => $_POST['permanent-street'],
    'village' => $_POST['permanent-village'],
    'brgy_id' => $_POST['permanent-brgy'],
    'municipality_id' => $_POST['permanent-municipality'],
    'province_id' => $_POST['permanent-province'],
    'zip' => $_POST['permanent-zip'],
];

$res_entry_id = insert_address('residential_address', $residential_address);

$permanent_entry_id = insert_address('permanent_address', $permanent_address);

// insertion of family background

// spouse details
$spouse_fname = empty($_POST['spouse-firstname']) ? 'N/A' : $_POST['spouse-firstname'];
$spouse_mname = empty($_POST['spouse-middlename']) ? 'N/A' : $_POST['spouse-middlename'];
$spouse_lname = empty($_POST['spouse-surname']) ? 'N/A' : $_POST['spouse-surname'];
$spouse_suffix = $_POST['spouse-suffix'];

// spouse occupation details
$spouse_occupation = empty($_POST['spouse-occupation']) ? 'N/A' : $_POST['spouse-occupation'];
$spouse_business = empty($_POST['spouse-business']) ? 'N/A' : $_POST['spouse-business'];
$spouse_business_addr = empty($_POST['business-addr']) ? 'N/A' : $_POST['business-addr'];
$spouse_telno = empty($_POST['spouse-telno']) ? 'N/A' : $_POST['spouse-telno'];

// father details
$father_fname = empty($_POST['father-firstname']) ? 'N/A' : $_POST['father-firstname'];
$father_mname = empty($_POST['father-middlename']) ? 'N/A' : $_POST['father-middlename'];
$father_lname = empty($_POST['father-surname']) ? 'N/A' : $_POST['father-surname'];
$father_suffix = empty($_POST['father-suffix']) ? 'N/A' : $_POST['father-suffix'];

// mother details
$mother_fname = empty($_POST['mother-firstname']) ? 'N/A' : $_POST['mother-firstname'];
$mother_mname = empty($_POST['mother-middlename']) ? 'N/A' : $_POST['mother-middlename'];
$mother_lname = empty($_POST['mother-surname']) ? 'N/A' : $_POST['mother-surname'];

$fam_bg_sql = "INSERT INTO family_background (emp_id, spouse_lname, spouse_fname, spouse_mname, spouse_suffix, spouse_occupation, spouse_business, spouse_business_address, tel_no, father_lname, father_fname, father_mname, father_suffix, mother_lname, mother_fname, mother_mname) VALUES ('$employee_id', '$spouse_lname', '$spouse_fname', '$spouse_mname', '$spouse_suffix', '$spouse_occupation', '$spouse_business', '$spouse_business_addr', '$spouse_telno', '$father_lname', '$father_fname', '$father_mname', '$father_suffix', '$mother_lname', '$mother_fname', '$mother_mname')";

$fam_bg_id = insert_update_delete($fam_bg_sql);

// children details
$child_total_entry = $_POST['child-total-entry'];

for ($i = 1; $i <= $child_total_entry; $i++) {
    $child_name = $_POST["child-name-$i"];
    $child_bdate = $_POST["child-bdate-$i"];
    if (!empty($child_name) && !empty($child_bdate)) {
        insert_children($fam_bg_id, $child_name, $child_bdate);
    }
}

// educational background details
$education_prefix = ['elementary', 'secondary', 'vocational', 'college', 'graduate'];

foreach ($education_prefix as $index => $prefix) {
    $index++;

    $education_background = [
        'educational_level' => $index,
        'school_name' => $_POST["$prefix-school"],
        'degree' => $_POST["$prefix-degree"],
        'school_year_start' => $_POST["$prefix-start-date"],
        'school_year_end' => $_POST["$prefix-end-date"],
        'highest_level' => $_POST["$prefix-highest-unit"],
        'year_graduated' => $_POST["$prefix-year-graduated"],
    ];

    $education_entry_id = insert_education_info($employee_id, $education_background);
    insert_awards_info($education_entry_id, $_POST["{$prefix}-awards"]);
}

// civil service eligibility details
$cs_total_entry = $_POST['cs-total-entry'];

for ($i = 1; $i <= $cs_total_entry; $i++) {
    $civil_entry_info = [
        'examination_name' => $_POST["exam-name-$i"],
        'rating' => $_POST["exam-rating-$i"],
        'examination_date' => $_POST["exam-date-$i"],
        'examination_place' => $_POST["exam-place-$i"],
    ];

    $civil_entry_id = insert_civil_service_info($employee_id, $civil_entry_info);

    $license_info = [
        'license_number' => $_POST["license-number-$i"],
        'issue_date' => $_POST["issue-date-$i"],
    ];

    if (checkEmptyFields($civil_entry_info) > 80) {
        insert_license_info($civil_entry_id, $license_info);
    }
}


// work experience
$work_exp_total_entry = $_POST['work-exp-total'];
for ($i = 1; $i <= $work_exp_total_entry; $i++) {
    $work_exp_info = [
        'department' => $_POST["agency-$i"],
        'position' => $_POST["position-$i"],
        'work_start' => $_POST["work-start-$i"],
        'work_end' => $_POST["work-end-$i"],
        'monthly_salary' => $_POST["salary-$i"],
        'salary_grade' => $_POST["salary-grade-$i"],
        'salary_step' => $_POST["salary-step-$i"],
        'appointment_status' => $_POST["appointment-status-$i"],
        'government_service' => $_POST["government-service-$i"]
    ];
    if (checkEmptyFields($work_exp_info) > 70) {
        insert_work_exp_info($employee_id, $work_exp_info);
    }
}


// voluntary work experience
$vol_work_exp_total = $_POST['voluntary-work-total'];
for ($i = 1; $i <= $vol_work_exp_total; $i++) {
    $vol_work_info = [
        'org_name_address' => $_POST["org-name-$i"],
        'work_start' => $_POST["work-vol-start-$i"],
        'work_end' => $_POST["work-vol-end-$i"],
        'total_hours' => $_POST["work-vol-hours-$i"],
        'position' => $_POST["nature-of-work-$i"]
    ];

    if (checkEmptyFields($vol_work_info) == 100) {
        insert_vol_work_exp_info($employee_id, $vol_work_info);
    }
}

$learning_dev_total = $_POST["learning-development-total"];

for ($i = 1; $i <= $learning_dev_total; $i++) {
    $learning_dev_info = [
        'training_name' => $_POST["training-name-$i"],
        'training_start' => $_POST["training-start-$i"],
        'training_end' => $_POST["training-end-$i"],
        'training_type' => $_POST["training-type-$i"],
        'training_hours' => $_POST["training-hours-$i"],
        'training_sponsor' => $_POST["training-sponsor-$i"]
    ];

    if (checkEmptyFields($learning_dev_info) > 80) {
        insert_learning_dev_info($employee_id, $learning_dev_info);
    }
}

// for skill entries insertion
$skill_total = $_POST["skills-total-entry"];
for ($i = 1; $i <= $skill_total; $i++) {
    $skill_entry = $_POST["skill-$i"];
    if (!empty($skill_entry)) {
        insert_skills_info($employee_id, $skill_entry);
    }
}

// for recognition entries insertion
$recognition_total = $_POST["recognition-total-entry"];
for ($i = 1; $i <= $recognition_total; $i++) {
    $recognition_entry = $_POST["recognition-$i"];
    if (!empty($recognition_entry)) {
        insert_recognition_info($employee_id, $recognition_entry);
    }
}

// for membership entries insertion
$membership_total = $_POST["membership-total-entry"];
for ($i = 1; $i <= $membership_total; $i++) {
    $membership_entry = $_POST["membership-$i"];
    if (!empty($membership_entry)) {
        insert_membership_info($employee_id, $membership_entry);
    }
}

// additional questions entries

if($_POST['crim-offense'] == 1){
    $query = "INSERT INTO criminal_record (date_filed, case_status) VALUES ('".$_POST['admin-offense-info']."', '". $_POST['date-filed'] ."')";

    $crim_detail_id = insert_update_delete($query);
}

$questionnaire_reponses = [
    'relative_third_degree' => $_POST['third-degree'],
    'relative_fourth_degree' => $_POST['fourth-degree'],
    'relative_details' => $_POST['consanguinity-info'],
    'admin_offense' => $_POST['admin-offense'],
    'admin_offense_details' => ($_POST['admin-offense'] == 1) ? $_POST['admin-offense-info'] : 'N/A',
    'criminal_offense' => $_POST['crim-offense'],
    'criminal_offense_status' => $_POST['crim-offense-info'],
    'criminal_date_filed' => $_POST['date-filed'],
    'criminal_conviction' => $_POST['crime-conviction'],
    'criminal_conviction_details' => ($_POST['crime-conviction'] == 1) ? $_POST['crime-conviction'] : 'N/A',
    'service_separation' => $_POST['separation'],
    'separation_details' => ($_POST['separation'] == 1) ? $_POST['separation-info'] : 'N/A',
    'election_candidate' => $_POST['candidate'],
    'election_candidate_details' => ($_POST['candidate'] == 1) ? $_POST['candidate-info'] : 'N/A',
    'gov_resignation' => $_POST['gov-resignation'],
    'gov_resignation_details' => ($_POST['gov-resignation'] == 1) ? $_POST['gov-resignation-info'] : 'N/A',
    'immigrant' => $_POST['foreign-residency'],
    'immigrant_details' => ($_POST['foreign-residency'] == 1) ? $_POST['foreign-residency-info'] : 'N/A',
    'indigenous' => $_POST['indigenous'],
    'indigenous_details' => ($_POST['indigenous'] == 1) ? $_POST['indigenous-info'] : 'N/A',
    'disability' => $_POST['pwd'],
    'disability_id' => ($_POST['pwd'] == 1) ? $_POST['pwd-info'] : 'N/A',
    'single_parent' => $_POST['solo-parent'],
    'single_parent_id' => ($_POST['solo-parent'] == 1) ? $_POST['solo-parent-info'] : 'N/A',
];

insert_questions_responses($employee_id, $questionnaire_reponses);

// persons reference
$reference_total = $_POST['references-total-entry'];
for ($i = 1; $i <= $reference_total; $i++){
    $name = $_POST["reference-name-$i"];
    $address = $_POST["reference-address-$i"];
    $telno = $_POST["reference-telno-$i"];
    
    if(!empty($name) && !empty($address) && !empty($telno)){
        insert_reference_info($employee_id, $name, $address, $telno);
    }
}

$baseDir = dirname(__FILE__) . '/assets/uploads';

$id_photo = handleFileUpload("gov-id-img", $baseDir . '/profile');
$right_thumbmark = handleFileUpload("right-thumb-img", $baseDir . '/thumbmark');
$signature = handleFileUpload("signature-img", $baseDir . '/signature');

$validation_info = [
    'id_type' => $_POST['gov-issued-id'],
    'id_no' => $_POST['gov-issued-id-no'],
    'issuance_date' => $_POST['gov-id-issuance-date'],
    'issuance_place' => $_POST['gov-id-issuance-place'],
    'signature' => $signature['file-name'],
    'signature_type' => $signature['file-type'],
    'date_accomplished' => $_POST['date-accomplished'],
    'id_photo' => $id_photo['file-name'],
    'id_photo_type' => $id_photo['file-type'],
    'right_thumbmark' => $right_thumbmark['file-name'],
    'right_thumbmark_type' => $right_thumbmark['file-type'],
];

insert_validation_info($employee_id, $validation_info);

header('Location: ../../employee_list.php');
exit();
//for uploading images
// include '../../assets/added-n/image-upload.php'; 


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";