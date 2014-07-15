(function( $ ){

    $.fn.hoverText = function() {
  
        $(this).focus(function(){
            if($(this).val() == $(this).data("val")){
                $(this).val('');
            }
        }).blur(function(){
            if($(this).val() == ''){
                $(this).val($(this).data("val"));
            }
        });

    };
    
    
    
    $.fn.asSave = function() { 
  
        $(this).blur(function(){
            if($(this).val() != '' && $(this).val() != $(this).data("val")){
                try{
                    _saveAs($(this).data("key"),$(this).val());
                }catch(e){}
            }
        });

    };
    
    $.fn.toggleDisabled = function(){
        return this.each(function(){
            this.disabled = !this.disabled;
        });
    };
    
})( jQuery );