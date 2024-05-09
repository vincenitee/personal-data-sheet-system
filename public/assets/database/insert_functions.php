<?php

// for address insertion
function insert_address($tablename, $address_info)
{
    extract($address_info);
    $query = "INSERT INTO $tablename (house_no, street, village, brgy_id, municipality_id, province_id, zip) VALUES ('$house', '$street', '$village', '$brgy_id', '$municipality_id', '$province_id', '$zip')";
    return insert_update_delete($query);
}

// for child details insertion
function insert_children($fam_bg_id, $childname, $bdate)
{
    $query = "INSERT INTO children (fam_bg_id, child_name, child_bdate) VALUES ('$fam_bg_id', '$childname', '$bdate')";
    return insert_update_delete($query);
}

// for educational background insertion
function insert_education_info($employee_id, $education_info)
{
    extract($education_info);
    $query = "INSERT INTO educational_background (emp_id, education_lvl_id, school_name, degree_course, sy_start, sy_end, highest_lvl_units, year_graduated) VALUES ('$employee_id', '$educational_level', '$school_name', '$degree', '$school_year_start', '$school_year_end', '$highest_level', '$year_graduated')";
    return insert_update_delete($query);
}

// for award/scholarship insertion
function insert_awards_info($education_entry_id, $award_name)
{
    $query = "INSERT INTO award_scholarship (edu_id, award_scholarship_name) VALUES ('$education_entry_id', '$award_name')";
    return insert_update_delete($query);
}

// for cs eligibility insertion
function insert_civil_service_info($employee_id, $civil_service_info)
{
    extract($civil_service_info);
    $query = "INSERT INTO civil_service_eligibility (emp_id, examination_name, rating, examination_date, examination_place) VALUES ('$employee_id', '$examination_name', '$rating', '$examination_date', '$examination_place')";
    return insert_update_delete($query);
}

// for license info insertion
function insert_license_info($civil_entry_id, $license_info)
{
    extract($license_info);
    $query = "INSERT INTO license_info (civil_eligibility_id, license_number, date_of_validity) VALUES ('$civil_entry_id', '$license_number', '$issue_date')";
    return insert_update_delete($query);
}

// for work experience insertion
function insert_work_exp_info($employee_id, $work_exp_info)
{
    extract($work_exp_info);

    $padded_salary_grade = ($salary_grade !== "N/A") ? str_pad($salary_grade, 2, '0', STR_PAD_LEFT) : "N/A";

    $salary_grade_step = ($salary_grade !== "N/A" && $salary_step !== "N/A") ? "$padded_salary_grade-$salary_step" : "N/A";

    $query = "INSERT INTO work_experience (emp_id, department, position, work_start, work_end, monthly_salary, salary_grade_step, appointment_status, gov_service)
    VALUES ('$employee_id', '$department', '$position', '$work_start', '$work_end', '$monthly_salary', '$salary_grade_step', '$appointment_status', '$government_service')";

    return insert_update_delete($query);
}

// for voluntary work experience insertion
function insert_vol_work_exp_info($employee_id, $vol_work_info)
{
    extract($vol_work_info);
    $query = "INSERT INTO vol_work_experience (emp_id, org_name_address, work_start, work_end, total_hours, position) VALUES ('$employee_id', '$org_name_address', '$work_start' ,'$work_end' ,'$total_hours', '$position')";
    return insert_update_delete($query);
}

// for learning and development insertion
function insert_learning_dev_info($employee_id, $learning_dev_info)
{
    extract($learning_dev_info);

    $query = "INSERT INTO learning_dev (emp_id, training_name, training_start, training_end, total_hours, training_type, sponsor) VALUES ('$employee_id', '$training_name', '$training_start', '$training_end', '$training_hours', '$training_type', '$training_sponsor')";

    return insert_update_delete($query);
}

// for skills insertion
function insert_skills_info($employee_id, $skill)
{
    $query = "INSERT INTO skill (emp_id, skill) VALUES ('$employee_id', '$skill')";
    return insert_update_delete($query);
}

// for org membership insertion
function insert_membership_info($employee_id, $membership)
{
    $query = "INSERT INTO org_membership (emp_id, org_membership) VALUES ('$employee_id', '$membership')";
    return insert_update_delete($query);
}

// for org membership insertion
function insert_recognition_info($employee_id, $recognition)
{
    $query = "INSERT INTO non_acad_recognition (emp_id, recognition) VALUES ('$employee_id', '$recognition')";
    return insert_update_delete($query);
}

// for additional questions responses
function insert_questions_responses($employee_id, $question_reponses)
{
    extract($question_reponses);

    $query = "INSERT INTO questionnaire (emp_id, relative_third_degree, relative_fourth_degree, relative_details, admin_offense, admin_offense_details, criminal_offense, criminal_case_status, criminal_date_filed, criminal_conviction, criminal_conviction_details, service_separation, separation_details, election_candidate, election_candidate_details, gov_resignation, gov_resignation_details, immigrant, immigrant_details, indigenous, indigenous_details, disability, disability_id, single_parent, single_parent_id) VALUES ('$employee_id', '$relative_third_degree', '$relative_fourth_degree', '$relative_details', '$admin_offense', '$admin_offense_details', '$criminal_offense', '$criminal_offense_status', '$criminal_date_filed', '$criminal_conviction', '$criminal_conviction_details', '$service_separation', '$separation_details', '$election_candidate', '$election_candidate_details', '$gov_resignation', '$gov_resignation_details', '$immigrant', '$immigrant_details', '$indigenous', '$indigenous_details', '$disability', '$disability_id', '$single_parent', '$single_parent_id')";

    return insert_update_delete($query);
}

// for references people insertion
function insert_reference_info($employee_id, $name, $address, $telno)
{
    $query = "INSERT INTO reference (emp_id, name, address, tel_no) VALUES ('$employee_id', '$name', '$address', '$telno')";
    return insert_update_delete($query);
}

// for validation insertion
function insert_validation_info($employee_id, $validation_info)
{
    extract($validation_info);
    $query = "INSERT INTO validation (emp_id, id_type, id_no, issuance_date, issuance_place, signature, date_accomplished, id_photo, right_thumbmark)
            VALUES ('$employee_id', '$id_type', '$id_no', '$issuance_date' , '$issuance_place', '$signature', '$date_accomplished', '$id_photo', '$right_thumbmark')";
    return insert_update_delete($query);
}
