// Unser Canvas
var canvas = document.createElement("canvas");
var container = document.getElementById("canvasContainer");
canvas.width = 598;
canvas.height = 598;
var ctx = canvas.getContext("2d");
container.appendChild(canvas);

var rnd = 0;

// Monster image
var MouseReady = false;
var MouseImage = new Image();
MouseImage.onload = function () {
    MouseReady = true;
};
MouseImage.src = "data/img/play/play_mouse.png";


// Background image
var bgReady = false;
var bgImage = new Image();
bgImage.onload = function () {
    bgReady = true;
};
bgImage.src = "data/img/play/play_bg.png";

var playMouse = {
    target: {
        x:0,
        y:0
    },
    speed: 130, //movement pixels per second
    x: 0,
    y: 0
};
var updateTarget = function(mouse){
    // Setzten des ersten Ziels für die Maus
    mouse.target.x = 32 + (Math.random() * (canvas.width - 64));
    mouse.target.y = 32 + (Math.random() * (canvas.height - 64));

    /*
        var text = document.getElementById("info");
        var elem = document.createElement("li");
        elem.innerHTML = "Target["+ mouse.target.x+","+mouse.target.y+"]";
        text.appendChild(elem);
    */
};

var reset = function () {
    // Throw the playMouse somewhere on the screen randomly
    playMouse.x = 32 + (Math.random() * (canvas.width - 64));
    playMouse.y =32 + (Math.random() * (canvas.height - 64));

    // Setzten des ersten Ziels für die Maus
    updateTarget(playMouse);

};



// Handle keyboard controls
var keysDown = {};

addEventListener("keydown", function (e) {
    keysDown[e.keyCode] = true;
}, false);

addEventListener("keyup", function (e) {
    delete keysDown[e.keyCode];
}, false);

var moveMouse = function (mouse, move, direction) {
    var mouseheight = 32;
    var mouseweight = 32;
    var mouseXmax = mouse.x + mouseweight;
    var mouseYmax = mouse.y + mouseheight;


    switch (direction) {
        case 'upleft':
            if (mouse.x - move > 0 && mouse.y - move > 0) {
                mouse.x -= move;
                mouse.y -= move;
            }
            break;
        case 'upright':
            if (mouse.y - move > 0 && mouseXmax + move < canvas.width) {
                mouse.x += move;
                mouse.y -= move;
            }
            break;
        case 'downleft':
            if (mouseYmax + move < canvas.height && mouse.x - move > 0) {
                mouse.x -= move;
                mouse.y += move;
            }
            break;
        case 'downright':
            if ((mouseXmax + move) < canvas.width && (mouseYmax + move) < canvas.width) {
                mouse.x += move;
                mouse.y += move;
            }
            break;
        case 'up':
            if (mouse.y - move > 0){
                mouse.y -= move;
            }
            break;
        case 'down':
            if(mouseYmax + move < canvas.height){
                mouse.y += move;
            }
            break;
        case 'left':
            if(mouse.x -move > 0){
                mouse.x -= move;
            }
            break;
        case 'right':
            if(mouseXmax + move < canvas.weight){
                mouse.x += move;
            }
            break;
        default :
            $.notify("Fehler","error");
            break;
    }
};


var update = function (modifier) {
    var move = playMouse.speed * modifier;

    var absx = Math.abs(playMouse.x - playMouse.target.x);
    var absy = Math.abs(playMouse.y - playMouse.target.y);

    if ((playMouse.x == playMouse.target.x && playMouse.y == playMouse.target.y) || (absx < move || absy < move) ){
        updateTarget(playMouse);
    } else {
        if (playMouse.x < playMouse.target.x && playMouse.y < playMouse.target.y){
            moveMouse(playMouse,move,"downright");
        } else if(playMouse.x > playMouse.target.x && playMouse.y < playMouse.target.y){
            moveMouse(playMouse,move,"downleft");
        } else if(playMouse.x < playMouse.target.x && playMouse.y > playMouse.target.y){
            moveMouse(playMouse,move,"upright");
        } else if(playMouse.x > playMouse.target.x && playMouse.y > playMouse.target.y){
            moveMouse(playMouse,move,"upleft")
        } else if(playMouse.x == playMouse.target.x && playMouse.y < playMouse.target.y){
            moveMouse(playMouse,move,"down");
        } else if(playMouse.x == playMouse.target.x && playMouse.y > playMouse.target.y){
            moveMouse(playMouse,move,"up");
        } else if(playMouse.x < playMouse.target.x && playMouse.y == playMouse.target.y){
            moveMouse(playMouse,move,"right");
        } else if(playMouse.x > playMouse.target.x && playMouse.y == playMouse.target.y){
            moveMouse(playMouse,move,"left");
        }
    }



    /*
        rnd = Math.floor(Math.random() * 101);
        if (rnd <= 25) {
            moveMouse(playMouse, modifier, "upright");
        } else if ((rnd > 25) && (rnd <= 50)) {
            moveMouse(playMouse, modifier, "downright");
        } else if ((rnd > 50) && (rnd <= 75)) {
            moveMouse(playMouse, modifier, "downleft");
        } else if ((rnd > 75)) {
            moveMouse(playMouse, modifier, "upleft");
        }
    */

};

// Draw everything
var render = function () {
    if (bgReady) {
        ctx.drawImage(bgImage, 0, 0);
    }

    if (MouseReady) {
        ctx.drawImage(MouseImage, playMouse.x, playMouse.y);
    }
};

var main = function () {
    var now = Date.now();
    var delta = now - then;

    update(delta / 1000);
    render();

    then = now;

    // Request to do this again ASAP
    requestAnimationFrame(main);
};

// Cross-browser support for requestAnimationFrame
var w = window;
requestAnimationFrame = w.requestAnimationFrame || w.webkitRequestAnimationFrame || w.msRequestAnimationFrame || w.mozRequestAnimationFrame;
// Let's play this game!
var then = Date.now();
reset();
main();