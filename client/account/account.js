var app_account = new Vue({
    el: '#app-account',
    data:{
        old_password: '',
        new_password: '',
        confirm_password: '',
        canChange: false,
        user_id:'',
        passwordMatch: false
    },
    mounted(){
        this.user_id = $('#user_id').val();
    },
    methods:{
        checkOldPassword(){
            var vm = this;
            $.ajax({
                url:'./check-password.php',
                type: 'POST',
                data: {
                    oldPassword: vm.old_password,
                    userId: vm.user_id
                },
                success:function(result){
                    if(result === "Correct"){    
                        vm.canChange = true;
                    }
                    else{
                        Materialize.toast("Wrong password",2000);
                    }
                }
            });
        },
        checkMatch(){
            if(this.new_password == this.confirm_password){
                this.passwordMatch = true;
            }
            else{
                Materialize.toast("Passwords do not match!", 2000); 
            }
        }
    }
});