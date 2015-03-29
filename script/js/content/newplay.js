// Das Canvas
var stage;
// Array das alle Mause enthält
var arrMouse = [];
// Der aktuelle Käfig
var selectedCage = 1;


function Mouse(id) {
    this.src = "/data/img/play/play_mouse_2.png";
    this.id = id;
    this.move = true;
    this.mouseimg = new Image();
    this.mouseani = null;
    this.mousecontrainer = null;
    this.mouselabel = null;
}
// Initialisieren der Informatioenen
Mouse.prototype.init = function () {
    // Holen der Informationen zu der Maus aus dem LocalStorage
    var tmpInfoMouse = getInfo(this.id);
    // Laden des Bilds
    this.mouseimg.src = this.src;
    // Konvertieren in ein createjs.Bitmap
    this.mouseani = new createjs.Bitmap(this.mouseimg);
    // Erstellen des Labels
    this.mouselabel = new createjs.Text("#" + tmpInfoMouse.id + ":" + tmpInfoMouse.name, "bold 14px Arial", "#314ddf");
    this.mouselabel.textAlign = "center";
    // Positionieren des Labels
    this.mouselabel.y = 35;
    this.mouselabel.x = 20;
    // Erstellen des Containers der das Label und das Bild beinhaltet
    this.mousecontrainer = new createjs.Container();
    this.mousecontrainer.addChild(this.mouseani, this.mouselabel);
    this.mousecontrainer.mouseid = this.id;
    this.mousecontrainer.direction = 90;
    this.mousecontrainer.ismove = true;
    this.mousecontrainer.vX = 2;
    this.mousecontrainer.vY = 2;
    this.mousecontrainer.x = 16 + Math.random() * 300;
    this.mousecontrainer.y = 32 + Math.random() * 300;
    this.mousecontrainer.sizex = this.mouseimg.width;
    this.mousecontrainer.sizey = this.mouseimg.height;

    // Erstellen eines Ziels für die Maus
    this.mousecontrainer.targetx = this.mousecontrainer.sizex + (Math.random() * (stage.canvas.width -  this.mousecontrainer.sizex));
    this.mousecontrainer.targety = this.mousecontrainer.sizey + (Math.random() * (stage.canvas.height -  this.mousecontrainer.sizey));



    // Erstellen der Hitbox. Achtung laut Docs püft hitTest() nicht auf Hitboxen
    var hit = new createjs.Shape();
    hit.graphics.beginFill("#000").drawRect(0, 0, this.mouseimg.width, this.mouseimg.height);
    this.mousecontrainer.hitArea = hit;
    // Registrieren der Events
    // Beim klicken laden der Informationen
    this.mousecontrainer.on("click", function (elem) {
        clickedMouse(elem.target.mouseid);
    });
    // Bei Maustastendruck (Drag-and-Drop). Später für Käfige
    /* this.mousecontrainer.on("pressmove", function(evt) {
     console.log(evt.currentTarget);
     evt.currentTarget.ismove = false;
     // currentTarget will be the container that the event listener was added to:
     evt.currentTarget.x = evt.stageX;
     evt.currentTarget.y = evt.stageY;
     // make sure to redraw the stage to show the change:
     stage.update();
     });
     // Beim loslasen der Maustaste
     this.mousecontrainer.on("pressup", function(evt) {
     evt.currentTarget.ismove = true;
     });*/
};
function refreshTarget (mousecontrainer) {
    mousecontrainer.targetx = mousecontrainer.sizex + (Math.random() * (stage.canvas.width -  mousecontrainer.sizex));
    mousecontrainer.targety = mousecontrainer.sizey + (Math.random() * (stage.canvas.height -  mousecontrainer.sizey));
};

function move(mousecontrainer) {
    var absx = Math.abs(mousecontrainer.x - mousecontrainer.targetx);
    var absy = Math.abs(mousecontrainer.y - mousecontrainer.targety);

    if (absx <= 10 || absy <= 10) {
        refreshTarget(mousecontrainer);
    } else {
        if (mousecontrainer.x < mousecontrainer.targetx && mousecontrainer.y < mousecontrainer.targety) {
            mousecontrainer.x += mousecontrainer.vX;
            mousecontrainer.y += mousecontrainer.vY;
        } else if (mousecontrainer.x > mousecontrainer.targetx && mousecontrainer.y < mousecontrainer.targety) {
            mousecontrainer.x -= mousecontrainer.vX;
            mousecontrainer.y += mousecontrainer.vY;
        } else if (mousecontrainer.x < mousecontrainer.targetx && mousecontrainer.y > mousecontrainer.targety) {
            mousecontrainer.x += mousecontrainer.vX;
            mousecontrainer.y -= mousecontrainer.vY;
        } else if (mousecontrainer.x > mousecontrainer.targetx && mousecontrainer.y > mousecontrainer.targety) {
            mousecontrainer.x -= mousecontrainer.vX;
            mousecontrainer.y -= mousecontrainer.vY;
        } else if (mousecontrainer.x == mousecontrainer.targetx && mousecontrainer.y < mousecontrainer.targety) {
            mousecontrainer.y += mousecontrainer.vY;
        } else if (mousecontrainer.x == mousecontrainer.targetx && mousecontrainer.y > mousecontrainer.targety) {
            mousecontrainer.y -= mousecontrainer.vY;
        } else if (mousecontrainer.x < mousecontrainer.targetx && mousecontrainer.y == mousecontrainer.targety) {
            mousecontrainer.x += mousecontrainer.vX;
        } else if (mousecontrainer.x > mousecontrainer.targetx && mousecontrainer.y == mousecontrainer.targety) {
            mousecontrainer.x -= mousecontrainer.vX;
        }
    }
    /*
    mousecontrainer.x += mousecontrainer.vX;
    mousecontrainer.y += mousecontrainer.vY;
    if (mousecontrainer.x > stage.canvas.width) {
        mousecontrainer.x = 0;
    }
    if (mousecontrainer.y > stage.canvas.height) {
        mousecontrainer.y = 0;
    }*/
}

function clickedMouse(id) {
    $('#clickinfo').text(id);
}

function getInfo(mouseid) {
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
    var thisMice = thisCage[selectedCage].mice;
    return thisMice[mouseid];
}

function updateMouseArray(cageid) {
    selectedCage = cageid;
    // Auslesen der Elemente aus dem localStorage
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
    var thisMice = thisCage[cageid].mice;
    for (var key in thisMice) {
        var tmp = new Mouse(thisMice[key].id);
        tmp.init();
        arrMouse.push(tmp);
    }
}

function init() {
    // Laden des Canvas
    stage = new createjs.Stage("demoCanvas");
    // Laden der Käfiginformationen
    updateMouseArray(1);
    // Hinzufügen aller Mäuse im Array in das Canvas
    for (var i = 0; i < arrMouse.length - 1; i++) {
        stage.addChild(arrMouse[i].mousecontrainer);
    }
    // Registrieren der Tick-Funktion als Zeitgeber
    createjs.Ticker.on("tick", tick);
    createjs.Ticker.timingMode = createjs.Ticker.RAF_SYNCHED;
    createjs.Ticker.setFPS(60);
    stage.update();
}

function checkCollision() {
    for (var i = 0; i < arrMouse.length - 1; i++) {
        for (var k = i + 1; k < arrMouse.length - 1; k++) {
            var isCollision = ndgmr.checkRectCollision(arrMouse[i].mousecontrainer, arrMouse[k].mousecontrainer);
            if (isCollision != null) {
                // Eine Kollision ist aufgetretten
                arrMouse[i].mousecontrainer.ismove = false;
                arrMouse[i].mousecontrainer.alpha = 0.2;
            } else {
                arrMouse[i].mousecontrainer.ismove = true;
                arrMouse[i].mousecontrainer.alpha = 1;
            }
        }
    }
}

function tick(event) {

    // Prüfen auf Collision
    checkCollision();

    for (var i = 0; i < arrMouse.length - 1; i++) {
        // Aktuelles Element
        var elem = arrMouse[i].mousecontrainer;
        // Umrechnen der Maus von Gobal nach Lokal
        var pt = elem.globalToLocal(stage.mouseX, stage.mouseY);

        // Checken über welchem Element die Maus schwebt
        if (stage.mouseInBounds && elem.hitTest(pt.x, pt.y)) {
            elem.alpha = 0.5;
        } else {
            elem.alpha = 1;

            // Wenn das Element nicht eine Collision erzeugt bewegt wird
            if (elem.ismove) {
                move(elem);
            }
        }
    }
    // Aktualisieren des Canvas
    stage.update(event);
}
$(document).ready(function () {
    // Aufrufen der Startfunktion
    init();
});