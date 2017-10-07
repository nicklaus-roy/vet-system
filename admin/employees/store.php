<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

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

    $username = $first_name." ".$last_name;
    $conn->query("INSERT INTO users (username, password, role, first_name, last_name, middle_name, is_active) 
        VALUES ('$username','password', '$role', '$first_name', '$last_name', '$middle_name', '$is_active')");
    $user_id = $conn->insert_id;

    $_SESSION['message'] = 'Employee Added';
    header("Location:/admin/employees/index.php");

?>