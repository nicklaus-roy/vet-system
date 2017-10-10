<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $receipt_number = $_GET['receipt_number'];
    if(!is_null($conn->query("SELECT * FROM official_receipts WHERE receipt_number = '$receipt_number'")->fetch_assoc())){
    	echo "Receipt Number already exists";
    }
    exit;
?>