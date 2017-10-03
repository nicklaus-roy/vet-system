<?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    include($root.'/shared/db_connect.php');
    $products_query = $conn->query("SELECT * FROM products ORDER BY name");

    $products = array();
    while($product = $products_query->fetch_assoc()){
        $products[] = $product;
    }

    echo json_encode($products);

?>