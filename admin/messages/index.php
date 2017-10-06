<?php
    $root = ($_SERVER["DOCUMENT_ROOT"]);
    include($root.'/shared/db_connect.php');
    include($root.'/admin/layouts/master.php');


    $messages = $conn->query("SELECT m.id, m.subject, m.message_body, m.date_time_sent,
        concat(c.first_name, ' ', c.last_name) as full_name FROM messages m 
        INNER JOIN clients c ON m.client_id = c.id");
?>
<div class="row">
    <div class="col s12">
        <div class="section">
            <h5>
                Messages
            </h5>
            <table id = "messages-table" class="highlight">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date/Time</th>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($message = $messages->fetch_assoc()){ ?>
                        <tr>
                            <td><?=$message['id']?></td>
                            <td><?=date_format(date_create($message['date_time_sent']), "M d, Y h:i:sa")?></td>
                            <td><?=$message['full_name']?></td>
                            <td><?=$message['subject']?></td>
                            <td><?=$message['message_body']?></td>
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
        $('#messages-table').DataTable();
    });
</script>

<?php
    include($root.'/admin/layouts/footer.php');
?>