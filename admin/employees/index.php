<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');


    $employees = $conn->query("SELECT * FROM users WHERE role <> 'client'");
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Employees
                <a href = "/admin/employees/create.php" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">add</i>
                </a>
            </h5>
            <table id = "inventory-table" class="highlight custom-table">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Role</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($employee = $employees->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$employee['last_name']?></td>
                            <td><?=$employee['first_name']?></td>
                            <td><?=$employee['middle_name']?></td>
                            <td><?=$employee['role']?></td>
                            <?php if($employee['is_active'] == 1):?>
                                <td>YES</td>
                            <?php else:?>
                                <td>NO</td>
                            <?php endif;?>
                            <td>
                                <a href="./edit.php?id=<?=$employee['id']?>" title = "Edit">
                                    <i class="material-icons">edit</i>
                                </a> 
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
    include('../layouts/scripts.php');
?>
<script src="/datatables/datatables.min.js"></script>
<script>
    $(function(){
        $('#inventory-table').DataTable();
    });
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>