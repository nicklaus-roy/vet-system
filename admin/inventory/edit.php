<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $product_id = $_GET['id'];
    $products = $conn->query("SELECT * FROM products WHERE id = '$product_id'");
    if(!$products){
        die(mysqli_error($conn));
    }
    $product = $products->fetch_assoc();

    $product_categories = $conn->query("SELECT * FROM product_category");

    $suppliers = $conn->query("SELECT * FROM suppliers");

?>

<div class="row">
    <div class="col s12">
        <h5>Edit Product</h5>
        <div class="divider"></div>
        <div class="section">
            <form action="/admin/inventory/update.php" method="POST">
                <input type="hidden" name = "id" value = "<?=$product['id']?>">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id = "name" name = "name" value = "<?=$product['name']?>">
                        <label for="name">Product Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id = "quantity" name = "quantity" value = "<?=$product['quantity']?>">
                        <label for="name">Quantity</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id = "price" name = "price" value = "<?=$product['price']?>">
                        <label for="name">Price</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id = "description" name = "description" value = "<?=$product['description']?>">
                        <label for="name">Description</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id = "reorder_quantity" name = "reorder_quantity" 
                        value = "<?=$product['reorder_quantity']?>">
                        <label for="name">Reorder Quantity</label>
                    </div>
                     <div class="input-field col s6">
                        <select name="product_category_id" id="product_category_id">
                            <?php 
                            while($product_category = $product_categories->fetch_assoc()){
                                if($product_category['id'] == $product['product_category_id']){
                                    echo "<option value = '".$product_category['id']."' selected>".$product_category['name']."</option>";    
                                }
                                else {
                                    echo "<option value='".$product_category['id']."'>".$product_category['name']."</option>";    
                                }    
                            } 
                            ?>    
                        </select>
                        <label for="product_category_id">Product Category</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select name="supplier_id" id="supplier_id">
                            <?php 
                            while($supplier = $suppliers->fetch_assoc()){
                                if($supplier['id'] == $product['supplier_id']){
                                    echo "<option value = '".$supplier['id']."' selected>".$supplier['name']."</option>";    
                                }
                                else {
                                    echo "<option value='".$supplier['id']."'>".$supplier['name']."</option>";    
                                }    
                            } 
                            ?>    
                        </select>
                        <label for="supplier_id">Supplier</label>
                    </div>
                </div>
                <button class="waves-effect waves-light btn" name = "submit">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<?php
    include($root.'/admin/layouts/footer.php');
?>