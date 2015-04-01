// Das Canvas
var stage;
// Array das alle Mause enthält
var arrMouse = [];
// Array das alle Käfige enthält
var arrCage = [];
// Der aktuelle Käfig
var selectedCage = 1;
//linke Breite des Canvas (Mausbereich)
var mousezone = 600;
function Mouse(id) {
    this.src = "/data/img/play/play_mouse_2.png";
    this.id = id;
    this.move = true;
    this.mouseimg = new Image();
    this.mouseani = null;
    this.mousecontainer = null;
    this.mouselabel = null;
}
// Initialisieren der Informatioenen
Mouse.prototype.init = function() {
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
    this.mousecontainer = new createjs.Container();
    this.mousecontainer.addChild(this.mouseani, this.mouselabel);
    this.mousecontainer.mouseid = this.id;
    this.mousecontainer.direction = 90;
    this.mousecontainer.ismove = true;
    this.mousecontainer.isdrag = false;
    this.mousecontainer.vX = 2;
    this.mousecontainer.vY = 2;
    this.mousecontainer.x = 16 + Math.random() * 300;
    this.mousecontainer.y = 32 + Math.random() * 300;
    this.mousecontainer.sizex = this.mouseimg.width;
    this.mousecontainer.sizey = this.mouseimg.height;
    // Erstellen eines Ziels für die Maus
    this.mousecontainer.targetx = this.mousecontainer.sizex + (Math.random() * (mousezone - this.mousecontainer.sizex));
    this.mousecontainer.targety = this.mousecontainer.sizey + (Math.random() * (stage.canvas.height - this.mousecontainer.sizey));
    // Erstellen der Hitbox. Achtung laut Docs püft hitTest() nicht auf Hitboxen
    var hit = new createjs.Shape();
    hit.graphics.beginFill("#000").drawRect(0, 0, this.mouseimg.width, this.mouseimg.height);
    this.mousecontainer.hitArea = hit;
    // Registrieren der Events
    // Beim klicken laden der Informationen
    this.mousecontainer.on("click", function(elem) {
        clickedMouse(elem.target.mouseid);
    });
    // Bei Maustastendruck (Drag-and-Drop). Später für Käfige
    this.mousecontainer.on("pressmove", function(evt) {
        evt.currentTarget.ismove = false;
        evt.currentTarget.isdrag = true;
        // currentTarget will be the container that the event listener was added to:
        evt.currentTarget.x = evt.stageX;
        evt.currentTarget.y = evt.stageY;
        // make sure to redraw the stage to show the change:
        stage.update();
    });
    // Beim loslasen der Maustaste
    this.mousecontainer.on("pressup", function(evt) {
        evt.currentTarget.isdrag = false;
        evt.currentTarget.ismove = true;

        /*
            // Prüfen ob die Maus über einem der Käfige schwebt
            var isCollision = ndgmr.checkRectCollision(elem1, elem2);
         */

    });
};

function Cage(id){
    this.id = id;
    this.src = "/data/img/play/cage_small_with_bg_rounded.png";
    this.cagecontainer = null;
    this.cagelabel = null;
    this.cageani = null;
}

Cage.prototype.init = function(y) {
    this.cageani = new createjs.Bitmap(this.src);
    this.cagelabel = new createjs.Text("Käfig Nr."+this.id, "20px Arial", "#201d1b");
    this.cagelabel.textAlign = "center";
    this.cagelabel.y = 20;
    this.cagelabel.x = 115;
    this.cagecontainer = new createjs.Container();
    this.cagecontainer.addChild(this.cageani,this.cagelabel);
    this.cagecontainer.x = 600;
    this.cagecontainer.y = y*62;
    this.cagecontainer.cageid = this.id;

    this.cagecontainer.on("click", function(evt){
        console.log(evt);
        addBen("Käfig #"+evt.currentTarget.cageid,"Es wurde der Käfig gewechselt","info");
    });
};

function refreshTarget(mousecontainer) {
    mousecontainer.targetx = mousecontainer.sizex + (Math.random() * ((mousezone - mousecontainer.sizex) - mousecontainer.sizex));
    mousecontainer.targety = mousecontainer.sizey + (Math.random() * (stage.canvas.height - mousecontainer.sizey));
}

function refreshTargetAbove(mousecontainer, x, y) {
    var rngv = Math.random();
    mousecontainer.targety = y + (Math.random() * (stage.canvas.height - y));
    if (rngv <= 0.5) {
        mousecontainer.targetx = x + (Math.random() * (mousezone - x));
    } else {
        mousecontainer.targetx = x - (Math.random() * (mousezone - x));
    }
}

function refreshTargetBelow(mousecontainer, x, y) {
    var rngv2 = Math.random();
    mousecontainer.targety = y - (Math.random() * (stage.canvas.height - y));
    if (rngv2 <= 0.5) {
        mousecontainer.targetx = x - (Math.random() * (mousezone - x));
    } else {
        mousecontainer.targetx = x + (Math.random() * (mousezone - x));
    }
}

function move(mousecontainer) {
    // Prüfen auf Collision
    checkCollision();
    var absx = Math.abs(mousecontainer.x - mousecontainer.targetx);
    var absy = Math.abs(mousecontainer.y - mousecontainer.targety);
    if (absx <= 10 || absy <= 10) {
        refreshTarget(mousecontainer);
    } else {
        if (mousecontainer.x < mousecontainer.targetx && mousecontainer.y < mousecontainer.targety) {
            mousecontainer.x += mousecontainer.vX;
            mousecontainer.y += mousecontainer.vY;
        } else if (mousecontainer.x > mousecontainer.targetx && mousecontainer.y < mousecontainer.targety) {
            mousecontainer.x -= mousecontainer.vX;
            mousecontainer.y += mousecontainer.vY;
        } else if (mousecontainer.x < mousecontainer.targetx && mousecontainer.y > mousecontainer.targety) {
            mousecontainer.x += mousecontainer.vX;
            mousecontainer.y -= mousecontainer.vY;
        } else if (mousecontainer.x > mousecontainer.targetx && mousecontainer.y > mousecontainer.targety) {
            mousecontainer.x -= mousecontainer.vX;
            mousecontainer.y -= mousecontainer.vY;
        } else if (mousecontainer.x == mousecontainer.targetx && mousecontainer.y < mousecontainer.targety) {
            mousecontainer.y += mousecontainer.vY;
        } else if (mousecontainer.x == mousecontainer.targetx && mousecontainer.y > mousecontainer.targety) {
            mousecontainer.y -= mousecontainer.vY;
        } else if (mousecontainer.x < mousecontainer.targetx && mousecontainer.y == mousecontainer.targety) {
            mousecontainer.x += mousecontainer.vX;
        } else if (mousecontainer.x > mousecontainer.targetx && mousecontainer.y == mousecontainer.targety) {
            mousecontainer.x -= mousecontainer.vX;
        }
    }
}

function getInfo(mouseid) {
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
    var thisMice = thisCage[selectedCage].mice;
    return thisMice[mouseid];
}

function clickedMouse(id) {
    var info = getInfo(id);
    $("#mouseinfoName").text(info.name);
    $("#mouseinfoAge").text(info.age);
    if (info.gender == 1) {
        $('#mouseinfoGender').text("Männlich");
    } else {
        $('#mouseinfoGender').text("Weiblich");
    }
    $("#mouseinfoWeight").text(info.weight);

}

function getCages(){
    // Auslesen der Elemente aus dem localStorage
    var data = localStorage.getItem("loadedBreed");
    var parsedData = JSON.parse(data);
    var thisCage = parsedData.cages;
    var counter = 0;
    for (var cages in thisCage){
        var tmp = new Cage(thisCage[cages].id);
        tmp.init(counter);
        arrCage.push(tmp);
        console.log(tmp.cagecontainer.y);
        counter +=1;
    }
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

function drawBackground(){
    // Hinzufügen der Linie
    var line = new createjs.Shape();
    line.graphics.setStrokeStyle(1);
    line.graphics.beginStroke("#201d1b");
    line.graphics.moveTo(mousezone,0);
    line.graphics.lineTo(mousezone, 500);
    line.graphics.endStroke();
    stage.addChild(line);

    // Zeichen des Käfighintergrundes
    var cage_bg = new createjs.Bitmap("/data/img/play/cage_bg.png");
    cage_bg.x = mousezone;
    cage_bg.y = 0;
    stage.addChild(cage_bg);
}

function init() {
    // Laden des Canvas
    stage = new createjs.Stage("demoCanvas");
    // Zeichnen des Hintergrundes
    drawBackground();

    // Laden der Käfiginformationen
    getCages();

    // Hinzufügen der Käfige
    console.log(arrCage);
    for (i=0;i < arrCage.length;i++){
      stage.addChild(arrCage[i].cagecontainer);
    }

    // Laden der Käfiginformationen
    updateMouseArray(1);
    // Hinzufügen aller Mäuse im Array in das Canvas
    for (i = 0; i < arrMouse.length; i++) {
        stage.addChild(arrMouse[i].mousecontainer);
    }

    // Registrieren der Tick-Funktion als Zeitgeber
    createjs.Ticker.on("tick", tick);
    createjs.Ticker.timingMode = createjs.Ticker.RAF_SYNCHED;
    createjs.Ticker.setFPS(60);
    stage.update();
}

function checkCollision() {
    for (var i = 0; i < arrMouse.length; i++) {
        for (var k = i + 1; k < arrMouse.length; k++) {
            var elem1 = arrMouse[i].mousecontainer;
            var elem2 = arrMouse[k].mousecontainer;
            if (!(elem1.isdrag || elem2.isdrag)) {
                var isCollision = ndgmr.checkRectCollision(elem1, elem2);
                if (isCollision != null) {
                    // Eine Kollision ist aufgetretten
                    // Bestimmen werlches das obere Element ist
                    if (elem1.y > elem1.y) {
                        refreshTargetAbove(elem1, elem1.x, elem1.y);
                        refreshTargetBelow(elem2, elem2.x, elem2.y);
                    } else {
                        refreshTargetBelow(elem1, elem1.x, elem1.y);
                        refreshTargetAbove(elem2, elem2.x, elem2.y);
                    }
                }
            }
        }
    }
}

function tick(event) {
    for (var i = 0; i < arrMouse.length; i++) {
        // Aktuelles Element
        var elem = arrMouse[i].mousecontainer;
        // Umrechnen der Maus von Gobal nach Lokal
        var pt = elem.globalToLocal(stage.mouseX, stage.mouseY);
        // Checken über welchem Element die Maus schwebt
        if (stage.mouseInBounds && elem.hitTest(pt.x, pt.y)) {
            elem.alpha = 0.5;
            clickedMouse(elem.mouseid);
        } else {
            elem.alpha = 1;
            // Wenn das Element nicht eine Collision erzeugt bewegt wird
            if (!elem.isdrag && elem.ismove) {
                move(elem);
            }
        }
    }
    // Aktualisieren des Canvas
    stage.update(event);
}
$(document).ready(function() {
    // Aufrufen der Startfunktion
    init();
});