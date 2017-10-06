var app_pets = new Vue({
    el: '#app-pets',
    data:{
        pet_name: '',
        pet_species:'',
        client_id: ''
    },
    mounted(){
        this.client_id = $('#client_id').val();
    },
    methods:{
        addPet(){
            var vm = this;
            $.ajax({
                url: '/client/pets/store.php',
                type:'POST',
                data:{
                    pet_name: vm.pet_name,
                    pet_species: vm.pet_species,
                    client_id: vm.client_id
                },
                success:function(result){
                    Materialize.toast("Pet Added", 2000);
                }
            });
        }
    }
});