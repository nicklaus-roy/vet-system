<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $last_id = $conn->query("SELECT CONVERT(SUBSTRING(id, 5), UNSIGNED INTEGER) as pet_id, id FROM pets ORDER BY pet_id DESC")->fetch_assoc();
    $new_id = explode('-',$last_id['id'])[1]+1;
    $last_id = explode('-',$last_id['id'])[0]."-".$new_id;


    $pet_name = $_POST['pet_name'];
    $pet_breed = $_POST['pet_breed'];
    $pet_species = $_POST['pet_species'];
    $client_id = $_POST['client_id'];
    $conn->query("INSERT INTO pets (id, name, species, client_id, breed) 
    	VALUES ('$last_id','$pet_name', '$pet_species', '$client_id', '$pet_breed')");

    echo mysqli_error($conn);
?>