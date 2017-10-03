<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $_SESSION['inventory'] = 'active';

    $products = $conn->query("SELECT p.*, pc.name as category, s.name supplier FROM products p 
        INNER JOIN product_category pc ON p.product_category_id = pc.id
        INNER JOIN suppliers s ON p.supplier_id = s.id ORDER BY p.name");
    if(!$products){
        die(mysqli_error($conn));
    }
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Inventory
                <a href = "/admin/inventory/create.php" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">add</i>
                </a>
            </h5>
            <table id = "inventory-table" class="highlight custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Reorder Qty</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($product = $products->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$product['name']?></td>
                            <td><?=$product['description']?></td>
                            <td><?=$product['price']?></td>
                            <td><?=$product['quantity']?></td>
                            <td><?=$product['reorder_quantity']?></td>
                            <td><?=$product['category']?></td>
                            <td><?=$product['supplier']?></td>
                            <td>
                                <a href="./edit.php?id=<?=$product['id']?>" title = "Edit">
                                    <i class="material-icons">edit</i>
                                </a> 
                                <a href="./delete.php" title = "Delete">
                                    <i class="material-icons">delete</i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script src="/datatables/datatables.min.js"></script>
<script>
    $(function(){
        $('#inventory-table').DataTable();
    });
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>