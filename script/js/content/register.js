
var Register = {

    onReady: function() {
        $("#register_button").click(Register.newUser);
        $(document).keypress(Register.keyPressed);
    },

    newUser:  function() {
        $.ajax({
            type: "POST",
            url: "/script/php/ajax/register.php",
            data: { username: $("#registerInputUsername").val(), password: $("#registerInputPassword").val(),
                    password2: $("#registerInputPasswordRe").val(),  lastname: $("#registerInputlastName").val(),
                    firstname: $("#registerInputfirstName").val(), email: $("#registerInputEmail").val() },
            dataType: "json"
        }).done(function(response) {
            if(response.success == true) {
                $.notify("Konto wurde erfolgreich erstellt.","success");
                $("#register_form").submit();
            } else {
                $("#register_button").notify(response.msg,{className: "error" ,elementPosition: 'right middle'});
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
