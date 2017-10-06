<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $reservation_id = $_POST['id'];

    $reservations_query = $conn->query("DELETE FROM reservations WHERE id = '$reservation_id'");
    exit;
?>