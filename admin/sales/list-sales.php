<?php
    include('../layouts/master.php');
    if(isset($_GET['date_from'])){
        if(isset($_GET['date_to'])){
            $date_from = date('Y-m-d', strtotime($_GET['date_from']));
            $date_to = date('Y-m-d', strtotime($_GET['date_to']));
            $sales = $conn->query("SELECT r.transaction_date, concat(c.last_name,', ',c.first_name) full_name, s.amount, p.name, r.receipt_number FROM animal_haven.official_receipts r 
                INNER JOIN sales s ON s.receipt_number = r.receipt_number 
                INNER JOIN products p ON p.id = s.product_id 
                INNER JOIN clients c ON c.id = r.customer WHERE r.transaction_date >= '$date_from'
                AND r.transaction_date <= '$date_to'");
            $services_rendered = $conn->query("SELECT r.transaction_date, concat(c.last_name,', ',c.first_name) full_name, 
                sr.actual_price, s.name, r.receipt_number FROM animal_haven.official_receipts r 
                INNER JOIN services_rendered sr ON sr.receipt_number = r.receipt_number 
                INNER JOIN clients c ON c.id = r.customer 
                INNER JOIN services s ON s.id = sr.service_id WHERE 
                r.transaction_date >= '$date_from' AND r.transaction_date <= '$date_to'");
        }
    }
    echo mysqli_error($conn);

?>
<div class="row" id = "app-reservations">
    <div class="col s12">
        <div class="section">
            <h5>
                Sales
            </h5>
        </div>
        <div class="divider"></div>
        <div class="row">
            <form action="/admin/sales/list-sales.php" method = "GET">
                <div class="input-field col s3">
                    <input type="text" class="datepicker" name = "date_from" id = "date_from" 
                        style = "cursor:pointer;" 
                        >
                    <label for="date_from">Date:</label>
                </div>
                 <div class="input-field col s3">
                    <input type="text" class="datepicker" name = "date_to" id = "date_to" 
                        style = "cursor:pointer;" 
                        >
                    <label for="date_to">Date:</label>
                </div>
                <div class="col s2">
                    <br>
                    <button class="btn-floating blue">
                        <i class="material-icons">send</i>
                    </button>
                </div>
            </form>            
        </div>
        <div>
            <table class="highlight bordered custom-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product/Service</th>
                        <th>Client</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        if(isset($sales)){
                            while($sale = $sales->fetch_assoc()){?>
                        <tr>
                            <td><?=$sale['transaction_date']?></td>
                            <td><?=$sale['name']?></td>
                            <td><?=$sale['full_name']?></td>
                            <td><?=$sale['amount']?></td>
                        </tr>
                   <?php }
                        }
                   ?>
                   <?php if(isset($services_rendered)){
                        while($service_rendered = $services_rendered->fetch_assoc()){?>
                        <tr>
                            <td><?=$service_rendered['transaction_date']?></td>
                            <td><?=$service_rendered['name']?></td>
                            <td><?=$service_rendered['full_name']?></td>
                            <td><?=$service_rendered['actual_price']?></td>
                        </tr>
                   <?php }
                    }?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php
    include('../layouts/scripts.php');
?>
<script>
    $(function(){
        $('.datepicker').pickadate({
            closeOnSelect: true
        });
    });
</script>
<?php
    include('../layouts/footer.php');
?>