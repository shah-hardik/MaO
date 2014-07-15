<script type="text/javascript">
    $(document).ready(function() {
        
    });
    var count_product = -1;
    function ImportCategory(loader_id) {
        if (loader_id == '1') {
            _wm();
        }

        $.ajax({
            type: "POST",
            //data:{ImportProuct:1, count:count_product},
            data: {Import: 1},
            url: '<?php print _U ?>import',
            dataType: "json",
            success: function(data) {
                if (loader_id == '1') {
                    _wc();
                }

                $('#content_dbdata_1').append('<div class="alert alert-info" style="margin-top:10px;">' + data.msg_category + '</div>');
                //                $('#content_dbdata_categoryChose').append('<div style="color:green;background-color:#CCC;padding:2px;margin-bottom:5px;width:500px;">' + data.category_list + '</div>');

                $('#category_list_form').html('<p>Category list:</p>'); // Очищаем если категории уже были добавлены

                
                for (var key in data.category_list) {
                    var entryId = key;
                    var entryName = data.category_list[key];
                    $('#category_list_form').append('<label style="display: block; cursor: pointer;"><input type="checkbox" style="margin: 10px;" name="cat_list[' + entryId + ']">' + entryName + '</input></label>')    
                }
                
                $('#category_list_form').append('<button type="button" class="btn btn-primary" id="submitPage2" onclick="return ImportProduct(1);">Start Import Products</button>');
            }
        });
    }
    ;
    function ImportProduct(loader_id) {
        formData = '';
        if (loader_id == '1') {
            formData = $('#category_list_form').serialize();
            _wm();
        }

        formData += '&ImportProduct=1&_count=' + count_product;
        $.ajax({
            type: "POST",
            data: formData,
            url: '<?php print _U ?>import',
            dataType: "json",
            success: function(data) {

                if (loader_id == '1') {
                    
                    $('#content_dbdata_1').prepend('<div class="alert alert-info" style="margin-top:10px;">Total Products in selected categories - ' + data.counter + '</div>');
                }

                $('#content_dbdata').prepend('<div class="alert alert-info" style="margin-top:10px;">' + data.msg + '</div>');
                console.log('Showing message' + data.msg);
                console.log('Total products' + data.counter);

                var progress_1 = count_product + 1;
                var progress_2 = (100 / data.counter);
                var progress_3 = parseInt(progress_1 * progress_2);
                $('#progress_bar').css({'width': progress_3 + '%', 'background-color': 'green'});
                $('#progress_bar').html(progress_3 + '%');
                if (data.counter == (count_product + 1)) {
                    $(".sub_message").hide();
                    $("#next_msg").show('slow');
                    setTimeout(function() {
                        location.href = 'min_offer_price?firstTime=1';
                    }, 3000);
                }
                if (data.counter > count_product) {
                    count_product = count_product + 1;
                    console.log(count_product);
                    console.log('Start recursion!');
                    ImportProduct('2');
                }
                _wc();
            }
        });
    }
    
    function ResetAll(){
        $("#ResetAllCategoryProduct").modal("show");
        genericFun = function(){
            _a({
                data:{ResetAll:1},
                url:'<?php print _U ?>import',
                handler:function(r){
                    $("#ResetAllCategoryProduct").modal("hide");
                    if(r.status){
                        $("#category_list_form").html('');
                        _ns("Categories & Products Deleted Successfully."); 
                        setTimeout(function(){
                            window.location.href = '<?php print _U ?>import';
                        },500)
                    }else{
                        _nf("Error Occured");
                    }
                }
            });
        }
    }
</script>

<?php if ($load_category_list == 1): ?>
    <script type="text/javascript">
        $(document).ready(function() {
                                
        });
    </script>
<?php endif; ?>