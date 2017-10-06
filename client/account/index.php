<?php
    include('../layouts/master.php');
    $auth_user = $_SESSION['auth_user']['id'];
    $user = $conn->query("SELECT * FROM clients WHERE user_id = '$auth_user'")->fetch_assoc();
?>
<div class="row" id = "app-account">
    <div class="col s12">
        <div class="section">
            <h5>
                Change Password
            </h5>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col s12">
                <form action="/client/account/update.php" method="POST">
                    <input type="hidden" name = "user_id" id = "user_id" value = "<?=$auth_user?>">
                    <div class="row" v-if = "!canChange">
                        <div class="input-field col s3">
                            <input type="password" name = "old_password" v-model = "old_password" @blur = "checkOldPassword()">  
                            <label for="old_password">Old Password</label>
                        </div>
                    </div>
                    <div class="row" v-if = "canChange">
                        <div class="input-field col s3">
                            <input type="password" name = "new_password" v-model = "new_password">  
                            <label for="new_password">New Password</label>                            
                        </div>
                    </div>
                    <div class="row" v-if = "canChange">
                        <div class="input-field col s3">
                            <input type="password" name = "confirm_password" v-model = "confirm_password" @blur = "checkMatch()">  
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn" :class="{disabled: !passwordMatch}">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
    include('../layouts/scripts.php');
?>
<script>
    $(function(){
        $('.modal').modal();
    });
</script>
<script src="./account.js"></script>
<?php
    include('../layouts/footer.php');
?>