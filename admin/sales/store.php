<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');

    date_default_timezone_set('Asia/Manila');

    $receipt_number = $_POST['receipt_number'];

    $payment_method = $_POST['payment_method'];
    $client_id = $_POST['client_id'];

    $total_sales = $_POST['total_sales'];
    $amount_due = $_POST['amount_due'];
    $transaction_date = date('Y-m-d');

    $discount_type = $_POST['discount_type'];
    $discount_id_num = $_POST['discount_id_num'];

    $amount_given = $_POST['amount_given'];
    $change = $_POST['change'];
    $check_number = $_POST['check_number'];
    $bank = $_POST['bank'];
    $discount = $_POST['discount'];
    $discount = $discount/100;

    $discount_amount = $total_sales-$amount_due;

    if($payment_method == 'cash'){
        

        $receipt = $conn->query("INSERT INTO official_receipts (receipt_number,transaction_date, customer, payment_method, total_sales, amount_given, 
            customer_change, amount_due, discount, discount_type, discount_id_num)
            VALUES ('$receipt_number','$transaction_date', '$client_id', '$payment_method', '$total_sales', '$amount_given', '$change', '$amount_due', 
            '$discount_amount', '$discount_type', '$discount_id_num')");
    }
    else{
        $receipt = $conn->query("INSERT INTO official_receipts (receipt_number, transaction_date, customer, payment_method, total_sales,
        amount_given, customer_change, bank, check_number, amount_due, discount, discount_type, discount_id_num)
            VALUES ('$receipt_number', '$transaction_date', '$client_id', '$payment_method', '$total_sales', '$amount_given', '$change', '$bank', 
            '$check_number', '$amount_due', '$discount_amount', '$discount_type', '$discount_id_num')");
    }


    if(isset($_POST['orders'])){
        $orders = $_POST['orders'];
        foreach($orders as $order){
            $product_id = $order['id'];
            $original_amount = $order['amount'];
            $amount = $original_amount - $original_amount*$discount;
            $quantity = $order['qty'];

            $conn->query("INSERT INTO sales (amount, quantity, product_id, receipt_number, original_amount) 
                VALUES ('$amount', '$quantity', '$product_id', '$receipt_number' , '$original_amount')");

            $cur_qty = $conn->query("SELECT quantity FROM products WHERE id = '$product_id'")->fetch_assoc();
            $new_qty = $cur_qty['quantity'] - $quantity;
            $conn->query("UPDATE products SET quantity = '$new_qty' WHERE id = '$product_id'");
        }
    }


    if(isset($_POST['availed_services'])){
        $availed_services = $_POST['availed_services'];
        foreach($availed_services as $availed_service){
            $service_id = $availed_service['service_id'];
            $price = $availed_service['actual_price'];
            $actual_price = $availed_service['actual_price'] - $availed_service['actual_price']*$discount;
            $pet_id = $availed_service['pet_id'];

            $conn->query("INSERT INTO services_rendered (price, actual_price, service_id, pet_id, receipt_number) 
                VALUES ('$price', '$actual_price', '$service_id', '$pet_id', '$receipt_number')");
        }
    }
    // echo mysqli_error($conn);
    echo $receipt_number;
    exit;
?>