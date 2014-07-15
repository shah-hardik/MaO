$(document).ready(function(){
    var _form = $(".jayTest");
    _form.submit(function(e){
        var ret = true;
        $(this).find("input").each(function() {
            var len = $(this).val();
            if ($(this).hasClass("email")){
                if (!IsEmail($(this).val())){
                    ret = false;
                    $(this).addClass("form-error");
                    $(this).bind("keyup", function()
                    {
                        var l = $(this).val();
                        if (l.length > 0)
                        {
                            $(this).removeClass("form-error");
                        }
                    });
                }
            }
			
            if (($(this).hasClass("required") && len.length <= 0) || $(this).hasClass("required") && $(this).val() == $(this).attr('placeholder')){
                $(this).addClass("form-error");
                ret = false;
                $(this).bind("keyup", function()
                {
                    var l = $(this).val();
                    if (l.length > 0)
                    {
                        $(this).removeClass("form-error");
                    }
                });
            }
        });

        if (ret == false) {
            $("#error").show("medium");
            e.stopImmediatePropagation();
        }
        else {
            $("#error").hide();
        }
        return ret;

    });
    

    $(':input[placeholder]').placeholder();
});

function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}