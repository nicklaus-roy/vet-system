<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    $contact_number = $_POST['contact_number'];
    $address = $_POST['address'];
    $conn->query("UPDATE clinic_details SET contact_number = '$contact_number', address = '$address'");
    $_SESSION['message'] = "Clinic Details were Updated.";
    header("Location:/admin/messages/index.php");
?>
