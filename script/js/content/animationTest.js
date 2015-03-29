
var breed = JSON.parse(localStorage.getItem("loadedBreed"));

var Game = {

    state: {
        selectedCage: 1
    },

    onReady: function() {
    },

    inital: function() {
    }

};


var GUI = {

    Selectors: {
        cage: $('#cage')
    },

    onReady: function() {
        GUI.inital();

        GUI.Selectors.cage.on('mouseover', '.mouse', function() {
            $(this).addClass('stopped');
        });

        GUI.Selectors.cage.on('mouseleave', '.mouse', function() {
            $(this).removeClass('stopped');
            GUI.Animation.animateMouse($(this));
        });

        GUI.Selectors.cage.on('click', '.mouse', function() {
            if($(this).hasClass('stopped')) {
                $('#clickedMouse').text($(this).attr('id'));
            }
        });
    },

    inital: function() {
        GUI.fillCage();
    },

    fillCage: function() {
        for (var key in breed.cages[Game.state.selectedCage].mice) {
            GUI.Selectors.cage.append("<div id=\"" + key + "\" class=\"mouse\"></div>");
        }

        GUI.Selectors.mouse = $('.mouse');

        GUI.Selectors.mouse.each(function() {
            var rndPos = GUI.Animation.rndPos($(this));
            $(this).css({ left: rndPos[0] , top: rndPos[1] });
            GUI.Animation.animateMouse($(this));
        });

    },

    Animation: {
        animateMouse: function(mouse) {
            setTimeout(function() {
                    var rndPos = GUI.Animation.rndPos(mouse);
                    mouse.animate({
                            left: rndPos[0],
                            top: rndPos[1]
                        }, {
                            duration: Math.random() * 2000 + 2000,
                            progress: function() {
                                if(mouse.hasClass('stopped')) {
                                    mouse.stop();
                                }
                            },
                            complete: function() {
                                GUI.Animation.animateMouse(mouse)
                            }
                        }
                    );
                },
                Math.random() * 5000
            );
        },

        rndPos: function(mouse) {
            var w = GUI.Selectors.cage.width() - mouse.width();
            var h = GUI.Selectors.cage.height() - mouse.height();

            return [Math.floor(Math.random() * w), Math.floor(Math.random() * h)];
        }

        /* Kollisionsabfrage (Prototyp)
        collision: function(mouse) {
            var coll = false;
            var c1 = {r: 21, x: mouse.position().left + 15, y: mouse.position().top + 15};

            GUI.Selectors.mouse.each(function() {
                if(!$(this).is(mouse)) {
                    var c2 = {r: 21, x: $(this).position().left + 15, y: $(this).position().top + 15};

                    var dx = (c1.x + c1.r) - (c2.x + c2.r);
                    var dy = (c1.y + c1.r) - (c2.y + c2.r);
                    var d = Math.sqrt(dx * dx + dy * dy);


                    if (d < c1.r + c2.r){
                        coll = true;
                        return false;
                    }
                }
            });

            return coll;
        }
        */
    }

};


$(document).ready(function(){

    Game.onReady();
    GUI.onReady();

});
