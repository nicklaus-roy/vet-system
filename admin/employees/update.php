<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $employee_id = $_POST['employee_id'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $role = $_POST['role'];

    $conn->query("UPDATE users SET last_name = '$last_name', first_name = '$first_name', 
        middle_name = '$middle_name', role = '$role' WHERE id = '$employee_id'");

    $_SESSION['message'] = 'Employee Updated';
    header("Location:/admin/employees/index.php");

?>