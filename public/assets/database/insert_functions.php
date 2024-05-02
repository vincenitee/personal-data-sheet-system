<?php 

// for address insertion
function insert_address($tablename, $address_info) {
    extract($address_info);
    $query = "INSERT INTO $tablename (house_no, street, village, brgy_id, municipality_id, province_id, zip) VALUES ('$house', '$street', '$village', '$brgy_id', '$municipality_id', '$province_id', '$zip')";
    return insert_update_delete($query);
}

// for child details insertion
function insert_children($fam_bg_id, $childname, $bdate){
    $query = "INSERT INTO children (fam_bg_id, child_name, child_bdate) VALUES ('$fam_bg_id', '$childname', '$bdate')";
    return insert_update_delete($query);
}

// for educational background insertion
function insert_education_info($employee_id, $education_info){
    extract($education_info);
    $query = "INSERT INTO educational_background (emp_id, edu_lvl_id, school_name, degree_course, sy_start, sy_end, highest_lvl_units, year_graduated) VALUES ('$employee_id', '$educational_level', '$school_name', '$degree', '$school_year_start', '$school_year_end', '$highest_level', '$year_graduated')";
    return insert_update_delete($query);
}

// for award/scholarship insertion
function insert_awards_info($education_entry_id, $award_name){
    $query = "INSERT INTO award_scholarship (edu_id, award_scholarship_name) VALUES ('$education_entry_id', '$award_name')";
    return insert_update_delete($query);
}

// for cs eligibility insertion
function insert_civil_service_info($employee_id, $civil_service_info){
    extract($civil_service_info);
    $query = "INSERT INTO civil_service_eligibility (emp_id, examination_name, rating, examination_date, examination_place) VALUES ('$employee_id', '$examination_name', '$rating', '$examination_date', '$examination_place')";
    return insert_update_delete($query);
}

function insert_license_info($civil_entry_id, $license_info){
    extract($license_info);
    $query = "INSERT INTO license_info (civil_eligibility_id, license_number, date_of_validity) VALUES ('$civil_entry_id', '$license_number', '$issue_date')";
    return insert_update_delete($query);
}

?>