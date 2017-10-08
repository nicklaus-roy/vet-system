<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $conn->query("UPDATE products SET quantity = quantity+".$quantity." WHERE id = '$product_id'");

    $_SESSION['message'] = "Product Quantity Updated.";
    header("Location:/admin/inventory/index.php");
?>
