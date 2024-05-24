<?php include 'sql_statements.php';
extract($_POST);

    if ($role == 'Admin') {
        $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    } else {
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    }

    $result = select_info_multiple_key($query);

    if ($result) {
        session_start();
        if ($role == 'Admin') {
            $_SESSION['admin_id'] = $result[0]['admin_id'];
            header('Location: ../../admin_dashboard.php');
        } else {
            $_SESSION['user_id'] = $result[0]['user_id'];
            header('Location: ../../user_dashboard.php');
        }
        exit();
    } else {
        header('Location: ../../index.php?login=' . urlencode(0));
        exit();
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
