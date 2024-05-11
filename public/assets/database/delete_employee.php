<?php 
    include 'sql_statements.php';

    $emp_id = $_GET['emp_id'];

    $query = "DELETE FROM employee WHERE emp_id = $emp_id";
    
    if(insert_update_delete($query) === true){
        header('Location: employee_list.php?'.urlencode('message=Deleted Successfully'));
        exit();
    } else {
        header('Location: employee_list.php?'.urlencode('message=Deletion Failed'));
        exit();
    }
?>
