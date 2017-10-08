<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $_SESSION['inventory'] = 'active';
    $supplier_id = $_GET['supplier_id'];
    $supplier_name = $conn->query("SELECT * FROM suppliers WHERE id = '$supplier_id'")->fetch_assoc()['name'];

    $product_list = $conn->query("SELECT p.*, s.name as supplier_name FROM products p
        INNER JOIN suppliers s ON p.supplier_id = s.id
        WHERE p.supplier_id = '$supplier_id' ORDER BY p.name");
?>
<style>
    @media print {
      body * {
        visibility: hidden;
      }
      #print-form #details{
       display: block!important;
      }

      #print-form, #print-form * {
        visibility: visible!important;
      }
      #print-form {
        position: absolute;
        left: 10;
        top: 0;
      }
    }
</style>
<div class="row" id = "app-order-form">
    <div class="col s12">
        <div class="section">
            <h5>
                Order Form
            </h5>
            <div class="row">
                <div class="input-field col s3">
                    <select name = "product_id" id = "product_id">
                    <?php while($list_item = $product_list->fetch_assoc()) { ?>
                        <option value="<?=$list_item['id']?>"
                            data-name = "<?=$list_item['name']?>"><?=$list_item['name']?></option>
                    <?php } ?>
                    </select>
                    <label for="product_id">Product</label>
                </div>
                <div class="input-field col s3">
                    <input type="number" name = "quantity" id = "quantity" v-model.number = "quantity">
                    <label for="quantity">Quantity</label>
                </div>
                <div class="col s1">
                    <br>
                    <button class="btn-floating" @click = "addOrder">
                        <i class="material-icons">add</i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div id="print-form">
                        <div>
                            <h5 style="font-size: 18px">Supplier: <?=$supplier_name?></h5>
                        </div>
                        <div style="visibility: hidden; display: none" id = "details">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>Requestor</td>
                                        <td>ANIMAL HAVEN VETERINARY CLINIC</td>
                                    </tr>
                                    <tr>
                                        <td>Contact Person</td>
                                        <td>GINA V. MAGALGALIT - Prop.</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>ID 35 Km 6, Betag, La Trinidad, Benguet</td>
                                    </tr>
                                    <tr>
                                        <td>Contact Number:</td>
                                        <td>09998273392</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                        </div>
                        <div style="visibility: hidden">
                            May we request the following items from your store.
                        </div>
                        <br>
                        <table class="highlight bordered">
                            <thead>
                                <tr>
                                    <th>Item Name</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for = "order in orders">
                                    <td>{{ order.product_name }}</td>
                                    <td>{{ order.quantity }}</td>
                                </tr>
                            </tbody>
                        </table>                
                    </div>
                    <div class="right">
                        <br>
                        <button class="btn" onclick = "window.print()">
                            <i class="material-icons left">print</i>
                            Order Form
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script type="text/javascript">
    var app_order_form = new Vue({
        el:'#app-order-form',
        data:{
            orders:[],
            product_id:"",
            product_name: "",
            quantity:1
        },
        methods:{
            addOrder(){
                var vm = this;
                vm.product_id = $('#product_id').val();
                vm.product_name = $("#product_id option[value="+vm.product_id+"]").text();
                var hasOrder = vm.orders.find(element => {
                    return element.product_id == vm.product_id;
                });
                if(hasOrder){
                    hasOrder.quantity += parseInt(vm.quantity);
                }
                else{
                    vm.orders.push({
                        product_id:vm.product_id,
                        product_name:vm.product_name,
                        quantity:vm.quantity
                    });
                }
            }
        }
    });
</script>
<?php
    include($root.'/admin/layouts/footer.php');
?>