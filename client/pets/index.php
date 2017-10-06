<?php
    include('../layouts/master.php');
    $auth_user = $_SESSION['auth_user']['id'];
    $user = $conn->query("SELECT * FROM clients WHERE user_id = '$auth_user'")->fetch_assoc();
    $pet_histories = $conn->query("SELECT p.*, sr.service_id, s.name service_name, ofr.transaction_date FROM pets p 
                INNER JOIN services_rendered sr ON sr.pet_id = p.id
                INNER JOIN services s ON s.id = sr.service_id 
                INNER JOIN official_receipts ofr ON ofr.receipt_number = sr.receipt_number
                WHERE p.client_id = '".$user['id']."'");
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
                            <th>Service</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($pet_history = $pet_histories->fetch_assoc()) {?>
                        <tr>
                            <td><?=$pet_history['name']?></td>
                            <td><?=$pet_history['service_name']?></td>
                            <td><?=date_format(date_create($pet_history['transaction_date']),'M d, Y')?></td>
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