<?php
    include('../layouts/master.php');
    $clients = $conn->query("SELECT * FROM clients");
    $services = $conn->query("SELECT * FROM services");

?>
<div class="row" id = "app-reservations">
    <div class="col s12">
        <div class="section">
            <h5>
                Reservations
            </h5>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="input-field col s3">
                <input type="text" class="datepicker" name = "date_from" id = "date_from" 
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
                        <td>{{ reservation.client_name }}</td>
                        <td>{{ reservation.service_name }}</td>
                        <td>
                            <a v-show = "reservation.client_name != null" href="#remove-reservation-modal" @click = "pickReservation(reservation.id)" 
                                class = "waves-effect waves-light modal-trigger" title = "cancel">
                                <i class="material-icons">clear</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="add-reservation-modal" class="modal bottom-sheet">
                <div class="modal-content">
                    <h5>Add Reservation</h5>
                    <form action="/admin/reservations/store.php" method = "POST">
                        <div class="row">
                            <div class="input-field col s3">
                                <input type="text" name = "reservation_date" id = "reservation_date" v-model = "reservation_date" readonly>
                                <label for="reservation_date">Date:</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" class="timepicker" id = "time_from" v-model = "time_from">
                                <label for="time_from">From Time:</label>
                            </div>
                            <div class="input-field col s3">
                                <input type="text" class="timepicker" id = "time_to" v-model = "time_to">
                                <label for="time_to">To Time:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s4">
                                <label for="client">Client:</label>
                                <select name = "client_id" id = "client_id" class="browser-default" v-model = "client_id" @change = "getPets()">
                                    <option v-for = "client in clients" :value="client.id">{{ client.first_name }} {{ client.last_name }}</option>
                                </select>
                            </div>
                            <div class="col s4">
                                <label for="service">Service:</label>
                                <select name = "service_id" id = "service_id" class="browser-default">
                                    <?php while($service = $services->fetch_assoc()){ ?>
                                        <option value="<?=$service['id']?>"><?=$service['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col s4">
                                <label for="pet_id">Pet:</label>
                                <select name = "pet_id" id = "pet_id" class="browser-default">
                                    <option v-for = "pet in pets" :value="pet.id">{{ pet.name }}</option>
                                </select>
                            </div>
                            <div class="input-field col s4">
                                <button class = "modal-action modal-close waves-effect waves-green btn" @click.prevent = "addReservation()">
                                    Add Reservation
                                </button>
                            </div>                            
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
<script src = "./reservations.js">
    
</script>
<?php
    include('../layouts/footer.php');
?>