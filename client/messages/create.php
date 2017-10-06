<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/client/layouts/master.php');

    $auth_user = $_SESSION['auth_user']['id'];
    $user = $conn->query("SELECT * FROM clients WHERE user_id = '$auth_user'")->fetch_assoc();
    $client_id = $user['id'];
?>
<div class="row">
    <div class="col s12">
        <h5>Message</h5>
        <div class="divider"></div>
        <div class="section">
            <form action="/client/messages/store.php" method="POST">
                <input type="hidden" name = "client_id" value = "<?=$client_id?>">
                <div class="row">
                    <div class="input-field col s6">
                        <input type = "text" id="subject" name = "subject">
                        <label for="subject">Subject:</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="message" name = "message" class="materialize-textarea" data-length="240"></textarea>
                        <label for="message">Message</label>
                    </div>
                </div>
                <button class="waves-effect waves-light btn" name = "submit">Send Message</button>
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