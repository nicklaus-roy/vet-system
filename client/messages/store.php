<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    date_default_timezone_set('Asia/Manila');
    $client_id = $_POST['client_id'];
    $message_body = $_POST['message'];
    $subject = $_POST['subject'];
    $date_time_sent = date("Y-m-d H:i:s");

    $reservations_query = $conn->query("INSERT INTO messages (client_id, message_body, subject, date_time_sent) 
        VALUES('$client_id', '$message_body', '$subject', '$date_time_sent')");
    $_SESSION['message'] = "Message Sent.";
    header("Location:/client/messages/create.php");
?>