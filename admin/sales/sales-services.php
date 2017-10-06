<div class="row">
    <div class="input-field col s3">
        <select id = "service_id" name = "service_id">
            <option value="" selected disabled></option>
            <option v-for = "service in services" :value = "service.id">{{ service.name }}({{ service.price }})</option>
        </select>
        <label for="service_id">Services</label>
    </div> 
    <div class="input-field col s3">
        <select name="pet_id" id="pet_id">
            <option ></option>
            <option v-for = "pet in pets" :value = "pet.id">{{ pet.name }}</option>
        </select>
        <label for="pet">Pet: </label>
    </div>
    <div class="input-field col s3">
        <input type="number" step = "0.5" name = "actual_price" id = "actual_price" v-model = "actual_price">
        <label for="actual_price">Actual Price</label>
    </div>
    <div class="input-field col s2">
        <button class = "btn" @click = "addToServicesAvailed()" >
            <i class="material-icons">add</i>
        </button>
    </div> 
</div>
<table class="bordered highlight custom-table">
    <thead>
        <tr>
            <th>Service</th>
            <th>Name</th>
            <th>Actual Price</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
        <tr v-for = "availed_service in availed_services">
            <td>{{ availed_service.name }}</td>
            <td>{{ availed_service.pet_name }}</td>
            <td>{{ availed_service.actual_price }}</td>
            <td>
                <i class="material-icons" style="cursor:pointer" @click = "removeServices(availed_service)">clear</i>
            </td>
        </tr>
    </tbody>
</table>