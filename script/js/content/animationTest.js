
var breed = JSON.parse(localStorage.getItem("loadedBreed"));

var Game = {

    state: {
        selectedCage: Object.keys(breed.cages)[0]
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

        GUI.Selectors.cage.on('mouseover', '.mouse_container', function() {
            $(this).addClass('stopped');
        });

        GUI.Selectors.cage.on('mouseleave', '.mouse_container', function() {
            var mouse = $(this);
            mouse.removeClass('stopped');
            setTimeout(function() { GUI.Animation.animateMouse(mouse) }, Math.random() * 5000);
        });

        GUI.Selectors.cage.on('click', '.mouse_container', function() {
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
            var newMouse =  "<div id=\"" + key + "\" class=\"mouse_container\">"+
                                "<div class=\"mouse_img\"></div>" +
                                "<p>#" + key + " " + breed.cages[Game.state.selectedCage].mice[key].name + "</p>"+
                            "</div>";

            GUI.Selectors.cage.append(newMouse);
        }

        GUI.Selectors.mouse = $('.mouse_container');

        GUI.Selectors.mouse.each(function() {
            var mouse = $(this);
            var rndPos = GUI.Animation.rndPos($(this));
            mouse.css({ left: rndPos[0] , top: rndPos[1] });
            setTimeout(function() { GUI.Animation.animateMouse(mouse) }, Math.random() * 5000);
        });

    },

    Animation: {
        animateMouse: function(mouse) {
            var rndPos = GUI.Animation.rndPos(mouse);
            mouse.animate({
                    left: rndPos[0],
                    top: rndPos[1]
                }, {
                    duration: Math.random() * 2000 + 2000,
                    progress: function() {
                        if(mouse.hasClass('stopped')) {
                            mouse.stop(true);
                        }
                    },
                    complete: function() {
                        setTimeout(function() { GUI.Animation.animateMouse(mouse) },  Math.random() * 5000);
                    }
                }
            );
        },

        rndPos: function(mouse) {
            var w = GUI.Selectors.cage.width() - mouse.width();
            var h = GUI.Selectors.cage.height() - mouse.height();

            return [Math.floor(Math.random() * w), Math.floor(Math.random() * h)];
        },

        rndPos2: function(mouse) {
            var max = { x: GUI.Selectors.cage.width() - mouse.width(), y: GUI.Selectors.cage.height() - mouse.height() };
            var mousePos = { x: mouse.position().left, y: mouse.position().top };
            var center = { x: mouse.position().left + 15, y: mouse.position().top + 15 };

            var phi = Math.random() * 2 * Math.PI;
            var aim = { x: 200 * Math.cos(phi) + center.x, y: 200 * Math.sin(phi) + center.y };

            return [Math.min(Math.max(0, aim.x), max.x), Math.min(Math.max(0, aim.y), max.y)];
        },

        // Kollisionsabfrage (Prototyp)
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
    }

};


$(document).ready(function(){

    Game.onReady();
    GUI.onReady();

});
