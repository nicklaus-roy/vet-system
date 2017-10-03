<div class="row">
    <div class="input-field col s3">
        <select id = "product_id" name = "product_id">
            <option v-for = "product in products" :value = "product.id">{{ product.name }}</option>
        </select>
        <label for="product_id">Product</label>
    </div> 
    <div class="input-field col s3">
        <input type="number" id = "quantity" v-model.number = "order_qty">
        <label for="quantity">Quantity</label>
    </div>
    <div class="input-field col s2">
        <button class = "btn" @click = "addToOrderList()" v-if = "order_qty>0">
            <i class="material-icons">add</i>
        </button>
    </div> 
</div>
<table class="bordered highlight custom-table">
    <thead>
        <tr>
            <th>Qty</th>
            <th>Product</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for = "order in orders">
            <td>{{ order.qty }}</td>
            <td>{{ order.name }}</td>
            <td>{{ order.price }}</td>
            <td>{{ order.amount }}</td>
            <td>
                <i class="material-icons" style="cursor:pointer" @click = "removeOrder(order)">clear</i>
            </td>
        </tr>
    </tbody>
</table>