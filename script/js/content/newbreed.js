/*

 */

var Newbreed = {

    difficulty: "",
    scenarioVisibly: false,
    scenario: 1,


    onReady: function() {
        $('input[name=difficulty]:radio').change(Newbreed.changeDifficulty);
        $( '.h_menu > a' ).click(Newbreed.changeScenario);
        $( '.newbreed_button').click(Newbreed.start);
    },

    changeDifficulty:  function() {
        if(!Newbreed.scenarioVisibly) {
            $( '.scenario_head').show();
            Newbreed.scenarioVisibly = true;
        }

        var anchor = $( '#' + Newbreed.difficulty );

        if(Newbreed.scenario != 1) {
            anchor.children( '.h_menu' ).children( '#' + Newbreed.scenario ).removeClass("h_menu_selected");
            anchor.children( '#' + Newbreed.scenario + ".scenario").toggle();
            Newbreed.scenario = 1;
            anchor.children( '.h_menu' ).children( '#' + Newbreed.scenario ).addClass("h_menu_selected");
            anchor.children( '#' + Newbreed.scenario + ".scenario").toggle();
        }

        anchor.toggle();
        Newbreed.difficulty = $(this).val();
        $( '#' + Newbreed.difficulty ).toggle();
    },

    changeScenario:  function() {
        var anchor = $( '#' + Newbreed.difficulty );
        anchor.children( '.h_menu' ).children( '#' + Newbreed.scenario ).removeClass("h_menu_selected");
        anchor.children( '#' + Newbreed.scenario + ".scenario").toggle();
        Newbreed.scenario = $(this).attr('id');
        anchor.children( '.h_menu' ).children( '#' + Newbreed.scenario ).addClass('h_menu_selected');
        anchor.children( '#' + Newbreed.scenario + ".scenario").toggle();
    },

    start: function() {
        alert(Newbreed.difficulty + " " + Newbreed.scenario);
    }

};

$( document ).ready( Newbreed.onReady );
