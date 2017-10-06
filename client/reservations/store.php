<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $reservation_date = date("Y-m-d", strtotime($_POST['reservation_date']));
    $client_id = $_POST['client_id'];
    $service_id = $_POST['service_id'];
    $pet_id = $_POST['pet_id'];
    $time_from = date("H:i:s", strtotime($_POST['time_from']));
    
    $time_to_temp = date_create($time_from);

    if($service_id == 'SRV-1'){
        date_add($time_to_temp, date_interval_create_from_date_string("180 minutes"));
    }
    else if($service_id == 'SRV-3'){
        date_add($time_to_temp, date_interval_create_from_date_string("15 minutes"));
    }
    else if($service_id == 'SRV-5'){
        date_add($time_to_temp, date_interval_create_from_date_string("30 minutes"));
    }
    else if($service_id == 'SRV-6'){
        date_add($time_to_temp, date_interval_create_from_date_string("30 minutes"));
    }

    $time_to = date_format($time_to_temp, "H:i:s");

    $reservations_query = $conn->query("INSERT INTO reservations (client_id, service_id, pet_id, time_from, time_to, reservation_date) 
        VALUES('$client_id', '$service_id', '$pet_id','$time_from', '$time_to', '$reservation_date')");
    exit;
?>