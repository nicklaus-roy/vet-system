<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $date = date("Y-m-d", strtotime($_GET['reservation_date']));

    $reservations_query = $conn->query("SELECT r.id, r.service_name, r.client_name, rts.time_slot, r.reservation_date FROM
        (SELECT r.id, r.time_slot, r.reservation_date, s.name as service_name, concat(c.last_name, ', ',c.first_name) as client_name
         FROM animal_haven.reservations r INNER JOIN services s ON s.id = r.service_id 
         INNER JOIN clients c ON r.client_id = c.id WHERE reservation_date = '$date') r
        RIGHT JOIN reservation_time_slots rts ON rts.time_slot = r.time_slot");

    $reservations = array();
    while($reservation = $reservations_query->fetch_assoc()){
        $reservations[] = $reservation;
    }

    echo json_encode($reservations);
    
?>