<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $total_inventory_value = $conn->query("SELECT sum(quantity*price) as total_value FROM products")->fetch_assoc()['total_value'];
    $total_quantity = $conn->query("SELECT sum(quantity) as total_quantity FROM products")->fetch_assoc()['total_quantity'];
    $product_values = $conn->query("SELECT name, price, quantity, (quantity*price) as total_value FROM products");

    $sales_quantities = $conn->query("SELECT s.product_id, p.name, sum(s.quantity) quantity, r.transaction_date FROM animal_haven.sales s 
        INNER JOIN official_receipts r ON r.receipt_number = s.receipt_number
        INNER JOIN products p ON p.id = s.product_id
        GROUP BY s.product_id, r.transaction_date ORDER BY r.transaction_date DESC");

    $delivered_quantities = $conn->query("SELECT d.date_received, sum(d.quantity) as quantity, p.name FROM deliveries d 
        INNER JOIN products p ON d.product_id = p.id 
        GROUP BY p.id, d.date_received");

    $date_1 = '';
    $date_2 = '';
    $get_dates = isset($_GET['date_from']) && isset($_GET['date_to']);
    if($get_dates){
        $date_from = date('Y-m-d', strtotime($_GET['date_from']));
        $date_to = date('Y-m-d', strtotime($_GET['date_to']));
        $date_1 = $_GET['date_from'];
        $date_2 = $_GET['date_to'];
        $delivered_sold_quantities = $conn->query("SELECT s.product_id, p.name, sum(s.quantity) sold_quantity, d.delivered_quantity
            FROM animal_haven.products p 
            LEFT JOIN sales s ON p.id = s.product_id
            LEFT JOIN official_receipts r ON r.receipt_number = s.receipt_number
            LEFT JOIN 
            (SELECT product_id, sum(quantity) as delivered_quantity FROM deliveries 
                WHERE date_received >= '$date_from' AND date_received <= '$date_to' GROUP BY product_id) d 
            ON d.product_id = p.id
            WHERE r.transaction_date >= '$date_from' AND r.transaction_date <= '$date_to'
            GROUP BY s.product_id");
    }
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Inventory Report
            </h5>
            <p>Total Quantity in Inventory: <?=$total_quantity?></p>
            <p>Total Value of Inventory: <?=$total_inventory_value?></p>
        </div>
        <ul class="tabs">
            <li class="tab col s3"><a href="#product-value" >Product Values</a></li>
            <li class="tab col s3"><a href="#delivered-sold" >Delivery  and Sold Quantities</a></li>
            <li class="tab col s3"><a href="#monthly" >Sold Quantities</a></li>
            <li class="tab col s3"><a href="#yearly" >Delivery Quantities</a></li>
        </ul>
        <div id="product-value" class="col s12">
            <br>
            <table class="bordered custom-table report-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Value</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($product_value = $product_values->fetch_assoc()){?>
                    <tr>
                        <td><?=$product_value['name']?></td>
                        <td><?=$product_value['quantity']?></td>
                        <td><?=$product_value['price']?></td>
                        <td><?=$product_value['total_value']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="monthly" class="col s12">
            <br>
            <table class="bordered custom-table report-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Sold Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($sales_quantity = $sales_quantities->fetch_assoc()){?>
                    <tr>
                        <td><?=$sales_quantity['transaction_date']?></td>
                        <td><?=$sales_quantity['name']?></td>
                        <td><?=$sales_quantity['quantity']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="yearly" class="col s12">
            <br>
            <table class="bordered custom-table report-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Delivered Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($delivered_quantity = $delivered_quantities->fetch_assoc()){?>
                    <tr>
                        <td><?=$delivered_quantity['date_received']?></td>
                        <td><?=$delivered_quantity['name']?></td>
                        <td><?=$delivered_quantity['quantity']?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="delivered-sold" class="col s12">
            <br>
            <form action="./inventory-report.php" method="GET">
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" class="datepicker" name = "date_from" id = "date_from" 
                            style = "cursor:pointer;" value = "<?=$date_1?>"
                            >
                        <label for="date_from">Date:</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" class="datepicker" name = "date_to" id = "date_to" 
                            style = "cursor:pointer;" value = "<?=$date_2?>"
                            >
                        <label for="date_to">Date To:</label>
                    </div>
                    <div class="col s3">
                        <br>
                        <button class="btn">
                            <i class="material-icons">send</i>
                        </button>
                    </div>
                </div>
            </form>
            <table class="bordered custom-table report-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Sold Quantity</th>
                        <th>Delivery Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($get_dates){
                        while($delivered_sold_quantity = $delivered_sold_quantities->fetch_assoc()){
                    ?>
                        <tr>
                            <td><?=$delivered_sold_quantity['name']?></td>
                            <td><?=$delivered_sold_quantity['sold_quantity']?></td>
                            <td><?=$delivered_sold_quantity['delivered_quantity']?></td>
                        </tr>
                    <?php
                        }
                    }
                    ?>
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
        $('.report-table').DataTable();
        $('select').addClass('browser-default');
        $('.datepicker').pickadate();
    });
</script>
<?php
    include($root.'/admin/layouts/footer.php');
?>