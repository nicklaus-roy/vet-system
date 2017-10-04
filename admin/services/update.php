<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    if(isset($_POST['submit'])){

        $stmt = $conn->prepare("UPDATE services SET name = ?, price = ? WHERE id = ?");
        $stmt->bind_param("sdi", $_POST['name'], $_POST['price'], $_POST['id']);
        $stmt->execute();        
    }
    $_SESSION['message'] = "Service was Updated.";
    header("Location:/admin/services/index.php");
?>
