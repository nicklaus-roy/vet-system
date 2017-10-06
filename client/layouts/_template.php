<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');
    include($root.'/admin/layouts/nav-bar.php');
?>
<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="divider"></div>
            <div class="section">
            </div>
        </div>
    </div>
</div>
<?php
    include($root.'/admin/layouts/footer.php');
?>