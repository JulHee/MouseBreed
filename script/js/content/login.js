var login = {

    onReady: function () {
        $("#login_button_top").click(login.check);
        $("#login_button").click(login.check);
        $(document).keypress(login.keyPressed);
    },

    check: function () {
        var button = $( this );
        console.log(button.parent().parent().parent().parent());
        $.ajax({
            type: "POST",
            url: "/script/php/ajax/login.php",
            data: {password: button.parent().parent().find("#password").val(), username: button.parent().parent().find("#username").val()},
            dataType: "json"
        }).done(function (response) {
            if (response.success == true) {
                button.parent().parent().parent().parent().parent().submit();
            } else {
                button.parent().notify("Benutzername oder Passwort falsch", {className: "error", elementPosition: 'botttom center'});
            }
        });
    },

    keyPressed: function (e) {
        if (e.which == 13) {
            $("#login_button_top").click();
            return false;
        }
    }

};

$(document).ready(login.onReady);
