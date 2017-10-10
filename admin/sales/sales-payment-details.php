<div class="row">
    <div class="col s3">
        <label for="payment_method">Payment Method: </label>
        <select name = "payment_method" id = "payment_method" class="browser-default" v-model = "payment_method">
            <option value="" disabled selected>Choose a payment method</option>
            <option value="cash">Cash</option>
            <option value="check">Cheque</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="input-field col s3">
         <input type="number" name = "receipt_number" id = "receipt_number" v-model = "receipt_number" @blur = "checkReceiptNumber()">
         <label for="receipt_number">Receipt Number:</label>
     </div>
     <div class="input-field col s2" >
         <input type="number" name = "amount_given" id = "amount_given" v-model = "amount_given">
         <label for="amount_given">Amount Given:</label>
     </div>
     <div class="input-field col s1" >
         <input type="number" name = "discount_percent" id = "discount_percent" v-model.number = "discount_percent">
         <label for="discount_percent">Discount Percent</label>
     </div>
     <div class="col s3">
         <label for="tin_sr">Discount Type: </label>
         <select name="discount_type" id="discount_type" class="browser-default" v-model = "discount_type">
             <option value="none" selected>None</option>
             <option value="Sr. Citizen">Sr. Citizen</option>
             <option value="OSCO/ PWD">OSCO/ PWD</option>
         </select>
     </div>
     <div class="input-field col s3">
         <input type="text" name = "discount_id_num" id = "discount_id_num" v-model = "discount_id_num">
         <label for="discount_id_num">ID Number: </label>
     </div>   
   
    
</div>
<div class="row">
    <div class="input-field col s3">
         <input type="number" name = "total_sales" id = "total_sales" :value = "totalSales" readonly>
         <label for="total_sales">Total Sales:</label>
     </div>  
     
    <div class="input-field col s3" >
        <input type="number" name = "amount_due" id = "amount_due" readonly :value = "getAmountDue">
        <label for="amount_due">Amount Due:</label>
    </div>
    <div class="input-field col s3">
        <input type="text" name = "change" id = "change" readonly :value = "getChange">
        <label for="change">Change:</label>
    </div>
</div>
 <div class="row">
    <div class="col s3" v-show = "payment_method == 'check'">
        <label for="bank">Bank: </label>
        <select name = "bank" id = "bank" v-model = "bank" class="browser-default">
            <option value="BDO Unibank">BDO Unibank</option>
            <option value="Metrobank">Metrobank</option>
            <option value="Land Bank">Land Bank</option>
            <option value="BPI">BPI</option>
            <option value="Security Bank">Security Bank</option>
            <option value="PNB">PNB</option>
            <option value="Chinabank">Chinabank</option>
            <option value="DBP">DBP</option>
            <option value="Unionbank">Unionbank</option>
            <option value="RCBC">RCBC</option>
        </select>
    </div>
    <div class="input-field col s3" v-show = "payment_method == 'check'">
        <input type="number" name = "check_number" id = "check_number" v-model = "check_number">
        <label for="check_number">Cheque No.:</label>
    </div>
</div>
<div class="row">
    <div class="input-field col-s3">
        <button class="btn" :class = "{disabled: !canPrint}" @click = "submitSales()">
            <i class="material-icons left">print</i>
            Receipt
        </button>
    </div>
</div>
