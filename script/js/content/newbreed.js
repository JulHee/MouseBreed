var Newbreed = {

    difficulty: "",
    scenarioVisibly: false,

    onReady: function() {
        $( 'input[name=difficulty]:radio' ).change(Newbreed.changeDifficulty);
        $( '.newbreed_button' ).click(Newbreed.start);
    },

    changeDifficulty:  function() {
        var selected = $(this);

        if(!Newbreed.scenarioVisibly) {
            $( '.scenario_head' ).removeClass("hidden");
            Newbreed.scenarioVisibly = true;
        }

        if (Newbreed.difficulty != "") {
            $( '#' + Newbreed.difficulty ).addClass("hidden");
            Newbreed.difficulty = selected.val();
            $( '#' + Newbreed.difficulty ).removeClass("hidden");
        } else {
            Newbreed.difficulty = selected.val();
            $( '#' + Newbreed.difficulty ).removeClass("hidden");
        }

    },

    start: function() {
        var scenario = $( '#' + Newbreed.difficulty).find( '.tab-content').find( '.active').attr('id');

        $.ajax({
            type: "POST",
            url: "/script/php/ajax/newBreed.php",
            data: { target: scenario, name: $( '#breedname' ).val() },
            dataType: "json",
            async: false
        }).done(function(response) {
            if(response.success == true) {
                location.replace(URL_ROOT + "overview");
            } else {
                $.notify(response.msg,"error");
            }
        });
	}
};


$( document ).ready( Newbreed.onReady );