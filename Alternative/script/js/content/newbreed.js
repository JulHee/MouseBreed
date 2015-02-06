var Newbreed = {

    difficulty: "",
    scenarioVisibly: false,
    scenario: 1,


    onReady: function() {
        $('input[name=difficulty]:radio').change(Newbreed.changeDifficulty);
        $('.h_menu').click(Newbreed.changeScenario);
        $( '.newbreed_button').click(Newbreed.start);
    },

    changeDifficulty:  function() {
        if(!Newbreed.scenarioVisibly) {
            $( '.scenario_head').removeClass("hidden");
            Newbreed.scenarioVisibly = true;
        }
		var sender = document.querySelector('input[name="difficulty"]:checked').value;
		difficulty = sender;
		
        var anchor = $( '#' + sender );
		
		var scenarios = $('.scenario_difficulty');
		
		for (var i = 0;i < scenarios.length; i++){
			if (scenarios.get(i).id == sender) {
				$('#'+scenarios.get(i).id).removeClass("hidden");	
			} else {
				$('#'+scenarios.get(i).id).addClass("hidden");	
			}	
		}
    },

    changeScenario:  function() {
		var elem = $(this);
		var elemId = elem.attr('id');
		var elems =$('#'+difficulty +'>'+ '.scenario');		
		
		// Setzen der Scenarios als hidden oder nicht
		for (var i = 0;i < elems.length; i++){
			if (elems.get(i).id == (difficulty+"_"+elemId)) {
				$('#'+elems.get(i).id).removeClass("hidden");	
			} else {
				$('#'+elems.get(i).id).addClass("hidden");	
			}	
		}
		
		var back_ul = elem.parent().parent();
		
    },

    start: function() {
        alert(Newbreed.difficulty + " " + Newbreed.scenario);
    }
};

$( document ).ready( Newbreed.onReady );