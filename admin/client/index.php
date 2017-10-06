<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');


    $clients = $conn->query("SELECT * FROM clients");
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Clients
                <a href = "/admin/client/create.php" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">add</i>
                </a>
            </h5>
            <table id = "inventory-table" class="highlight custom-table">
                <thead>
                    <tr>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Contact Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($client = $clients->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$client['last_name']?></td>
                            <td><?=$client['first_name']?></td>
                            <td><?=$client['middle_name']?></td>
                            <td><?=$client['contact_number']?></td>
                            <td>
                                <a href="./edit.php?id=<?=$client['id']?>" title = "Edit">
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