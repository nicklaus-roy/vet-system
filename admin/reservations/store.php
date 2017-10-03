<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $reservation_date = date("Y-m-d", strtotime($_POST['reservation_date']));
    $client_id = $_POST['client_id'];
    $service_id = $_POST['service_id'];
    $time_slot = $_POST['time_slot'];

    $reservations_query = $conn->query("INSERT INTO reservations (client_id, service_id, time_slot, reservation_date) 
        VALUES('$client_id', '$service_id', '$time_slot', '$reservation_date')");
    exit;
?>