<?php
include 'sql_statements.php';

$emp_id = $_GET['emp_id'];

$tables = ['employee', 'residential_address', 'permanent_address', 'family_background', 'children', 'educational_background', 'civil_service_eligibility', 'work_experience', 'vol_work_experience', 'learning_dev', 'skill', 'non_acad_recognition', 'org_membership', 'questionnaire', 'reference', 'validation'];

$result = array();

if ($emp_id > 0) {
    foreach ($tables as $table) {

        if ($table === 'children') {
            $fam_bg_query = "SELECT fam_bg_id FROM family_background WHERE emp_id = " . $emp_id;
            $fam_bg_id = select_info_multiple_key($fam_bg_query)[0]['fam_bg_id'];

            $children_query = "SELECT * FROM children WHERE fam_bg_id = " . $fam_bg_id;
            $children_data = select_info_multiple_key($children_query);

            if ($children_data) {
                $result[$table] = $children_data;
            }
            continue;
        }

        $query = "SELECT * FROM $table WHERE emp_id = " . intval($emp_id);
        $data = select_info_multiple_key($query);

        // if there are no records continue
        if (!$data) continue;

        // insert the total entries of the field here
        $result[$table] = $data[0];
    }
}
