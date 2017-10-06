<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $last_name = $_POST['last_name'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $contact_number = $_POST['contact_number'];
    $pet_name = $_POST['pet_name'];
    $pet_species = $_POST['pet_species'];

    $conn->query("INSERT INTO clients (contact_number, last_name, first_name, middle_name) 
        VALUES('$contact_number', '$last_name', '$first_name', '$middle_name')");
    $client_id = $conn->insert_id;

    $last_id = $conn->query("SELECT id FROM pets ORDER BY id DESC")->fetch_assoc();
    $last_id = explode('-',$last_id['id'])[0].'-'.(explode('-',$last_id['id'])[1]+1);


    $conn->query("INSERT INTO pets (id, name, species, client_id) VALUES ('$last_id','$pet_name', '$pet_species', '$client_id')");

    if(isset($_POST['create_user_account'])){
        $username = $first_name." ".$last_name;
        $conn->query("INSERT INTO users (username, password, role, first_name, last_name, middle_name) 
            VALUES ('$username','password', 'client', '$first_name', '$last_name', '$middle_name')");
        $user_id = $conn->insert_id;
        $conn->query("UPDATE clients SET user_id = '$user_id' WHERE id = '$client_id'");

    }
    $_SESSION['message'] = 'Client Added';
    header("Location:/admin/client/index.php");

?>