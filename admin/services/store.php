<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    if(isset($_POST['submit'])){
        $last_id = $conn->query("SELECT id FROM services ORDER BY id DESC")->fetch_assoc();
        $last_id = explode('-',$last_id['id'])[0].'-'.(explode('-',$last_id['id'])[1]+1);

        $stmt = $conn->prepare("INSERT INTO services (id, name, price)
             VALUES (?, ?, ?)");
        
        $stmt->bind_param("ssd", $last_id, $_POST['name'], $_POST['price']);
        $stmt->execute();        
    }
    $_SESSION['message'] = "Service was Added.";
    header("Location:/admin/services/index.php");
?>
