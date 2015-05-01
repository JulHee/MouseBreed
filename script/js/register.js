
var Register = {

    onReady: function() {
        $("#registerButton").click(Register.newUser);
    },

    newUser:  function() {
        var clicked = $("#registerButton");

        var password1 = $("#registerPassword").val();
        var password2 = $("#registerPassword2").val();

        if (password1 == password2 && password1 != "") {
            $.ajax({
                type: "POST",
                url: "/script/php/ajax/register.php",
                data: { username: $("#registerUsername").val(), password: password1,
                    lastname: "Last", firstname: "First", email: $("#registerEmail").val() },
                dataType: "json"
            }).done(function(response) {
                if(response.success == true) {
                    $.notify("Konto wurde erfolgreich erstellt.","success");
                    $("#registerForm").submit();
                } else {
                    clicked.notify(response.msg,{className: "error" ,elementPosition: 'right middle'});
                }
            });
        } else {
            clicked.notify("Passwörter stimmen nicht überein.",{className: "error" ,elementPosition: 'right middle'});
        }

    }

};

$( document ).ready( Register.onReady );
