
var login = {

    onReady: function() {
        $("#login_button").click(login.check);
        $(document).keypress(login.keyPressed);
    },

    check:  function() {
        $.ajax({
            type: "POST",
            url: URL_ROOT + "/script/php/ajax/login.php",
            data: { password: $("#password").val(), username: $("#username").val() },
            dataType: "json"
        }).done(function(response) {
            if(response.success == true) {
                $("#login_form").submit();
            } else {
                var error_msg = $(".error_msg");
                error_msg.html("Fehlermeldung");
                error_msg.show();
            }
        });
    },

    keyPressed: function(e) {
        if (e.which == 13) {
            $("#login_button").click();
            return false;
        }
    }

};

$( document ).ready( login.onReady );
