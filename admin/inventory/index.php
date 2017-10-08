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
    $product_list = $conn->query("SELECT * FROM products ORDER BY name");

    $suppliers = $conn->query("SELECT * FROM suppliers ORDER BY name");


    $total_number_of_product = $conn->query("SELECT sum(quantity) as total_qty FROM products")->fetch_assoc();
    $total_value = $conn->query("SELECT sum(quantity*price) as total_value FROM products")->fetch_assoc();
?>
<style>
    .critical-level{
        background-color: rgba(255,0,0,0.5)!important;
    }
</style>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Inventory
                <a href = "/admin/inventory/create.php" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">add</i>
                </a>

            </h5>
            <div class="fixed-action-btn horizontal click-to-toggle" 
                style="top:80px">
                <a class="btn-floating btn-large red">
                  <i class="large material-icons">mode_edit</i>
                </a>
                <ul>
                  <li>
                    <a href = "#add-delivery-modal" class="btn-floating blue modal-trigger" title = "Add Delivery">
                        <i class="material-icons">local_shipping</i>
                    </a>
                    </li>
                  <li><a href = "#order-form-modal"  class="btn-floating green modal-trigger" 
                        title = "Order Form"><i class="material-icons">description</i>
                        </a>
                    </li>
                </ul>
              </div> 
              <div id="add-delivery-modal" class="modal modal-fixed-footer">
                    <form action="./update-qty.php" method = "POST">
                        <div class="modal-content">
                            <h4>Add Product Inventory</h4>
                            <div class="input-field col s5">
                                <select name = "product_id" id = "product_id">
                                <?php while($list_item = $product_list->fetch_assoc()) { ?>
                                    <option value="<?=$list_item['id']?>"><?=$list_item['name']?></option>
                                <?php } ?>
                                </select>
                                <label for="product_id">Product</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" name = "quantity" id = "quantity">
                                <label for="quantity">Quantity</label>
                            </div>
                        </div>  
                        <div class="modal-footer">
                            <button class="modal-action modal-close waves-effect waves-green btn-flat">Add</button>
                        </div>
                    </form>
                </div>
                <div id="order-form-modal" class="modal modal-fixed-footer">
                    <form action="./order-form.php" method = "GET" target = "_blank">
                          <div class="modal-content">
                              <h4>Order form for Supplier</h4>
                              <div class="col s6">
                                  <label for="supplier_id">Supplier</label>
                                  <select name = "supplier_id" id = "supplier_id" class="browser-default">
                                  <?php while($supplier = $suppliers->fetch_assoc()) { ?>
                                      <option value="<?=$supplier['id']?>"><?=$supplier['name']?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                          </div>  
                          <div class="modal-footer">
                              <button class="modal-action modal-close waves-effect waves-green btn-flat">Go</button>
                          </div>
                    </form>
                  </div>        
            <table id = "inventory-table" class="highlight custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Inventory Total Amount</th>
                        <th>Reorder Qty</th>
                        <th>Reorder Point</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($product = $products->fetch_assoc()){ ?>
                        <tr class = "<?php echo $product['quantity'] <= $product['reorder_quantity'] ? "critical-level":""?>">
                            <td><?=$product['name']?></td>
                            <td><?=$product['description']?></td>
                            <td><?=$product['price']?></td>
                            <td><?=$product['quantity']?></td>
                            <td><?=$product['price']*$product['quantity']?>.00</td>
                            <td><?=$product['reorder_quantity']?></td>
                            <td>
                                <?=$product ['reorder_point']?>
                                </td>
                            
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
        $('.modal').modal();
    });
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>