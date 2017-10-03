var app_sales = new Vue({
    el: '#app-sales',
    data:{
        order_product: "",
        order_qty: 1,
        orders:[],
        products:null,
        services:null,
        availed_services:[],
        clients:null,
        pets:null,
        actual_price: 0.00,
        total_sales: 0.00,
        amount_given: 0.00,
        change: 0.00,
    },
    methods:{
        addToOrderList(){
            var vm = this;
            vm.order_product = $("#product_id").val();
            var product = this.products.find(element => {
                return element.id == vm.order_product;
            });
            var hasOrder = vm.orders.find(element => {
                return element.id == product.id;
            });
            if(hasOrder){
                hasOrder.qty += parseInt(vm.order_qty);
                hasOrder.amount = parseFloat(hasOrder.price*hasOrder.qty); 
            }
            else{
                vm.orders.push({
                    id: product.id,
                    qty: vm.order_qty,
                    name: product.name,
                    price: product.price,
                    amount: parseFloat(product.price*vm.order_qty)
                });
            }
        },
        removeOrder(order){
            this.orders.splice(this.orders.indexOf(order),1);
        },
        addToServicesAvailed(){
            var vm = this;
            var service_selected = $("#service_id").val();
            var service = this.services.find(element => {
                return element.id == service_selected;
            });
            var pet = this.pets.find(element => {
                return element.id == $('#pet_id').val();
            });
            vm.availed_services.push({
                client_id: $('#client_id').val(),
                service_id: service.id,
                name: service.name,
                price: service.price,
                pet_id: pet.id,
                pet_name: pet.name,
                actual_price: vm.actual_price
            });
            this.actual_price = service.price;
        },
        removeServices(availed_service){
            this.availed_services.splice(this.availed_services.indexOf(availed_service),1);
        }
    },
    computed:{
        hasPets(){
            return this.pets != null && this.pets.length > 0;
        },
        totalSales(){
            var amount = 0.00;
            this.orders.forEach(element => {
                amount+=parseFloat(element.amount);
            });
            this.availed_services.forEach(element => {
                amount+=parseFloat(element.actual_price);
            });
            this.total_sales = amount;
            return amount;
        },
        canPrint(){
            return this.totalSales > 0 && this.amount_given > 0 && this.amount_given >= this.totalSales;
        },
        getChange(){
            var change =  this.amount_given-this.totalSales;
            if(change > 0 && this.totalSales > 0){
                this.change = change;
                return this.amount_given-this.totalSales;
            }
            return 0.0;
        }
    },
    mounted(){
        var vm = this;
        $.ajax({
            url: '/admin/sales/get-products.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                vm.products = data;
            }
        });
        $.ajax({
            url: '/admin/sales/get-services.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                vm.services = data;
            }
        });
        $.ajax({
            url: '/admin/sales/get-clients.php',
            type:'GET',
            dataType:'json',
            success:function(data){
                vm.clients = data;
            }
        });
        $('#service_id').on('change', {vm:vm}, function(){
            var id = $(this).val();
            var service = vm.services.find(element => {
                return element.id == id;
            });
            vm.actual_price = service.price; 
        });
        $('#client_id').on('change', {vm:vm}, function(){
            $.ajax({
                url: '/admin/sales/get-pets.php',
                type:'GET',
                data:{
                    client_id: $(this).val()
                },
                dataType:'json',
                success:function(data){
                    vm.pets = data;
                }
            });
        });
    },
    updated(){
        $('select').material_select();
    }
})