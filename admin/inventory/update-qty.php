<?php
    session_start();
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    


    $cur_date = date("Y-m-d");
    $last_month_date = date("Y-m-d", strtotime("-31 days"));

    $reorder_details = $conn->query("SELECT p.id,p.name, r.transaction_date, sum(s.quantity), sum(s.quantity)/31 as daily_sales, sum(s.quantity)/31*p.lead_time as reorder_quantity,
        sum(s.quantity)/31*p.lead_time+p.safety_stock as reorder_point
        FROM products p
        LEFT JOIN sales s ON p.id = s.product_id 
        INNER JOIN official_receipts r ON r.receipt_number = s.receipt_number 
        WHERE r.transaction_date >= '$last_month_date' AND r.transaction_date <= '$cur_date'
        AND p.id = '$product_id'")->fetch_assoc();

    $reorder_quantity = $reorder_details['reorder_quantity'];
    $reorder_point = $reorder_details['reorder_point'];

    $conn->query("UPDATE products SET quantity = quantity+".$quantity.", reorder_point = '$reorder_point',
        reorder_quantity = '$reorder_quantity' WHERE id = '$product_id'");

    $_SESSION['message'] = "Product Quantity Updated.";
    header("Location:/admin/inventory/index.php");
?>
