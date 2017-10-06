<?php
    include('../layouts/master.php');
    $clients = $conn->query("SELECT * FROM clients");
    $services = $conn->query("SELECT * FROM services WHERE name <> 'Surgery'");
    


    $auth_user = $_SESSION['auth_user']['id'];
    $user = $conn->query("SELECT * FROM clients WHERE user_id = '$auth_user'")->fetch_assoc();

    $pets = $conn->query("SELECT * FROM pets WHERE client_id = '".$user['id']."'");

?>
<style>
    .picker__list{
        width: 100%;
    }
</style>
<div class="row" id = "app-reservations">
    <div class="col s12">
        <div class="section">
            <h5>
                Reservations
            </h5>
            <p>
                <strong>Note:</strong> Home services and surgery can only be reserved through contacting the clinic directly.
                <a href = "/client/messages/create.php" class="btn blue"><i class="material-icons left">mail</i>Contact Us</a>
            </p>

        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="input-field col s3">
                <input type="hidden" value = "<?=$user['id']?>" id = "auth_user">
                <input type="hidden" value = "<?=$user['last_name'].', '.$user['first_name']?>" id = "auth_user_name">
                <input type="text" class="datepicker" 
                    name = "date_from" id = "date_from" 
                    style = "cursor:pointer;" 
                    >
                <label for="date_from">Date:</label>
            </div>
            <div class="col s2">
                <br>
                <a class="btn-floating blue" @click = "getReservations()">
                    <i class="material-icons">send</i>
                </a>
            </div>
            <div class="col s4">
                <br>
                <a href = "#add-reservation-modal"
                    class = "btn waves-effect waves-light modal-trigger" title = "add">
                    Set Reservation
                </a>                            
            </div>
        </div>
        <div>
            <table class="highlight bordered custom-table">
                <thead>
                    <tr>
                        <th>Time Slot</th>
                        <th>Client</th>
                        <th>Service</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for = "reservation in reservations">
                        <td>{{ reservation.time_from }} - {{ reservation.time_to }}</td>
                        <td v-if = "auth_user == reservation.client_id">
                            {{ reservation.client_name }}
                        </td>
                        <td v-else>
                            Reserved
                        </td>
                        <td v-if = "auth_user == reservation.client_id">
                            {{ reservation.service_name }}
                        </td>
                        <td v-else>
                            Reserved
                        </td>
                        <td v-if = "auth_user == reservation.client_id">
                            <a href="#remove-reservation-modal" @click = "pickReservation(reservation.id)" 
                                class = "waves-effect waves-light modal-trigger" title = "cancel">
                                <i class="material-icons">clear</i>
                            </a>
                        </td>
                        <td v-else>
                            Reserved
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="add-reservation-modal" class="modal" style="min-height: 500px">
                <div class="modal-content">
                    <h5>Add Reservation</h5>
                    <p><strong>Note:</strong> Home services and surgery can only be reserved through contacting the clinic directly.</p>
                    <form action="/client/reservations/store.php" method = "POST">
                        <div class="row">
                            <div class="input-field col s3">
                                <input type="text" name = "reservation_date" id = "reservation_date" v-model = "reservation_date" 
                                placeholder = "Date" readonly>
                                <label for="reservation_date">Date:</label>
                            </div>
                            <div class="col s6">
                                <label for="service">Service:</label>
                                <select name = "service_id" id = "service_id" class="browser-default" v-model = "service_id" @change = "changeTimes()">
                                    <?php while($service = $services->fetch_assoc()){ ?>
                                        <option value="<?=$service['id']?>"><?=$service['name']?>(<?=sprintf("%d:", floor($service['duration_in_min']/60))."hrs. ".sprintf("%02d",$service['duration_in_min']%60);?>min)
                                        </option>
                                    <?php } ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input type="text" class="timepicker" id = "time_from" :value = "time_from" @change = "checkTime()">
                                <label for="time_from">From Time:</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="hidden" name = "client_id" id = "client_id" :value = "auth_user" >
                                <input type="text" :value = "auth_user_name" readonly>
                                <label for="client">Client:</label>
                            </div>                      
                            <div class="input-field col s4">
                                <select name = "pet" id = "pet_id" v-model = "pet_id">
                                    <option selected disabled>Choose a pet</option>
                                    <?php while($pet = $pets->fetch_assoc()){ ?>
                                        <option value="<?=$pet['id']?>"><?=$pet['name']?></option>
                                    <?php } ?>
                                </select>
                                <label for="pet">Pet:</label>
                            </div>                      
                        </div>
                        <div class="modal-footer">
                            <button class = "modal-action modal-close waves-effect waves-green btn" @click.prevent = "addReservation()">
                                Add Reservation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="remove-reservation-modal" class="modal">
                <div class="modal-content">
                    <h5>Are you sure you want to cancel the reservation?</h5>
                </div>
                <div class="modal-footer">
                    <button class = "modal-action modal-close waves-effect waves-red btn red">No</button>&nbsp
                    <button class = "modal-action modal-close waves-effect waves-green btn" @click.prevent = "removeReservation()">Yes</button>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
    include('../layouts/scripts.php');
?>
<script src="/js/picker.js"></script>
<script src="/js/picker.time.js"></script>
<script src = "./reservations.js">
    
</script>
<?php
    include('../layouts/footer.php');
?>