<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
    $clinic_details = $conn->query("SELECT * FROM clinic_details")->fetch_assoc();
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Clinic Details
            </h5>
            <form action="./update.php" method="POST">
                <div class="input-field col s3">
                    <input type="text" name = "contact_number" id = "contact_number" 
                        value = "<?=$clinic_details['contact_number']?>">
                    <label for="contact_number">Contact Number</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name = "address" id = "address" 
                    value = "<?=$clinic_details['address']?>">
                    <label for="address">Address</label>
                </div>
                <div class="input-field col s3">
                    <button class="btn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<?php
    include($root.'/admin/layouts/footer.php');
?>