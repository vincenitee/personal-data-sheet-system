<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    $_SESSION = array();
    session_destroy();
}

header('Location: ../../index.php?logout=true');
exit();
?>
