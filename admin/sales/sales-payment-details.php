<div class="row">
   <div class="input-field col s3">
        <input type="number" name = "total_sales" id = "total_sales" :value = "totalSales" readonly>
        <label for="total_sales">Total Sales</label>
    </div>  
    <div class="input-field col s3">
        <input type="number" name = "amount_given" id = "amount_given" v-model = "amount_given">
        <label for="amount_given">Amount Given</label>
    </div>
    <div class="input-field col s3">
        <input type="text" name = "change" id = "change" readonly :value = "getChange">
        <label for="change">Change</label>
    </div>
    <div class="input-field col-s3">
        <button class="btn" :class = "{disabled: !canPrint}">
            <i class="material-icons left">print</i>
            Receipt
        </button>
    </div>
   
</div>
