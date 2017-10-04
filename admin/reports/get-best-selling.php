<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    
    $sales_query = $conn->query("SELECT sum(s.amount) total_sales, p.name FROM animal_haven.products p 
        LEFT JOIN sales s ON p.id = s.product_id GROUP BY p.id ORDER BY total_sales DESC;");

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