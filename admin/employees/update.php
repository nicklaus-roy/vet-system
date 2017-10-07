<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $employee_id = $_POST['employee_id'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $role = $_POST['role'];

    if(isset($_POST['is_active'])){
        $is_active = 1;
    }
    else{
        $is_active = 0;
    }

    $conn->query("UPDATE users SET last_name = '$last_name', first_name = '$first_name', 
        middle_name = '$middle_name', role = '$role', is_active = '$is_active' WHERE id = '$employee_id'");

    $_SESSION['message'] = 'Employee Updated';
    header("Location:/admin/employees/index.php");

?>