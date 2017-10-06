<?php
    session_start();
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $id = $_POST['userId'];
    $user = $conn->query("SELECT * FROM users WHERE id = '$id'")->fetch_assoc();
    if($user['password'] == $_POST['oldPassword']){
        echo "Correct";
    }
    else{
        echo "Incorrect";
    }
    echo mysqli_error($conn);
    exit;

?>