<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
    
?>
<div class="row">
    <div class="col s12">
        <h5>Add Service</h5>
        <div class="divider"></div>
        <div class="section">
            <form action="/admin/services/store.php" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input type="text" id = "name" name = "name">
                        <label for="name">Service Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id = "price" name = "price">
                        <label for="name">Price</label>
                    </div>
                </div>
                <button class="waves-effect waves-light btn" name = "submit">Add Service</button>
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
<script>
    $(function(){
        $('select').material_select();
    })
</script>