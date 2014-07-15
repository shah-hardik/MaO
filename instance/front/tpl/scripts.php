<script type="text/javascript">

    function highlightTab(index){
        $("ul.tabs li:eq("+index+") a").click();
    }

    $(document).ready(function(){
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

    function initFormValidation(){
        
        $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); 
    }
    
    var genericFun = function(){
        $("#myModal").modal("hide");
    }
    function _ns(message){
        noty({"text":message,"layout":"bottom","type":"success","closeButton":"true"});
    }
    function _nf(message){
        noty({"text":message,"layout":"bottom","type":"error","closeButton":"true"});
    }
    function _w(){
        noty({"text":"We are working on it....","layout":"bottomRight","type":"alert",timeout:false});
    }
    function _wm(){
        noty({"text":"We are working on it....","layout":"bottomRight","type":"alert",timeout:false,"modal":"true"});
    }
    function _wc(){
        $("#myModal").modal("hide");
        $.noty.closeAll();
    }
    function l(url){
        location.href=url;
    }
    function lp(url){
        window.open(url);
    }
    var _a = function(param){
        _wm();
        $.ajax({
            type:"POST",
            url:param.url,
            data:param.data,
            dataType:'json',
            success:function(remoteContent){
                _wc();
                try{
                    param.handler(remoteContent);
                }catch(e){this.error()}
            },
            error:function(r){
                _wc();
                _nf('Technical Error!');
            }
        });
    }
</script> 
