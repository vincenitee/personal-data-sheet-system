<?php
include 'sql_statements.php';

$emp_id = $_GET['emp_id'];

$tables = ['employee', 'residential_address', 'permanent_address', 'family_background', 'educational_background', 'civil_service_eligibility', 'work_experience', 'vol_work_experience', 'learning_dev', 'skill', 'non_acad_recognition', 'org_membership', 'questionnaire', 'reference',];

$result = array();

if (isset($emp_id) && !empty($emp_id)) {
    foreach ($tables as $table) {
        $query = "SELECT * FROM $table WHERE emp_id = $emp_id";
        $data = select_info_multiple_key($query);

        // if there are no records continue
        if (!$data) continue;

        // insert the total entries of the field here
        $result[$table] = $data[0];
    }

    echo "<pre>";
    print_r($result);
    echo "</pre>";
}
