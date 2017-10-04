<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $services = $conn->query("SELECT * FROM services");
    
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Services
                <a href = "/admin/services/create.php" class="btn-floating waves-effect waves-light">
                    <i class="material-icons">add</i>
                </a>
            </h5>
            <table id = "Services-table" class="highlight custom-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($service = $services->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$service['name']?></td>
                            <td><?=$service['price']?></td>
                            <td>
                                <a href="./edit.php?id=<?=$service['id']?>" title = "Edit">
                                    <i class="material-icons">edit</i>
                                </a> 
<!--                                 <a href="./delete.php" title = "Delete">
                                    <i class="material-icons">delete</i>
                                </a>
 -->                            </td>
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