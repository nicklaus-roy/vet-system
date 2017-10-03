<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $services_query = $conn->query("SELECT * FROM services ORDER BY name");

    $services = array();
    while($service = $services_query->fetch_assoc()){
        $services[] = $service;
    }

    echo json_encode($services);

?>