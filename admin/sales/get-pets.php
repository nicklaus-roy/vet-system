<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $client_id = $_GET['client_id'];
    $pets_query = $conn->query("SELECT * FROM pets WHERE client_id = '$client_id' ORDER BY name");

    $pets = array();
    while($pet = $pets_query->fetch_assoc()){
        $pets[] = $pet;
    }

    echo json_encode($pets);

?>