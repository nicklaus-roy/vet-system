<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $last_id = $conn->query("SELECT id FROM pets ORDER BY id DESC")->fetch_assoc();
    $last_id = explode('-',$last_id['id'])[0].'-'.(explode('-',$last_id['id'])[1]+1);

    $pet_name = $_POST['pet_name'];
    $pet_species = $_POST['pet_species'];
    $client_id = $_POST['client_id'];
    $conn->query("INSERT INTO pets (id, name, species, client_id) VALUES ('$last_id','$pet_name', '$pet_species', '$client_id')");
?>