
var Register = {

    onReady: function() {
        $("#register_button").click(Register.newUser);
        $(document).keypress(Register.keyPressed);
    },

    newUser:  function() {
        $.ajax({
            type: "POST",
            url: "/script/php/ajax/register.php",
            data: { username: $("#username").val(), password: $("#password").val(),
                    password2: $("#password2").val(),  lastname: $("#lastname").val(),
                    firstname: $("#firstname").val(), email: $("#email").val() },
            dataType: "json"
        }).done(function(response) {
            if(response.success == true) {
                alert("Konto wurde erfolgreich erstellt.");
                $("#register_form").submit();
            } else {
                var error_msg = $(".error_msg");
                error_msg.html(response.msg);
                error_msg.show();
            }
        });
    },

    keyPressed: function(e) {
        if (e.which == 13) {
            $("#register_button").click();
            return false;
        }
    }

};

$( document ).ready( Register.onReady );
