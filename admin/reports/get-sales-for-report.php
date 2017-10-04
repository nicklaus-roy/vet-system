<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    if($_GET['selectedChart'] == 'monthlyChart'){
        $sales_query = $conn->query("SELECT SUM(total_sales) sales, monthname(transaction_date) as sales_month 
            FROM official_receipts GROUP BY sales_month");
    }
    else{ 
        $sales_query = $conn->query("SELECT SUM(total_sales) sales, year(transaction_date) sales_year FROM official_receipts GROUP BY sales_year;");
    }

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