<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Clients
            </h5>
            <form action="/admin/client/store.php" method="POST" id = "app-pets">
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" name = "last_name" required>
                        <label for="last_name">Last Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "first_name" id = "first_name" required>
                        <label for="first_name">First Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "middle_name" id = "middle_name" required>
                        <label for="middle_name">Middle Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "contact_number" id = "contact_number" required>
                        <label for="contact_number">Contact Number*</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s3">
                        <input type="text" name = "pet_name" required>
                        <label for="">Pet Name*</label>
                    </div>
                    <div class="col s4">
                        <label for="">Pet Species*</label>
                        <select style="font-size: 15px" class="browser-default" name = "pet_species" required 
                        v-model = "pet_species">
                            <option value="dog">Dog</option> 
                            <option value="cat">Cat</option>
                            <option value="bird">Bird</option>
                            <option value="reptile">Reptile</option>
                            <option value="rabbit">Rabbit</option>
                            <option value="small mammal">Small Mammals</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="col s4" v-if = "getBreed != 'none'">
                        <label for="">Pet Breed*</label>
                        <select style="font-size: 15px" class="browser-default" name = "pet_breed" required>
                            <option v-for = "breed in getBreed" :value="breed">{{ breed }}</option>
                            <option value="others">Others</option>
                        </select>
                    </div>
                    <div class="col s4 input-field" v-else>
                        <input type="text" name = "pet_breed" id = "pet_breed">
                        <label for="pet_breed">Pet Breed:</label>
                    </div>
                    <div class="col s4">
                        <br>
                        <input type="checkbox" id = "create_user_account" name = "create_user_account">
                        <label for="create_user_account">Create User Account</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn">Add Client</button>
                </div>
            </form>            
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script>
    var app_pets = new Vue({
        el: '#app-pets',
        data:{
            pet_species: "",
            dog_breeds: ['Askal', 'Beagle', 'German Shepard', 'Rottwelier', 'Bulldog','Golden Retriever'],
            cat_breeds: ['Siamese', 'Persian', 'Ragdoll', 'Siberian', 'Russian Blue', 'Himalayan']
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
</script>
<?php
    include($root.'/admin/layouts/footer.php');
?>