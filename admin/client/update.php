<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $client_id = $_POST['client_id'];
    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $contact_number = $_POST['contact_number'];

    $conn->query("UPDATE clients SET contact_number = '$contact_number', last_name = '$last_name', first_name = '$first_name', 
        middle_name = '$middle_name' WHERE id = '$client_id'");

    if(isset($_POST['create_user_account'])){
        $username = $first_name." ".$last_name;
        $conn->query("INSERT INTO users (username, password, role, first_name, last_name, middle_name) 
            VALUES ('$username','password', 'client', '$first_name', '$last_name', '$middle_name')");
        $user_id = $conn->insert_id;
        $conn->query("UPDATE clients SET user_id = '$user_id' WHERE id = '$client_id'");

    }

    $_SESSION['message'] = 'Client Updated';
    header("Location:/admin/client/index.php");

?>