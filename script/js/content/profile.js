
var Settings = {

    inputKeys: [],
    inputValues: [],

    onReady: function() {
        Settings.fillInputValues();
        $( '.save_button_general' ).click(Settings.saveGeneral);
        $( '#deleteAccount' ).click(Settings.deleteAccount);
        $( '#changePasswordButton' ).click(Settings.changePassword);
    },

    fillInputValues:  function() {
        var i = 0;

        $( 'input[type=text]').each(function(){
            Settings.inputKeys[i] = $(this).attr('id');
            Settings.inputValues[i] = $(this).val();
            i++;
        });

    },

    checkChange:  function() {
        var inputChanged = false;
        var i = 0;

        $( 'input[type=text]' ).each(function(){
            if(Settings.inputValues[i] !=  $(this).val()) {
                inputChanged = true;
                return false;
            }
            i++;
        });

        return inputChanged;
    },

    saveGeneral:  function() {
        var clicked = $( this );

        if(Settings.checkChange()) {

            var keys = [];
            var values = [];

            var i = 0;
            var j = 0;

            $('input[type=text]').each(function () {
                if (Settings.inputValues[i] != $(this).val()) {
                    keys[j] = $(this).attr('id');
                    values[j] = $(this).val();
                    j++;
                }
                i++;
            });

            $.ajax({
                type: "POST",
                url: "/script/php/ajax/changeUserData.php",
                data: {keys: JSON.stringify(keys), values: JSON.stringify(values)},
                dataType: "json"
            }).done(function (response) {
                if (response.success == true) {
                    Settings.fillInputValues();
                    alert("Änderung gespeichert.");
                    location.reload();
                } else {
                    clicked.notify(response.msg, {className: "error", elementPosition: 'left middle'});
                }
            });
        } else {
            clicked.notify("Keine Änderung vorhanden.", {className: "error", elementPosition: 'left middle'});
        }
    },

    leaveSite: function() {
        if ( Settings.checkChange() ){
            return 'Änderungen nicht gespeichert!';
        }
    },

    deleteAccount: function() {
        var clicked = $( this );

        $.ajax({
            type: "POST",
            url: "/script/php/ajax/deleteAccount.php",
            data: { password: $( '#deleteAccountPassword' ).val() },
            dataType: "json"
        }).done(function (response) {
            if (response.success == true) {
                localStorage.removeItem('loadedBreed');
                location.replace(URL_ROOT);
            } else {
                clicked.notify(response.msg, {className: "error", elementPosition: 'bottom center'});
            }
        });
    },

    changePassword: function() {
        var clicked = $( this );

        var newPassword1 = $( '#newPassword1' ).val();
        var newPassword2 = $( '#newPassword2' ).val();

        if (newPassword1 == newPassword2 && newPassword1 != "") {
            $.ajax({
                type: "POST",
                url: "/script/php/ajax/changeUserPassword.php",
                data: { oldPassword: $( '#oldPassword' ).val(), newPassword: newPassword1 },
                dataType: "json"
            }).done(function (response) {
                if (response.success == true) {
                    alert("Passwort erfolgreich geändert. Bitte ereunt anmelden.");
                    localStorage.removeItem('loadedBreed');
                    location.replace(URL_ROOT);
                } else {
                    clicked.notify(response.msg, {className: "error", elementPosition: 'left middle'});
                }
            });
        } else {
            clicked.notify("Neue Passwörter stimmen nicht überein.", {className: "error", elementPosition: 'left middle'});
        }

    }

};

$( document ).ready( Settings.onReady );

$( window ).on('beforeunload', Settings.leaveSite );