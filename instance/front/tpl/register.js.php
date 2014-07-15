<script type="text/javascript">
    $(document).ready(function() {

        searchParams = {
            date: ''
        };

        $("#birthdate").datepicker({
            changeMonth: true,
            changeYear: true,
            onSelect: function(e) {
                searchParams.date = e;

            }
        });





    });
    function checkPassword()
    {
        $("#error_pass").hide();
        $("#error_cpass").hide();
        $("#error").hide();

        if ($("#_password").val() == '')
        {
            $("#error_pass").show();

        }
       
        if ($("#_password").val() != '' && $("#c_password").val() != '') {
            $("#error_pass").hide();
            $("#error_cpass").hide();

            if ($("#c_password").val() != $("#_password").val())
            {
                $("#error").show();
            }
        }

    }
function checkConfirmPassword()
    {
        $("#error_pass").hide();
        $("#error_cpass").hide();
        $("#error").hide();

        if ($("#_password").val() == '')
        {
            $("#error_pass").show();

        }
        if ($("#c_password").val() == '')
        {
            $("#error_cpass").show();

        }
        if ($("#_password").val() != '' && $("#c_password").val() != '') {
            $("#error_pass").hide();
            $("#error_cpass").hide();

            if ($("#c_password").val() != $("#_password").val())
            {
                $("#error").show();
            }
        }

    }



</script>

<!--//for datepicker-->
<?php include "jquery_ui.php"; ?>