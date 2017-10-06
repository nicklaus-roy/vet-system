<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');

    $service_id = $_GET['id'];
    $service = $conn->query("SELECT * FROM services WHERE id = '$service_id'")->fetch_assoc();

?>

<div class="row">
    <div class="col s12">
        <h5>Edit Service</h5>
        <div class="divider"></div>
        <div class="section">
            <form action="/admin/services/update.php" method="POST">
                <input type="hidden" name = "id" value = "<?=$service['id']?>">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id = "name" name = "name" value = "<?=$service['name']?>">
                        <label for="name">Service Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id = "price" name = "price" value = "<?=$service['price']?>">
                        <label for="name">Price</label>
                    </div>
                </div>
                <button class="waves-effect waves-light btn" name = "submit">Save Changes</button>
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