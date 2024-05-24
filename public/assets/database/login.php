<?php include 'sql_statements.php';
    extract($_POST);

    $query = ($role == 'Admin') ? "SELECT * FROM admin WHERE username = '$username' AND password = '$password'" : "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = select_info_multiple_key($query);

    if($result){
        session_start();
        $_SESSION['admin_id'] = $result[0]['admin_id'];
        header('Location: ../../dashboard.php');
        exit();
    } else{
        header('Location: ../../index.php?login=' . urlencode(0));
    }
    // if(($result[0]['username'] == $username) & ($result[0]['password']) == $password){
    //     session_start();
    //     $_SESSION['admin_id'] = $result[0]['admin_id']; 
    //     $_SESSION['username'] = $result[0]['username'];
    //     header('Location: ../../input_form.php');
    //     exit();
    // } else{
        
    // }

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
?>