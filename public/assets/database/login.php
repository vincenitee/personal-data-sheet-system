<?php include 'sql_statements.php';
    extract($_POST);

    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = select_info_multiple_key($query);

    if(($result[0]['username'] == $username) & ($result[0]['password']) == $password){
        session_start();
        $_SESSION['admin_id'] = $result[0]['admin_id']; 
        $_SESSION['username'] = $result[0]['username'];
        header('Location: ../../input_form.php');
        exit();
    } else{
        header('Location: ../../index.php?login=' . urlencode(0));
    }

    echo "<pre>";
    print_r($result);
    echo "</pre>";
?>