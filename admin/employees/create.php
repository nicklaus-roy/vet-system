<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Employee
            </h5>
            <form action="/admin/employees/store.php" method="POST">
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
                        <select name="role" id="role">
                            <option value="staff">Staff</option>
                            <option value="admin">Admin</option>
                        </select>
                        <label for="">Role:</label>
                    </div>
                    <div class="col s3">
                        <input type="checkbox" name = "is_active" id = "is_active">
                        <label for="is_active">Active</label>
                    </div>    
                </div>
                <div class="row">
                    <button class="btn">Add Employee</button>
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