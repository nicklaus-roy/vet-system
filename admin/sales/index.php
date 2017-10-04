<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
?>
<div class="row">
    <div class="col s12">
        <div class="section" id = "app-sales">
            <div class="row">
                <div class="col s1">
                    <h5>
                        Sales
                    </h5>
                </div>
                <div class="col s4">
                    <select name="client_id" id="client_id">
                        <option value="#" selected disabled>Choose a client.</option>
                        <option v-for = "client in clients" :value="client.id">{{ client.first_name }} {{ client.last_name }}</option>
                    </select>
                </div>
            </div>
            
            <div class="row">
                <div class="col s12" style="margin-bottom: 20px">
                  <ul class="tabs">
                    <li class="tab col s3"><a href="#product-sales" class="active">Product Sales</a></li>
                    <li class="tab col s3" :class = "{ disabled: !hasPets}"><a href="#services">Availed Services</a></li>
                    <li class="tab col s3"><a href="#payment-details">Payment Details</a></li>
                  </ul>
                </div>
                <!-- <form action="" class=""> -->
                    <div id="product-sales" class="col s12">
                        <?php include($root.'/admin/sales/sales-orders.php'); ?>
                    </div>
                    <div id="services" class="col s12">
                        <?php include($root.'/admin/sales/sales-services.php'); ?>
                    </div>
                    <div id="payment-details" class="col s12">
                        <?php include($root.'/admin/sales/sales-payment-details.php'); ?>
                    </div>
                <!-- </form> -->
              </div>
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script src="/datatables/datatables.min.js"></script>
<script>
    $(function(){
        $('ul.tabs').tabs();        
    });
</script>
<script src = "sales.js"></script>

<?php
    include($root.'/admin/layouts/footer.php');
?>