<?php
    $conn = mysqli_connect('localhost', 'root', 'slsc', 'animal_haven');
    if(mysqli_connect_errno()){
        die("Failed to connect :".mysqli_connect_error());
    }
    $reorder_points = $conn->query("SELECT p.id,p.name, r.transaction_date, sum(s.quantity), sum(s.quantity)/31 as daily_sales, sum(s.quantity)/31*p.lead_time as reorder_quantity,
sum(s.quantity)/31*p.lead_time+p.safety_stock as reorder_point
FROM products p
LEFT JOIN sales s ON p.id = s.product_id 
INNER JOIN official_receipts r ON r.receipt_number = s.receipt_number 
WHERE r.transaction_date >= '2017-09-01' AND r.transaction_date <= '2017-10-08'
GROUP BY s.product_id

      ");
    
  		$products = $conn->query("SELECT * FROM products");
  		while($reorder_point = $reorder_points->fetch_assoc()){
  			$r = $reorder_point['reorder_point'];
        $rq = $reorder_point['reorder_quantity'];
  			$pID = $reorder_point['id'];
  			$conn->query("UPDATE products SET reorder_point = '$r', reorder_quantity = '$rq'
         WHERE id = '$pID'");
  		}
?>