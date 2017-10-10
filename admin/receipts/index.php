<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
    $receipts = $conn->query("SELECT r.*, concat(c.first_name, ' ',c.last_name) as customer_name 
        FROM official_receipts r LEFT JOIN clients c ON r.customer = c.id");
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Official Receipts
            </h5>       
            <table id = "receipts-table" class="highlight custom-table">
                <thead>
                    <tr>
                        <th>OR Num</th>
                        <th>Transaction Date</th>
                        <th>Customer</th>
                        <th>Total Sales</th>
                        <th>Discount</th>
                        <th>Amount Due</th>
                        <th>Amount Given</th>
                        <th>Change</th>
                        <th>Payment Method</th>
                        <th>Bank</th>
                        <th>Check Num</th>
                        <th>Discount Type</th>
                        <th>Discount ID Num</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($receipt = $receipts->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$receipt['receipt_number']?></td>
                            <td><?=date_format(date_create($receipt['transaction_date']), "M d, Y")?></td>
                            <td><?=$receipt['customer_name']?></td>
                            <td><?=$receipt['total_sales']?></td>
                            <td><?=$receipt['discount']?></td>
                            <td><?=$receipt['amount_due']?></td>
                            <td><?=$receipt['amount_given']?></td>
                            <td><?=$receipt['customer_change']?></td>
                            <td><?=$receipt['payment_method']?></td>
                            <td><?=$receipt['bank']?></td>
                            <td><?=$receipt['check_number']?></td>
                            <td><?=$receipt['discount_type']?></td>
                            <td><?=$receipt['discount_id_num']?></td>
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
        $('#receipts-table').DataTable({
        });
        $('select').addClass('browser-default');
    });
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>