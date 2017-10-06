<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $id = $_GET['id'];
    
    $client = $conn->query("SELECT * FROM clients WHERE id = '$id'")->fetch_assoc();
    
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Clients
            </h5>
            <form action="/admin/client/update.php" method="POST">
                <div class="row">
                    <input type="hidden" name = "client_id" value = "<?=$client['id']?>">
                    <div class="input-field col s3">
                        <input type="text" name = "last_name" required value = "<?=$client['last_name']?>">
                        <label for="last_name">Last Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "first_name" id = "first_name" required value = "<?=$client['first_name']?>">
                        <label for="first_name">First Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "middle_name" id = "middle_name" required value = "<?=$client['middle_name']?>">
                        <label for="middle_name">Middle Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "contact_number" id = "contact_number" required value = "<?=$client['contact_number']?>">
                        <label for="contact_number">Contact Number*</label>
                    </div>
                </div>
                <?php if(empty($client['user_id'])):?>
                <div class="row">
                    <div class="col s4">
                        <br>
                        <input type="checkbox" id = "create_user_account" name = "create_user_account">
                        <label for="create_user_account">Create User Account</label>
                    </div>
                </div>
                <?php endif;?>
                <div class="row">
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