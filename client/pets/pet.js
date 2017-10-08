var app_pets = new Vue({
    el: '#app-pets',
    data:{
        pet_name: '',
        pet_species:'',
        client_id: '',
        dog_breeds: ['Askal', 'Beagle', 'German Shepard', 'Rottwelier', 'Bulldog','Golden Retriever'],
        cat_breeds: ['Siamese', 'Persian', 'Ragdoll', 'Siberian', 'Russian Blue', 'Himalayan'],
        pet_breed:''

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
                    pet_breed: vm.pet_breed,
                    client_id: vm.client_id
                },
                success:function(result){
                    Materialize.toast("Pet Added", 2000);
                }
            });
        }
    },
    computed:{
        getBreed(){
            if(this.pet_species == 'dog'){
                return this.dog_breeds;
            }
            else if (this.pet_species == 'cat'){
                return this.cat_breeds;
            }
            return "none";
        }
    }
});