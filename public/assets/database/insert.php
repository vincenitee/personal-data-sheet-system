<?php
include 'sql_statements.php';
include 'insert_functions.php';

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

$residential_address = [
    'house' => $_POST['res-house-no'],
    'street' => $_POST['res-street'],
    'village' => $_POST['res-village'],
    'brgy_id' => $_POST['res-brgy'],
    'municipality_id' => $_POST['res-municipality'],
    'province_id' => $_POST['res-province'],
    'zip' => $_POST['res-zip']
];

$permanent_address = [
    'house' => $_POST['permanent-house-no'],
    'street' => $_POST['permanent-street'],
    'village' => $_POST['permanent-village'],
    'brgy_id' => $_POST['permanent-brgy'],
    'municipality_id' => $_POST['permanent-municipality'],
    'province_id' => $_POST['permanent-province'],
    'zip' => $_POST['permanent-zip'],
];

$tel_no = $_POST['tel-no'];
$mobile_no = $_POST['mobile-no'];
$email = $_POST['email'];

$res_entry_id = insert_address('residential_address', $residential_address);

$permanent_entry_id = insert_address('permanent_address', $permanent_address);

// echo $permanent_entry_id;

$query = "INSERT INTO employee (last_name, first_name, middle_name, suffix_id, birthdate, birthplace, sex, civil_status_id, height, weight, blood_type_id, gsis_no, pagibig_no, philhealth_no, sss_no, tin_no, agency_emp_no, citizenship, citizenship_method, country_id, res_address_id, perm_address_id, telephone_no, mobile_no, email) VALUES ('$lastname', '$firstname', '$middlename', '$suffix_id', '$bdate', '$birthplace', '$sex', '$civil_status_id', '$height', '$weight', '$blood_type_id', '$gsis_id', '$pagibig_id', '$philhealth_id', '$sss_id', '$tin_id', '$agency_no', '$citizenship', '$citizenship_method', '$country_id', '$res_entry_id', '$permanent_entry_id', '$tel_no', '$mobile_no', '$email')";

// employee id
$employee_id = insert_update_delete($query);

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

$fam_bg_sql = "INSERT INTO family_background (emp_id, spouse_lname, spouse_fname, spouse_mname, spouse_suffix, spouse_occupation, bus_name, bus_address, tel_no, father_lname, father_fname, father_mname, father_suffix, mother_lname, mother_fname, mother_mname) VALUES ('$employee_id', '$spouse_lname', '$spouse_fname', '$spouse_mname', '$spouse_suffix', '$spouse_occupation', '$spouse_business', '$spouse_business_addr', '$spouse_telno', '$father_lname', '$father_fname', '$father_mname', '$father_suffix', '$mother_lname', '$mother_fname', '$mother_mname')";

$fam_bg_id = insert_update_delete($fam_bg_sql);

// children details
$child_total_entry = $_POST['child-total-entry'];

for ($i = 1; $i <= $child_total_entry; $i++) {
    $child_name = $_POST["child-name-$i"];
    $child_bdate = $_POST["child-bdate-$i"];
    insert_children($fam_bg_id, $child_name, $child_bdate);
}

// educational background details
$education_prefix = ['elementary', 'secondary', 'vocational', 'college', 'graduate'];

foreach($education_prefix as $index => $prefix){
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

for($i = 1; $i <= $cs_total_entry; $i++){
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

    insert_license_info($civil_entry_id, $license_info);
}


// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
?>