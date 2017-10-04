<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    $payment_method = $_POST['payment_method'];
    $client_id = $_POST['client_id'];
    $total_sales = $_POST['total_sales'];
    $transaction_date = date('Y-m-d');

    if($payment_method == 'cash'){
        $amount_given = $_POST['amount_given'];
        $change = $_POST['change'];

        $receipt = $conn->query("INSERT INTO official_receipts (transaction_date, customer, payment_method, total_sales, amount_given, customer_change)
            VALUES ('$transaction_date', '$client_id', '$payment_method', '$total_sales', '$amount_given', '$change')");
    }
    else{
        $check_number = $_POST['check_number'];
        $bank = $_POST['bank'];
        $receipt = $conn->query("INSERT INTO official_receipts (transaction_date, customer, payment_method, total_sales, bank, check_number)
            VALUES ('$transaction_date', '$client_id', '$payment_method', '$total_sales', '$bank', '$check_number')");
    }

    $receipt_number = $conn->insert_id;


    if(isset($_POST['orders'])){
        $orders = $_POST['orders'];
        foreach($orders as $order){
            $product_id = $order['id'];
            $amount = $order['amount'];
            $quantity = $order['qty'];

            $conn->query("INSERT INTO sales (amount, quantity, product_id, receipt_number) 
                VALUES ('$amount', '$quantity', '$product_id', '$receipt_number')");
        }
    }


    if(isset($_POST['availed_services'])){
        $availed_services = $_POST['availed_services'];
        foreach($availed_services as $availed_service){
            $service_id = $availed_service['service_id'];
            $price = $availed_service['price'];
            $actual_price = $availed_service['actual_price'];
            $pet_id = $availed_service['pet_id'];

            $conn->query("INSERT INTO services_rendered (price, actual_price, service_id, pet_id, receipt_number) 
                VALUES ('$price', '$actual_price', '$service_id', '$pet_id', '$receipt_number')");
        }
    }
    echo $receipt_number;
    exit;
?>