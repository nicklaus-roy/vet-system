<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $reservation_date = date("Y-m-d", strtotime($_POST['reservation_date']));
    $client_id = $_POST['client_id'];
    $service_id = $_POST['service_id'];
    $time_from = date("H:i:s", strtotime($_POST['time_from']));
    $time_to = date("H:i:s", strtotime($_POST['time_to']));
    var_dump($_POST['time_from']);
    var_dump(strtotime($_POST['time_from']));

    $reservations_query = $conn->query("INSERT INTO reservations (client_id, service_id, time_from, time_to, reservation_date) 
        VALUES('$client_id', '$service_id', '$time_from', '$time_to', '$reservation_date')");
    exit;
?>