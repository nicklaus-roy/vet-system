<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $clients_query = $conn->query("SELECT * FROM clients ORDER BY first_name");

    $clients = array();
    while($client = $clients_query->fetch_assoc()){
        $clients[] = $client;
    }

    echo json_encode($clients);

?>