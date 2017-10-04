<div class="row">
    <div class="col s3">
        <label for="payment_method">Payment Method: </label>
        <select name = "payment_method" id = "payment_method" class="browser-default" v-model = "payment_method">
            <option value="" disabled selected>Choose a payment method</option>
            <option value="cash">Cash</option>
            <option value="check">Check</option>
        </select>
    </div>
</div>
<div class="row">
   <div class="input-field col s3">
        <input type="number" name = "total_sales" id = "total_sales" :value = "totalSales" readonly>
        <label for="total_sales">Total Sales:</label>
    </div>  
    <div class="input-field col s3" v-show = "payment_method == 'cash'">
        <input type="number" name = "amount_given" id = "amount_given" v-model = "amount_given">
        <label for="amount_given">Amount Given:</label>
    </div>
    <div class="input-field col s3" v-show = "payment_method == 'cash'">
        <input type="text" name = "change" id = "change" readonly :value = "getChange">
        <label for="change">Change:</label>
    </div>
    <div class="input-field col s3" v-show = "payment_method == 'check'">
        <input type="number" name = "check_number" id = "check_number" v-model = "check_number">
        <label for="check_number">Check No.:</label>
    </div>
    <div class="input-field col s3" v-show = "payment_method == 'check'">
        <input type="text" name = "bank" id = "bank" v-model = "bank">
        <label for="bank">Bank: </label>
    </div>
    <div class="input-field col-s3">
        <button class="btn" :class = "{disabled: !canPrint}" @click = "submitSales()">
            <i class="material-icons left">print</i>
            Receipt
        </button>
    </div>
</div>
