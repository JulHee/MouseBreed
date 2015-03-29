
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

    selectors: {
        cage: $('#cage')
    },

    onReady: function() {
        GUI.inital();

        GUI.selectors.cage.on('mouseover', '.mouse', function() {
            $(this).addClass('stopped');
            $(this).stop();
        });

        GUI.selectors.cage.on('mouseleave', '.mouse', function() {
            $(this).removeClass('stopped');
            GUI.animateMouse($(this));
        });

        GUI.selectors.cage.on('click', '.mouse', function() {
            if($(this).hasClass('stopped')) {
                alert($(this).attr('id'));
            }
        });
    },

    inital: function() {
        GUI.fillCage();
    },

    fillCage: function() {
        for (var key in breed.cages[Game.state.selectedCage].mice) {
            GUI.selectors.cage.append("<div id=\"" + key + "\" class=\"mouse\"></div>");
        }

        GUI.selectors.mouse = $('.mouse');

        GUI.selectors.mouse.each(function() {
            $(this).css({ top: Dimension.rndH(), left: Dimension.rndW() });
            GUI.animateMouse($(this));
        });

    },

    animateMouse: function(mouse) {
        if(!mouse.hasClass('stopped')) {
            setTimeout(function() {
                if(!mouse.hasClass('stopped')) {
                    mouse.animate({ top: Dimension.rndH(), left: Dimension.rndW() },
                        { duration: Math.random() * 2000 + 2000, complete: function() { GUI.animateMouse(mouse) } });
                }
            },  Math.random() * 5000);
        }
    }

};

var Dimension = {
    h: GUI.selectors.cage.height() - 34,
    w: GUI.selectors.cage.width() - 59,

    update: function() {
        Dimension.h = GUI.selectors.cage.height() - 34;
        Dimension.w = GUI.selectors.cage.width() - 59;
    },

    rndH: function() {
        return Math.floor(Math.random() * Dimension.h);
    },

    rndW: function() {
        return Math.floor(Math.random() * Dimension.w);
    }

};

// Class Intervall
function Intervall(a, b){}

Intervall.prototype.intersects = function(that) {
    return Math.max(this.a, that.a) <= Math.min(this.b, that.b)
};


$(document).ready(function(){

    Game.onReady();
    GUI.onReady();

});
