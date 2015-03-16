
var Settings = {

    inputKeys: [],
    inputValues: [],

    onReady: function() {
        Settings.fillInputValues();
        $( '.save_button_general' ).click(Settings.saveGeneral)
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
                url: "/script/php/ajax/updateUserData.php",
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
    }

};

$( document ).ready( Settings.onReady );

$( window ).on('beforeunload', Settings.leaveSite );