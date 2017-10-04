<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    
    $sales_query = $conn->query("SELECT sum(sr.actual_price) total_sales, s.name FROM animal_haven.services s 
LEFT JOIN services_rendered sr ON s.id = sr.service_id  GROUP BY s.id ORDER BY total_sales DESC;");

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