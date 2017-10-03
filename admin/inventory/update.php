<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    if(isset($_POST['submit'])){

        $stmt = $conn->prepare("UPDATE products SET name = ?, quantity = ?, price = ?, description = ?, 
            reorder_quantity = ?, product_category_id = ?, supplier_id = ? WHERE id = ?");
        $stmt->bind_param("sidsiiii", $_POST['name'], $_POST['quantity'], $_POST['price'], $_POST['description'], $_POST['reorder_quantity'],
                         $_POST['product_category_id'], $_POST['supplier_id'], $_POST['id']);
        $stmt->execute();        
    }
    $_SESSION['message'] = "Product was Updated.";
    header("Location:/admin/inventory/index.php");
?>
