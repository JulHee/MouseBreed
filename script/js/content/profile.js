
var Settings = {

    inputKeys: [],
    inputValues: [],

    onReady: function() {
        Settings.fillInputValues();
        $( 'input[type=text]' ).keyup(Settings.hideShowButton);
        $( '#save_button').click(Settings.saveChange)
    },

    fillInputValues:  function() {
        var i = 0;

        $( 'input[type=text]').each(function(){
            Settings.inputKeys[i] = $(this).attr('id');
            Settings.inputValues[i] = $(this).val();
            i++;
        });

    },

    hideShowButton: function() {
        if(Settings.checkChange()) {
            $( '.button').show();
        } else {
            $( '.button').hide();
        }
    },

    checkChange:  function() {
        var inputChanged = false;
        var i = 0;

        $( 'input[type=text]').each(function(){
            if(Settings.inputValues[i] !=  $(this).val()) {
                inputChanged = true;
                return false;
            }
            i++;
        });

        return inputChanged;
    },

    saveChange:  function() {
        var keys = [];
        var values = [];

        var i = 0;
        var j = 0;

        $( 'input[type=text]').each(function(){
            if(Settings.inputValues[i] !=  $(this).val()) {
                keys[j] = $(this).attr('id');
                values[j] = $(this).val();
                j++;
            }
            i++;
        });

        $.ajax({
            type: "POST",
            url: "/script/php/ajax/updateUserData.php",
            data: { keys: JSON.stringify(keys), values: JSON.stringify(values) },
            dataType: "json"
        }).done(function(response) {
            if(response.success == true) {
                alert("Änderung gespeichert.");
                location.reload();
            } else {
                var error_msg = $(".error_msg");
                error_msg.html(response.msg);
                error_msg.show();
            }
        });
    }

};

$( document ).ready( Settings.onReady );
