<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/materialize.min.js"></script>
<script src = "/js/vue.js"></script>

<script>
    $(function(){
        if($('#message').val()){
            Materialize.toast($('#message').val(), 2000);
        }
        $('select').material_select();
        $(".button-collapse").sideNav();
        $('.dropdown-button').dropdown();
    });
</script>