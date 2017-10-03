<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    if(isset($_POST['submit'])){

        $stmt = $conn->prepare("INSERT INTO products (name, quantity, price, description, reorder_quantity, product_category_id, supplier_id)
             VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("sidsiii", $_POST['name'], $_POST['quantity'], $_POST['price'], $_POST['description'], $_POST['reorder_quantity'],
                         $_POST['product_category_id'], $_POST['supplier_id']);
        $stmt->execute();        
    }
    $_SESSION['message'] = "Product was Added.";
    header("Location:/admin/inventory/index.php");
?>
