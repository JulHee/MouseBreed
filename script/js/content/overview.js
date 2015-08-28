var loadBreed = {

    test: "Hallo",

    onReady: function () {
        $('.loadBreed').click(loadBreed.load);
    },

    load: function () {
        var clicked = $( this );

        $.ajax({
            type: "POST",
            url: "/script/php/ajax/loadBreed.php",
            data: {id: clicked.attr('id')},
            dataType: "json"
        }).done(function (response) {
            if (response.success == true) {
                refereshNumberOfDays();
                if(typeof(Storage) !== "undefined") {
                    localStorage.setItem("loadedBreed", JSON.stringify(response.loadedBreed));
                    window.location.replace('http://local.mousebreed/breed');
                } else {

                }
            } else {

            }
        });
    }

};

$(document).ready(loadBreed.onReady);