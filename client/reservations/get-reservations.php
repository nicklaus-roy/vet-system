<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $date = date("Y-m-d", strtotime($_GET['reservation_date']));

    $reservations_query = $conn->query("SELECT r.id, time_format(r.time_from, '%r') time_from, time_format(r.time_to, '%r') time_to, r.reservation_date, s.name as service_name, c.id as client_id, concat(c.last_name, ', ',c.first_name) as client_name FROM animal_haven.reservations r INNER JOIN services s ON s.id = r.service_id 
         INNER JOIN clients c ON r.client_id = c.id WHERE reservation_date = '$date' ORDER BY r.time_from");

    $reservations = array();
    while($reservation = $reservations_query->fetch_assoc()){
        $reservations[] = $reservation;
    }

    echo json_encode($reservations);
    
?>