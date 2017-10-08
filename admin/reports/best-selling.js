var app_sales_report = new Vue({
    el: '#app-best-selling',
    data:{
        products:[],
        product_sales:[],
        services:[],
        services_availed:[],
        month:"10"
    },

    mounted(){
        this.getBestSellers();
        this.getMostAvailedProducts();
    },
    methods:{
        reRender(){
            this.products = [];
            this.services = [];
            this.product_sales = [];
            this.services_availed = [];
            this.getBestSellers();
            this.getMostAvailedProducts();
        },
        getBestSellers(){
            var vm = this;
            $.ajax({
                url: '/admin/reports/get-best-selling.php',
                type: 'GET',
                data:{
                    month: vm.month
                },
                dataType: 'json',
                success:function(result){
                    result.forEach(element => {
                        vm.products.push(element.name);
                        vm.product_sales.push(element.total_sales);
                    });
                    vm.renderBestSellersGraph();
                }
            });
        },
        getMostAvailedProducts(){

            var vm = this;
            $.ajax({
                url: '/admin/reports/get-most-availed.php',
                type: 'GET',
                dataType: 'json',
                data:{
                    month: vm.month
                },
                success:function(result){
                    result.forEach(element => {
                        vm.services.push(element.name);
                        vm.services_availed.push(element.total_sales);
                    });
                    vm.renderMostAvailedGraph();
                }

            });
        },
        renderBestSellersGraph(){
            var vm = this;
            var ctx = document.getElementById("bestSellerChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: vm.products,
                    datasets: [{
                        data: vm.product_sales,
                        backgroundColor: [
                            'rgba(255,99,132,0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive:false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }],
                        xAxes:[{
                            ticks:{
                                stepSize: 1,
                                min: 0,
                                autoSkip: false
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Best Sellers',
                        padding:20
                    },
                    legend:{
                        display: false
                    }
                }
            });
        },
        renderMostAvailedGraph(){
            var vm = this;
            var ctx = document.getElementById("mostAvailedChart");

            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: vm.services,
                    datasets: [{
                        data: vm.services_availed,
                        backgroundColor: [
                            'rgba(255,99,132,0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive:false,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    },
                    title: {
                        display: true,
                        text: 'Most Availed Services',
                        padding:20
                    },
                    legend:{
                        display: false
                    }
                }
            });
        }
    }

});
