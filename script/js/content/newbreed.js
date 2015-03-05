var Newbreed = {

    difficulty: "",
    scenarioVisibly: false,
    scenario: 1,


    onReady: function() {
        $('input[name=difficulty]:radio').change(Newbreed.changeDifficulty);
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

    start: function() {
        //alert(Newbreed.difficulty + " " + Newbreed.scenario);
    	addBen("Neue Zucht", $("#breedname").val(), "info");
	}
};

 function tab_funktion  (e) {
  e.preventDefault();
  $(this).tab('show');
};

$( document ).ready( Newbreed.onReady );