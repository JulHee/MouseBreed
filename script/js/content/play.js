// Canvas
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

// Array for all Mouses
var mouseArr = [];

function Target() {
    this.x = 0;
    this.y = 0;
}

Target.prototype.newTarget = function () {
    // Setzten des ersten Ziels für die Maus
    this.x =(Math.random() * (canvas.width - 20));
    this.y =(Math.random() * (canvas.height - 20));
};


function PlayMouse() {
    this.x = 0;
    this.y = 0;
    this.speed = 100;
    this.target = new Target();
    this.height = 33;
    this.width = 33;
}
PlayMouse.prototype.reset = function () {
    // Throw the playMouse somewhere on the screen randomly
    this.x = 32 + (Math.random() * (canvas.width - 64));
    this.y = 32 + (Math.random() * (canvas.height - 64));

    // Setzten des ersten Ziels für die Maus
    this.target.newTarget();
};
PlayMouse.prototype.movemouse = function (move, direction) {
    var mouseXmax = this.x + this.width;
    var mouseYmax = this.y + this.height;


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
    var rnd = Math.random();

    var absx = Math.abs(this.x - this.target.x);
    var absy = Math.abs(this.y - this.target.y);

    var mouseXmax = this.x + this.width;
    var mouseYmax = this.y + this.height;

    if (((this.x >= this.target.x && this.y >= this.target.y) && (mouseXmax <= this.target.x && mouseYmax <= this.target.y)) || (absx < move || absy < move)) {
        this.target.newTarget();
    } else {
        if (this.x < this.target.x && this.y < this.target.y) {
            if (rnd <= 0.3){
                this.movemouse(move, "downright");
            } else if (rnd > 0.3 <= 0.6) {
                this.movemouse(move, "down");
            } else {
                this.movemouse(move,"right");
            }
        } else if (this.x > this.target.x && this.y < this.target.y) {
            if (rnd <= 0.3){
                this.movemouse(move, "downleft");
            } else if (rnd > 0.3 <= 0.6) {
                this.movemouse(move, "down");
            } else {
                this.movemouse(move,"left");
            }
        } else if (this.x < this.target.x && this.y > this.target.y) {
            if (rnd <= 0.3){
                this.movemouse(move, "upright");
            } else if (rnd > 0.3 <= 0.6) {
                this.movemouse(move, "up");
            } else {
                this.movemouse(move,"right");
            }
        } else if (this.x > this.target.x && this.y > this.target.y) {
            if (rnd <= 0.3){
                this.movemouse(move, "upleft");
            } else if (rnd > 0.3 <= 0.6) {
                this.movemouse(move, "up");
            } else {
                this.movemouse(move,"left");
            }
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
    this.dataMouse = null;
}


function updateMouseArray(cageid){
    mouseArr = [];
    // Auslesen der Elemente aus dem localStorage
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
    var thisMice = thisCage[cageid].mice;

    for (var i = 1; i < thisCage[cageid].mice.length; i++) {

        // Neues Element
        var tmp = new AbsMouse();
        tmp.playMouse.newTarget;

        // Bildeigenschaften setzten
        tmp.mouseImage = new Image();
        tmp.mouseImage.onload = function(){
            tmp.mouseReady = true;
        };
        tmp.mouseImage.src = "data/img/play/play_mouse.png";



        // Realen Mauseigenschaften setzen
        var aktMice = thisMice[i];
        tmp.dataMouse = new Mouse(aktMice.id,aktMice.name,aktMice.gender,aktMice.genotyp,2,aktMice.age,aktMice.weight,aktMice.cage_id,aktMice.breed_id,11);

        // Element dem Array hinzufügen
        mouseArr.push(tmp);
    }
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

function updateInfo(mouse){
    $('#mouseinfoName').text(mouse.name);
    $('#mouseinfoWeight').text(mouse.weight);
    if (mouse.gender == 1){
        $('#mouseinfoGender').text("Männlich");
    } else {
        $('#mouseinfoGender').text("Weiblich");
    }
    $('#mouseinfoParents').text('Leer');
    $('#mouseinfoAge').text(mouse.age);
    addMouseToSelected(mouse);
}

function addMouseToSelected(mouse){
    $("#mouseSelected").append('<tr><td>'+mouse.name+'</td><td>'+mouse.gender+'</td><td>'+mouse.genotyp+'</td>+<td>'+mouse.generation+'</td><td>'+mouse.age+'</td><td>'+mouse.weight+'</td><td>'+mouse.cage_id+'</td><td><a class="removeSelectedMouse"><span aria-hidden="true">&times;</span></a></td></tr>');
}

// Weiterführende Elemente
canvas.addEventListener('click', function (e) {  // use event argument

    var rect = canvas.getBoundingClientRect();  // get element's abs. position
    var x = e.clientX - rect.left;              // get mouse x and adjust for el.
    var y = e.clientY - rect.top;               // get mouse y and adjust for el.

    for (i = 0; i <= mouseArr.length - 1; i++) {
        var mousex = mouseArr[i].playMouse.x;
        var mousey = mouseArr[i].playMouse.y;

        if (x > mousex && x < (mousex + 30) && y < (mousey + 32) && y > mousey) {
            updateInfo(mouseArr[i].dataMouse);
        }
    }
});

$(document).ready(function(){
   $('.mouseCageImg').click(function() {
       var selectedCage = $(this).attr('data-cage-id');
       updateMouseArray(selectedCage);
   });
    $('#mouseCageNew').click(function(){
        $.notify("Neuer Käfig","info");
    });
});

// Cross-browser support for requestAnimationFrame
var w = window;
requestAnimationFrame = w.requestAnimationFrame || w.webkitRequestAnimationFrame || w.msRequestAnimationFrame || w.mozRequestAnimationFrame;
// Let's play this game!
var then = Date.now();
reset();
updateMouseArray(1);
main();

