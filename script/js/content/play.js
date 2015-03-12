// Unser Canvas
var canvas = document.createElement("canvas");
var container = document.getElementById("canvasContainer");
canvas.width = 598;
canvas.height = 598;
var ctx = canvas.getContext("2d");
container.appendChild(canvas);

// Background image
var bgReady = false;
var bgImage = new Image();
bgImage.onload = function () {
    bgReady = true;
};
bgImage.src = "data/img/play/play_bg.png";

function Target() {
    this.x = 0;
    this.y = 0;
}

Target.prototype.newTarget = function () {
    // Setzten des ersten Ziels für die Maus
    this.x = 32 + (Math.random() * (canvas.width - 64));
    this.y = 32 + (Math.random() * (canvas.height - 64));
};


function PlayMouse() {
    this.x = 0;
    this.y = 0;
    this.speed = 130;
    this.target = new Target();
    this.id = Math.floor(Math.random()*100);
}
PlayMouse.prototype.reset = function () {
    // Throw the playMouse somewhere on the screen randomly
    this.x = 32 + (Math.random() * (canvas.width - 64));
    this.y = 32 + (Math.random() * (canvas.height - 64));

    // Setzten des ersten Ziels für die Maus
    this.target.newTarget();
};
PlayMouse.prototype.movemouse = function (move, direction) {
    var mouseheight = 32;
    var mouseweight = 32;
    var mouseXmax = this.x + mouseweight;
    var mouseYmax = this.y + mouseheight;


    switch (direction) {
        case 'upleft':
            if (this.x - move > 0 && this.y - move > 0) {
                this.x -= move;
                this.y -= move;
            }
            break;
        case 'upright':
            if (this.y - move > 0 && mouseXmax + move < canvas.width) {
                this.x += move;
                this.y -= move;
            }
            break;
        case 'downleft':
            if (mouseYmax + move < canvas.height && this.x - move > 0) {
                this.x -= move;
                this.y += move;
            }
            break;
        case 'downright':
            if ((mouseXmax + move) < canvas.width && (mouseYmax + move) < canvas.width) {
                this.x += move;
                this.y += move;
            }
            break;
        case 'up':
            if (this.y - move > 0) {
                this.y -= move;
            }
            break;
        case 'down':
            if (mouseYmax + move < canvas.height) {
                this.y += move;
            }
            break;
        case 'left':
            if (this.x - move > 0) {
                this.x -= move;
            }
            break;
        case 'right':
            if (mouseXmax + move < canvas.weight) {
                this.x += move;
            }
            break;
        default :
            $.notify("Fehler", "error");
            break;
    }
};

PlayMouse.prototype.update = function (modifier) {
    var move = this.speed * modifier;

    var absx = Math.abs(this.x - this.target.x);
    var absy = Math.abs(this.y - this.target.y);

    if ((this.x == this.target.x && this.y == this.target.y) || (absx < move || absy < move)) {
        this.target.newTarget();
    } else {
        if (this.x < this.target.x && this.y < this.target.y) {
            this.movemouse(move, "downright");
        } else if (this.x > this.target.x && this.y < this.target.y) {
            this.movemouse(move, "downleft");
        } else if (this.x < this.target.x && this.y > this.target.y) {
            this.movemouse(move, "upright");
        } else if (this.x > this.target.x && this.y > this.target.y) {
            this.movemouse(move, "upleft")
        } else if (this.x == this.target.x && this.y < this.target.y) {
            this.movemouse(move, "down");
        } else if (this.x == this.target.x && this.y > this.target.y) {
            this.movemouse(move, "up");
        } else if (this.x < this.target.x && this.y == this.target.y) {
            this.movemouse(move, "right");
        } else if (this.x > this.target.x && this.y == this.target.y) {
            this.movemouse(move, "left");
        }
    }
};

// Mouse as big Class
function AbsMouse() {
    this.mouseImage = new Image();
    this.mouseReady = false;
    this.playMouse = new PlayMouse();
}

// Array for all Mouses
var mouseArr = [];
for (var i = 0; i < 6; i++)
    mouseArr.push(new AbsMouse());

for (i = 0; i <= mouseArr.length - 1; i++) {
    var imgMouse = new Image();
    imgMouse.onload = function () {
        mouseArr[i].mouseReady = true;
    };
    imgMouse.src = "data/img/play/play_mouse.png";
    mouseArr[i].mouseImage = imgMouse;
}

var update = function (modifier) {
    for (i = 0; i <= mouseArr.length - 1; i++) {
        mouseArr[i].playMouse.update(modifier);
    }

};

var reset = function () {
    for (i = 0; i <= mouseArr.length - 1; i++) {
        mouseArr[i].playMouse.reset();
    }
};

// Draw everything
var render = function () {
    if (bgReady) {
        ctx.drawImage(bgImage, 0, 0);
    }
    for (i = 0; i <= mouseArr.length - 1; i++) {
        ctx.drawImage(mouseArr[i].mouseImage, mouseArr[i].playMouse.x, mouseArr[i].playMouse.y);
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

// Weiterführende Elemente
canvas.addEventListener('click', function (e) {  // use event argument

    var rect = canvas.getBoundingClientRect();  // get element's abs. position
    var x = e.clientX - rect.left;              // get mouse x and adjust for el.
    var y = e.clientY - rect.top;               // get mouse y and adjust for el.

    for (i = 0; i <= mouseArr.length - 1; i++) {
        var mousex = mouseArr[i].playMouse.x;
        var mousey = mouseArr[i].playMouse.y;

        if (x > mousex && x < (mousex + 30) && y < (mousey + 32) && y > mousey) {
            var info = document.getElementById("info");
            var elem = document.createElement("li");
            elem.innerHTML = mouseArr[i].playMouse.id;
            info.appendChild(elem);
        }

    }

});

// Cross-browser support for requestAnimationFrame
var w = window;
requestAnimationFrame = w.requestAnimationFrame || w.webkitRequestAnimationFrame || w.msRequestAnimationFrame || w.mozRequestAnimationFrame;
// Let's play this game!
var then = Date.now();
reset();
main();