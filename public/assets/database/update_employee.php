<?php
include 'sql_statements.php';
include 'insert_functions.php';

function update_addresses($address)
{
    extract($address);

    $address_query = "UPDATE $table
                    SET house_no = '$house',
                    street = '$street',
                    village = '$village',
                    province_id = '$province_id',
                    municipality_id = '$municipality_id',
                    brgy_id = '$brgy_id',
                    zip = '$zip'
                    WHERE emp_id = '$emp_id'";

    insert_update_delete($address_query);
}

function update_children($children)
{
    extract($children);

    $children_query = "UPDATE $table
                SET child_name = '$child_name',
                child_bdate = '$child_bdate'
                WHERE child_id = $child_id";


    insert_update_delete($children_query);
}

function update_education_bg($education_info)
{
    extract($education_info);

    $edu_query = "UPDATE $table SET 
                school_name = '$school_name',
                degree_course = '$degree',
                highest_lvl_units = '$highest_level',
                sy_start = '$school_year_start',
                sy_end = '$school_year_end',
                year_graduated = '$year_graduated'
                WHERE edu_id = $entry_id";

    $award_exist = select_info_multiple_key("SELECT * FROM award_scholarship WHERE edu_id = $entry_id");

    if ($award_exist) {
        $award_query = "UPDATE award_scholarship SET
                        award_scholarship_name = '$award'
                        WHERE edu_id = $entry_id";

        insert_update_delete($award_query);
    }

    insert_update_delete($edu_query);

    // return insert_update_delete($query)
}

function update_cs_eligibility($cs_info)
{
    extract($cs_info);

    $cs_query = "UPDATE civil_service_eligibility
                SET examination_name = '$examination_name',
                rating = '$rating',
                examination_date = '$examination_date',
                examination_place = '$examination_place'
                WHERE civil_eligibility_id = $entry_id";

    $license_exist = select_info_multiple_key("SELECT * FROM license_info WHERE civil_eligibility_id = $entry_id");

    if ($license_exist) {
        $license_query = "UPDATE license_info 
                            SET license_number = '$license_number',
                            date_of_validity = '$issue_date'
                            WHERE civil_eligibility_id = $entry_id";
        insert_update_delete($license_query);
    }
    insert_update_delete($cs_query);
}

function pretty_print($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function update_work_entry($work_info)
{
    extract($work_info);

    $work_query = "UPDATE work_experience SET
                    department = '$department',
                    position = '$position',
                    work_start = '$work_start',
                    work_end = '$work_end',
                    monthly_salary = '$monthly_salary',
                    salary_grade_step = '$salary_grade-$salary_step',
                    appointment_status = '$appointment_status',
                    gov_service = '$government_service'
                    WHERE work_exp_id = $entry_id
                    ";

    insert_update_delete($work_query);
}

function update_vol_work_entry($vol_work_info)
{
    extract($vol_work_info);

    $vol_work_query = "UPDATE vol_work_experience
                        SET org_name_address = '$org_name_address',
                        work_start = '$work_start',
                        work_end = '$work_end'
                        WHERE vol_work_id = $entry_id
                        ";

    insert_update_delete($vol_work_query);
}

function update_learning_dev($learning_info)
{
    extract($learning_info);

    $learning_dev_query = "UPDATE learning_dev SET
                            training_name = '$training_name',
                            training_start = '$training_start',
                            training_end = '$training_end',
                            total_hours = '$training_hours',
                            training_type = '$training_type',
                            sponsor = '$training_sponsor'
                            WHERE learning_dev_id = $entry_id
                            ";
    insert_update_delete($learning_dev_query);
}

function update_skill($skill_info)
{
    extract($skill_info);
    $skill_query = "UPDATE skill SET skill = '$skill' WHERE skill_id = $skill_id";
    echo "<br><br> $skill_query";
    insert_update_delete($skill_query);
}

function update_recognition($recognition_info)
{
    extract($recognition_info);
    $recognition_query = "UPDATE non_acad_recognition SET recognition = '$recognition' WHERE recognition_id = $recognition_id";
    echo "<br><br> $recognition_query";
    insert_update_delete($recognition_query);
}

function update_membership($membership_info)
{
    extract($membership_info);

    $membership_query = "UPDATE org_membership SET org_membership = '$membership' WHERE org_membership_id = $membership_id";

    insert_update_delete($membership_query);
}

function update_questionnaire($responses)
{
    extract($responses);
    $questionnaire_query = "UPDATE questionnaire
                            SET 
                                relative_third_degree = '$relative_third_degree',
                                relative_fourth_degree = '$relative_fourth_degree',
                                relative_details = '$relative_details',
                                admin_offense = '$admin_offense',
                                admin_offense_details = '$admin_offense_details',
                                criminal_offense = '$criminal_offense',
                                criminal_case_status = '$criminal_offense_status',
                                criminal_date_filed = '$criminal_date_filed',
                                criminal_conviction = '$criminal_conviction',
                                criminal_conviction_details = '$criminal_conviction_details',
                                service_separation = '$service_separation',
                                separation_details = '$separation_details',
                                election_candidate = '$election_candidate',
                                election_candidate_details = '$election_candidate_details',
                                gov_resignation = '$gov_resignation',
                                gov_resignation_details = '$gov_resignation_details',
                                immigrant = '$immigrant',
                                immigrant_details = '$immigrant_details',
                                indigenous = '$indigenous',
                                indigenous_details = '$indigenous_details',
                                disability = '$disability',
                                disability_id = '$disability_id',
                                single_parent = '$single_parent',
                                single_parent_id = '$single_parent_id'
                            WHERE emp_id = '$emp_id'";

    insert_update_delete($questionnaire_query);
}
// personal details
$emp_id = $_POST['emp_id'];
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

$update_employee = "UPDATE employee 
                    SET first_name = '$firstname',
                        last_name = '$lastname',
                        middle_name = '$middlename',
                        suffix_id = $suffix_id,
                        birthdate = '$bdate',
                        birthplace = '$birthplace',
                        sex = '$sex',
                        civil_status_id = $civil_status_id,
                        height = $height,
                        weight = $weight,
                        blood_type_id = $blood_type_id,
                        gsis_no = '$gsis_id',
                        pagibig_no = '$pagibig_id',
                        philhealth_no = '$philhealth_id',
                        sss_no = '$sss_id',
                        agency_emp_no = '$agency_no',
                        citizenship = '$citizenship',
                        citizenship_method = '$citizenship_method',
                        country_id = '$country_id',
                        telephone_no = '$tel_no',
                        mobile_no = '$mobile_no',
                        email = '$email'
                    WHERE emp_id = $emp_id";

insert_update_delete($update_employee);

// address
$residential_address = [
    'table' => 'residential_address',
    'emp_id' => $emp_id,
    'house' => $_POST['res-house-no'],
    'street' => $_POST['res-street'],
    'village' => $_POST['res-village'],
    'brgy_id' => $_POST['res-brgy'],
    'municipality_id' => $_POST['res-municipality'],
    'province_id' => $_POST['res-province'],
    'zip' => $_POST['res-zip']
];

$permanent_address = [
    'table' => 'permanent_address',
    'emp_id' => $emp_id,
    'house' => $_POST['permanent-house-no'],
    'street' => $_POST['permanent-street'],
    'village' => $_POST['permanent-village'],
    'brgy_id' => $_POST['permanent-brgy'],
    'municipality_id' => $_POST['permanent-municipality'],
    'province_id' => $_POST['permanent-province'],
    'zip' => $_POST['permanent-zip'],
];

update_addresses($residential_address);
update_addresses($permanent_address);

// family background
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

$update_family_bg = "UPDATE family_background
                    SET spouse_lname = '$spouse_lname',
                        spouse_fname = '$spouse_fname',
                        spouse_mname = '$spouse_mname',
                        spouse_suffix = '$spouse_suffix',
                        spouse_occupation = '$spouse_occupation',
                        spouse_business = '$spouse_business',
                        tel_no = '$spouse_telno',
                        father_lname = '$father_lname',
                        father_fname = '$father_fname',
                        father_mname = '$father_mname',
                        father_suffix = '$father_suffix',
                        mother_lname = '$mother_lname',
                        mother_fname = '$mother_fname',
                        mother_mname = '$mother_mname'
                    WHERE emp_id = $emp_id";

insert_update_delete($update_family_bg);

// children details
$child_total_entry = $_POST['child-total-entry'];

$fam_bg_id = isset($_POST['fam-bg-id']) ? $_POST['fam-bg-id'] : '';
echo "<br><br> $fam_bg_id";

for ($i = 1; $i <= $child_total_entry; $i++) {
    $child_name = $_POST["child-name-$i"];
    $child_bdate = $_POST["child-bdate-$i"];
    $child_id = $_POST["child-id-$i"];
    if (!empty($child_name) && !empty($child_bdate)) {
        $child_info = [
            'table' => 'children',
            'child_name' => $child_name,
            'child_bdate' => $child_bdate,
            'child_id' => $child_id
        ];
        update_children($child_info);
    }
}

// educational background
$education_prefix = ['elementary', 'secondary', 'vocational', 'college', 'graduate'];

foreach ($education_prefix as $index => $prefix) {
    $index++;

    $education_background = [
        'table' => 'educational_background',
        'entry_id' => $_POST["$prefix-id"],
        'educational_level' => $index,
        'school_name' => $_POST["$prefix-school"],
        'degree' => $_POST["$prefix-degree"],
        'school_year_start' => $_POST["$prefix-start-date"],
        'school_year_end' => $_POST["$prefix-end-date"],
        'highest_level' => $_POST["$prefix-highest-unit"],
        'year_graduated' => $_POST["$prefix-year-graduated"],
        'award' => $_POST["$prefix-awards"]
    ];

    update_education_bg($education_background);
}

// civil_service_eligibility
$cs_total_entry = $_POST['cs-total-entry'];

for ($i = 1; $i <= $cs_total_entry; $i++) {
    $civil_entry_info = [
        'entry_id' => $_POST["cs-id-$i"],
        'examination_name' => $_POST["exam-name-$i"],
        'rating' => $_POST["exam-rating-$i"],
        'examination_date' => $_POST["exam-date-$i"],
        'examination_place' => $_POST["exam-place-$i"],
        'license_number' => $_POST["license-number-$i"],
        'issue_date' => $_POST["issue-date-$i"],
    ];

    $all_values_present = true;
    foreach ($civil_entry_info as $key => $value) {
        if (empty($value)) {
            $all_values_present = false;
            break;
        }
    }

    if ($all_values_present) {
        if (isset($civil_entry_info['entry_id'])) {
            update_cs_eligibility($civil_entry_info);
        } else {
            insert_civil_service_info($emp_id, $civil_entry_info);
        }
    }
}

// work experience

$work_exp_total_entry = $_POST['work-exp-total'];
for ($i = 1; $i <= $work_exp_total_entry; $i++) {
    $work_exp_info = [
        'entry_id' => $_POST["work-id-$i"],
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

    $all_values_present = true;
    foreach ($work_exp_info as $key => $value) {
        if (empty($value)) {
            $all_values_present = false;
            break;
        }
    }

    if ($all_values_present) {
        update_work_entry($work_exp_info);
    } else {
        insert_work_exp_info($emp_id, $work_exp_info);
    }
}

// vol work experience
$vol_work_exp_total = $_POST['voluntary-work-total'];
for ($i = 1; $i <= $vol_work_exp_total; $i++) {
    $vol_work_info = [
        'entry_id' => $_POST["vol-work-id-$i"],
        'org_name_address' => $_POST["org-name-$i"],
        'work_start' => $_POST["work-vol-start-$i"],
        'work_end' => $_POST["work-vol-end-$i"],
        'total_hours' => $_POST["work-vol-hours-$i"],
        'position' => $_POST["nature-of-work-$i"]
    ];

    $all_values_present = true;
    foreach ($vol_work_info as $key => $value) {
        if (empty($value)) {
            $all_values_present = false;
            break;
        }
    }

    pretty_print($vol_work_info);

    if ($all_values_present) {
        if (isset($vol_work_info['entry_id'])) {
            update_vol_work_entry($vol_work_info);
        } else {
            insert_vol_work_exp_info($emp_id, $vol_work_info);
        }
    }
}

// learning and development
$learning_dev_total = $_POST["learning-development-total"];

for ($i = 1; $i <= $learning_dev_total; $i++) {
    $learning_dev_info = [
        'entry_id' => $_POST["learning-dev-id-$i"],
        'training_name' => $_POST["training-name-$i"],
        'training_start' => $_POST["training-start-$i"],
        'training_end' => $_POST["training-end-$i"],
        'training_type' => $_POST["training-type-$i"],
        'training_hours' => $_POST["training-hours-$i"],
        'training_sponsor' => $_POST["training-sponsor-$i"]
    ];

    $all_values_present = true;
    foreach ($learning_dev_info as $key => $value) {
        if (empty($value)) {
            $all_values_present = false;
            break;
        }
    }

    if ($all_values_present) {
        if (isset($learning_dev_info['entry_id'])) {
            update_learning_dev($learning_dev_info);
        } else {
            insert_learning_dev_info($emp_id, $learning_dev_info);
        }
    }
}

// other information
$skill_total = $_POST["skills-total-entry"];

for ($i = 1; $i <= $skill_total; $i++) {
    $skill_info = [
        'skill_id' => $_POST["skill-id-$i"],
        'skill' => $_POST["skill-$i"]
    ];

    update_skill($skill_info);
}

$recognition_total = $_POST["recognition-total-entry"];
for ($i = 1; $i <= $recognition_total; $i++) {

    $recognition_info = [
        'recognition_id' => $_POST["recognition-id-$i"],
        'recognition' => $_POST["recognition-$i"]
    ];

    update_recognition($recognition_info);
}

$membership_total = $_POST["membership-total-entry"];
for ($i = 1; $i <= $membership_total; $i++) {
    $membership_info = [
        'membership_id' => $_POST["org-membership-id-$i"],
        'membership' => $_POST["membership-$i"]
    ];

    update_membership($membership_info);
}

$questionnaire_reponses = [
    'emp_id' => $emp_id,
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

update_questionnaire($questionnaire_reponses);



// // echo "<script>window.location = '../../../employee_list.php'</script>";
// // header('Location: ../../../employee_list.php');
// // echo "<pre>";
// // print_r($_POST);
// // echo "</pre>";
