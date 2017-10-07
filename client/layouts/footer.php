</div>
</body>
</main>


<footer class="page-footer teal" style="padding-top: 0;">
    <div class="footer-copyright">
        <div class="container">
        © 2017 Copyright <b>Animal Haven Veterinary Clinic</b>
        <?php $store_details = $conn->query("SELECT * FROM clinic_details")->fetch_assoc()?>
        <a class="grey-text text-lighten-4 right" href="#!"><i class="material-icons left">call</i>
            <?=$store_details['contact_number']?><small></small></a>
        <a class="grey-text text-lighten-4 right" href="#!"><i class="material-icons left">home</i>
            <?=$store_details['address']?><small></small></a>
        </div>
    </div>
</footer>