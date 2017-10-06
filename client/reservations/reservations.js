var app_reservations = new Vue({
    el: '#app-reservations',
    data:{
        reservation_date: "",
        reservations: null,
        client_id: "",
        service_id: "",
        reservation_id: "",
        time_from: "",
        auth_user: '',
        auth_user_name: '',
        pet_id: '',
        disabledDates: [],
        time_picker_object: null
    },
    methods:{
        changeTimes(){
            var vm = this;
            vm.disabledDates = [];
            this.reservations.forEach(element => {
                var addHours = 0;
                var addHours2 = 0;
                if(element.time_from.split(":")[2].split(" ")[1] == "PM"){
                    addHours = 12;
                }
                if(element.time_to.split(":")[2].split(" ")[1] == "PM"){
                    addHours2 = 12;
                }
                var disabledDate = {
                    from: [parseInt(element.time_from.split(":")[0])+addHours, parseInt(element.time_from.split(":")[1])],
                    to: [parseInt(element.time_to.split(":")[0])+addHours2, parseInt(element.time_to.split(":")[1])],
                }
                vm.disabledDates.push(disabledDate);
            });
            console.log(vm.disabledDates);
            vm.time_picker_object.set('enable', true);

            vm.time_picker_object.set('disable', vm.disabledDates);
        },
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
                    vm.changeTimes();
                }
            });
        },
        addReservation(){
            var vm = this;
            vm.time_from = $('#time_from').val();
            vm.client_id = $('#client_id').val();
            vm.service_id = $('#service_id').val();
            vm.pet_id = $('#pet_id').val();
            $.post("/client/reservations/store.php", {
                reservation_date: this.reservation_date,
                time_from: this.time_from,
                client_id: this.client_id,
                service_id: this.service_id,
                pet_id: this.pet_id              
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
        this.auth_user = $('#auth_user').val();
        this.auth_user_name = $('#auth_user_name').val();
        var yesterday = new Date((new Date()).valueOf()-1000*60*60*24);
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
                1,7,
                { from: [0,0,0], to: yesterday }
            ],
            onStart: function(){
                var date = new Date();
                this.set('select', [date.getFullYear(), date.getMonth(), date.getDate()]);
            }
        });
        $('.modal').modal();
        this.reservation_date = $('#date_from').val();
        this.getReservations();
        var time_field = $('.timepicker').pickatime({
            interval: 15,
            min:[8,0],
            max:[17,0]
        });
        vm.time_picker_object = time_field.pickatime('picker');
    }
});
