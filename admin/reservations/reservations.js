
var app_reservations = new Vue({
    el: '#app-reservations',
    data:{
        reservation_date: "",
        reservations: null,
        time_slot: "",
        client_id: "",
        service_id: "",
        reservation_id: ""
    },
    methods:{
        getReservations(){
            this.reservation_date = $('#date_from').val();
            var vm = this;
            $.ajax({
                url:'./get-reservations.php',
                type:'GET',
                data:{
                    reservation_date: this.reservation_date
                },
                dataType: 'json',
                success:function(result){
                    vm.reservations = result;
                }
            });
        },
        addSelectedData(time_slot){
            this.time_slot = time_slot;
            Materialize.updateTextFields();
        },
        addReservation(){
            var vm = this;
            vm.client_id = $('#client_id').val();
            vm.service_id = $('#service_id').val();
            $.post("/admin/reservations/store.php", {
                reservation_date: this.reservation_date,
                time_slot: this.time_slot,
                client_id: this.client_id,
                service_id: this.service_id,
            }).done(function(data){
                Materialize.toast("Reservation added.", 2000);
                vm.getReservations();
            });
        },
        pickReservation(reservation_id){
            this.reservation_id = reservation_id;
        },
        removeReservation(){
            var vm = this;
            $.post('/admin/reservations/delete.php', {id: this.reservation_id}).done(function(){
                Materialize.toast("Reservation removed.", 2000);
                vm.getReservations();
            });
        }
    },
    mounted(){
        var vm = this;
        $('.datepicker').pickadate({
           selectMonths: true, // Creates a dropdown to control month
           selectYears: 15, // Creates a dropdown of 15 years to control year,
           today: 'Today',
           clear: 'Clear',
           close: 'Ok',
           closeOnSelect: true,
           format: 'dddd, mmm d, yyyy', // Close upon selecting a date,
           format_submit: 'yyyy-mm-dd',
           disable: [
                1,7
            ],
            onStart: function(){
                var date = new Date();
                this.set('select', [date.getFullYear(), date.getMonth(), date.getDate()]);
            }
        });
        $('.modal').modal();
        this.reservation_date = $('#date_from').val();
        this.getReservations();
    }
});