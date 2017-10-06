<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $id = $_POST['user_id'];
    $new_password = $_POST['new_password'];
    $user = $conn->query("UPDATE users SET password  = '$new_password' WHERE id = '$id'");
    header("Location:/client/reservations/index.php");

?>