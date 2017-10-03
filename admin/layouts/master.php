<?php
    session_start();
    if(!isset($_SESSION['auth_user'])){
        header("Location:/index.php");
    }
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Animal Haven Veterinary Clinic</title>
    <link rel="stylesheet" href="../../css/materialize.min.css">
    <link rel="stylesheet" href="../../css/admin.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/datatables/datatables.min.css">
</head>
<header>
    <?php 
        include($root.'/admin/layouts/side-nav.php');
        include($root.'/admin/layouts/nav-bar.php');
    ?>
</header>
<main>
    <body>
    
        <?php         
            if(isset($_SESSION['message'])){
                echo "<input type = 'hidden' id = 'message' value = '".$_SESSION['message']."'>";
            }
            unset($_SESSION['message']);
        ?>
    <div style="width:95%;margin-left: auto; margin-right: auto">