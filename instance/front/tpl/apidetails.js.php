<script type="text/javascript"> 
    $(document).ready(function(){
        $("#user_storeurl").focus();
        var width = $(window).width();
        var height = $(window).height();
        if (width < 1024  ) {

            $( "#box_responsive_one" ).addClass("span12");
            $( "#box_responsive_two" ).addClass("span12");
        }
        else {

            $( "#box_responsive_one" ).addClass("span6");
            $( "#box_responsive_two" ).addClass("span6");
        }
    });
</script>