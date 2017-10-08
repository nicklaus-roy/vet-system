<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $month = $_GET['month'];
    $sales_query = $conn->query("SELECT sum(s.quantity) total_sales, p.name FROM animal_haven.products p 
        LEFT JOIN sales s ON p.id = s.product_id 
        LEFT JOIN official_receipts rc ON rc.receipt_number = s.receipt_number
        WHERE MONTH(rc.transaction_date) = $month
        GROUP BY p.id ORDER BY total_sales DESC;");

    $sales = array();
    if(!$sales_query){
        echo "";
    }
    else{
        while($r = $sales_query->fetch_assoc()){
            $sales[] = $r;
        }
        echo json_encode($sales);
    }
    
?>