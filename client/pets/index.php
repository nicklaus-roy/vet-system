<?php
    include('../layouts/master.php');
    $auth_user = $_SESSION['auth_user']['id'];
    $user = $conn->query("SELECT * FROM clients WHERE user_id = '$auth_user'")->fetch_assoc();
    $pets = $conn->query("SELECT * FROM pets WHERE client_id = '".$user['id']."'");
?>
<div class="row" id = "app-pets">
    <div class="col s12">
        <div class="section">
            <h5>
                Pets
                <a class="waves-effect btn-floating waves-light btn modal-trigger" href="#modal1"><i class="material-icons">add</i></a>
                  <div id="modal1" class="modal bottom-sheet">
                    <div class="modal-content">
                      <h4>Add Pet</h4>
                      <input type="hidden" value = "<?=$user['id']?>" id = "client_id">
                      <div class="row">
                            <div class="input-field col s3">
                                <input type="text" v-model = "pet_name">
                                <label for="">Pet Name:</label>
                            </div>
                            <div class="col s4">
                                <label for="">Pet Species:</label>
                                <select style="font-size: 15px" class="browser-default" v-model = "pet_species">
                                    <option value="dog">Dog</option>
                                    <option value="cat">Cat</option>
                                    <option value="bird">Bird</option>
                                    <option value="reptile">Reptile</option>
                                    <option value="rabbit">Rabbit</option>
                                    <option value="small mammal">Small Mammal</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="col s4" v-if = "getBreed != 'none'">
                                <label for="">Pet Breed*</label>
                                <select style="font-size: 15px" class="browser-default" name = "pet_breed" required
                                    v-model = "pet_breed">
                                    <option v-for = "breed in getBreed" :value="breed">{{ breed }}</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                            <div class="col s4 input-field" v-else>
                                <input type="text" name = "pet_breed" id = "pet_breed" v-model = "pet_breed">
                                <label for="pet_breed">Pet Breed:</label>
                            </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" @click = "addPet()">Add</a>
                    </div>
                  </div>
            </h5>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col s12">
                <table class="bordered custom-table" id = "pets-table">
                    <thead>
                        <tr>
                            <th>Pet Name</th>
                            <th>Species</th>
                            <th>Breed</th>
                            <th>History</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($pet = $pets->fetch_assoc()) {?>
                        <tr>
                            <td><?=$pet['name']?></td>
                            <td><?=$pet['species']?></td>
                            <td><?=$pet['breed']?></td>
                            <td>
                                <a href="./show.php?pet_id=<?=$pet['id']?>">
                                    <i class="material-icons">timeline</i>    
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php
    include('../layouts/scripts.php');
?>
<script src="/datatables/datatables.min.js"></script>
<script>
    $(function(){
        $('#pets-table').DataTable();
        $('.modal').modal();
    });
</script>
<script src="./pet.js"></script>
<?php
    include('../layouts/footer.php');
?>