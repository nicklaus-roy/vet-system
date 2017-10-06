<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $id = $_GET['id'];
    
    $employee = $conn->query("SELECT * FROM users WHERE id = '$id'")->fetch_assoc();
    
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                employees
            </h5>
            <form action="/admin/employees/update.php" method="POST">
                <div class="row">
                    <input type="hidden" name = "employee_id" value = "<?=$employee['id']?>">
                    <div class="input-field col s3">
                        <input type="text" name = "last_name" required value = "<?=$employee['last_name']?>">
                        <label for="last_name">Last Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "first_name" id = "first_name" required value = "<?=$employee['first_name']?>">
                        <label for="first_name">First Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <input type="text" name = "middle_name" id = "middle_name" required value = "<?=$employee['middle_name']?>">
                        <label for="middle_name">Middle Name*</label>
                    </div>
                    <div class="input-field col s3">
                        <select name="role" id="role">
                            <?php if($employee['role'] == 'staff'):?>
                                <option value="staff" selected>Staff</option>
                                <option value="admin">Admin</option>
                            <?php else:?>
                                <option value="staff">Staff</option>
                                <option value="admin" selected>Admin</option>
                            <?php endif;?>
                        </select>
                        <label for="">Role:</label>
                    </div>   
                </div>
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