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
            <div class="col s3">
                <br>
                <a class="btn-floating blue" @click = "getReservations()">
                    <i class="material-icons">send</i>
                </a>
            </div>
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
                        <td>{{ reservation.time_slot }}</td>
                        <td>{{ reservation.client_name }}</td>
                        <td>{{ reservation.service_name }}</td>
                        <td>
                            <a v-show = "reservation.client_name === null" href = "#add-reservation-modal" @click = "addSelectedData(reservation.time_slot)"
                                class = "waves-effect waves-light modal-trigger" title = "add">
                                <i class="material-icons">add</i>
                            </a>                            
                            <a v-show = "reservation.client_name != null" href="#remove-reservation-modal" @click = "pickReservation(reservation.id)" 
                                class = "waves-effect waves-light modal-trigger" title = "cancel">
                                <i class="material-icons">clear</i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="add-reservation-modal" class="modal">
                <div class="modal-content">
                    <h4>Add Reservation</h4>
                    <form action="/admin/reservations/store.php" method = "POST">
                        <div class="input-field">
                            <input type="text" name = "reservation_date" id = "reservation_date" v-model = "reservation_date" readonly>
                            <label for="reservation_date">Date:</label>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder = "Time Slot" name = "time_slot" id = "time_slot" v-model = "time_slot" readonly>
                            <label for="time_slot" >Time Slot:</label>
                        </div>
                        <div class="input-field">
                            <select name = "client_id" id = "client_id">
                                <?php while($client = $clients->fetch_assoc()){ ?>
                                    <option value="<?=$client['id']?>"><?=$client['last_name'].', '.$client['first_name']?></option>
                                <?php } ?>
                            </select>
                            <label for="client">Client:</label>
                        </div>
                        <div class="input-field">
                            <select name = "service_id" id = "service_id">
                                <?php while($service = $services->fetch_assoc()){ ?>
                                    <option value="<?=$service['id']?>"><?=$service['name']?></option>
                                <?php } ?>
                            </select>
                            <label for="service">Service:</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class = "modal-action modal-close waves-effect waves-green btn" @click.prevent = "addReservation()">Add Reservation</button>
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
<script src = "./reservations.js"></script>
<?php
    include('../layouts/footer.php');
?>