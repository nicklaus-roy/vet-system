<?php
    $conn = mysqli_connect('localhost', 'root', '', 'animal_haven');
    if(mysqli_connect_errno()){
        die("Failed to connect :".mysqli_connect_error());
    }
    $reorder_points = $conn->query("SELECT p.id, p.name, AVG(s.quantity), avg(s.quantity)*p.lead_time as reorder_point 
        FROM official_receipts r INNER JOIN sales s ON r.receipt_number = s.receipt_number INNER JOIN products p ON s.product_id = p.id GROUP BY s.product_id");
    
  		$products = $conn->query("SELECT * FROM products");
  		while($reorder_point = $reorder_points->fetch_assoc()){
  			$r = $reorder_point['reorder_point'];
  			$pID = $reorder_point['id'];
  			$conn->query("UPDATE products SET reorder_point = '$r' WHERE id = '$pID'");
  		}
?>