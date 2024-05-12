<?php
include 'sql_statements.php';

$emp_id = $_GET['emp_id'];

if (isset($emp_id)) {
    $query = "DELETE FROM employee WHERE emp_id = '$emp_id'";

    $result = insert_update_delete($query);

    if ($result) {
        header('Location: ../../public/employee_list.php?is_deleted=' . urlencode(1));
        exit();
    } else {

    }
} else {
    header('Location: ../../public/employee_list.php?is_deleted=' . urlencode(0));
    exit();
}

?>
